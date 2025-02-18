<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\CentroCivico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ActividadController extends Controller
{

    public function create(){
        $centroCivicos = CentroCivico::all();
        return view('actividad.createActividad', compact('centroCivicos'));
    }

    //public function store(Request $request){
    public function save(Request $request){
        try {
            $centroCivicos = CentroCivico::all();

            // TODO : Validar de manera más completa (con patrones y tal)

            // Validar campos requeridos
            $validator = Validator::make($request->all(), [
                'titulo' => 'required',
                'descripcion' => 'required',
                'fecha_inicio' => 'required',
                'fecha_fin' => 'required',
                'dia_1' => 'required',
                'dia_2',
                'hora_inicio' => 'required',
                'hora_fin' => 'required',
                'idioma' => 'required',
                'plazas_totales' => 'required',
                'plazas_minimas' => 'required',
                'edad_minima',
                'edad_maxima',
                'centro_civico_id' => 'required',
                'imagen' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $imagenPath = null;
            if ($request->hasFile('imagen')) {
                $imagenOriginalName = $request->file('imagen')->getClientOriginalName();
                $imagenPath = $request->file('imagen')->storeAs('actividades', $imagenOriginalName, 'public');
            }

            $actividad = new Actividad();
            $actividad->titulo = $request->input('titulo');
            $actividad->descripcion = $request->input('descripcion');
            $actividad->fecha_inicio = $request->input('fecha_inicio');
            $actividad->fecha_fin = $request->input('fecha_fin');
            $actividad->dia_1 = $request->input('dia_1');
            $actividad->dia_2 = $request->input('dia_2');
            $actividad->hora_inicio = $request->input('hora_inicio');
            $actividad->hora_fin = $request->input('hora_fin');
            $actividad->idioma = $request->input('idioma');
            $actividad->plazas_totales = $request->input('plazas_totales');
            $actividad->plazas_disponibles = $request->input('plazas_totales');
            $actividad->plazas_minimas = $request->input('plazas_minimas');
            $actividad->edad_minima = $request->input('edad_minima');
            $actividad->edad_maxima = $request->input('edad_maxima');
            // TODO : También hay que ponerle el "administrador_id" del admin logueado (e implementar vMisActividades para acceder a las creadas por él más fácilmente; y poder ver/editar/eliminar)
            $actividad->centro_civico_id = $request->input('centro_civico_id');
            $actividad->imagen = $imagenPath;

            $actividad->save();

        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()])->withInput();
        }

        return view('actividad.createActividad', compact('centroCivicos'));
    }

    //public function index($id = null ){
    public function showActividades(Request $request){

        $result = $this->filtrarActividades($request);

        return view('Actividad.listActividades', [
            'actividades' => $result['actividades'],
            'actividadesTotales' => $result['actividadesTotales'],
            'centroCivicos' => CentroCivico::all(),
        ]);
    }

    //public function show($id){
    public function showActividadesCentro(Request $request, $id){

        $result = $this->filtrarActividades($request, $id);

        return view('Actividad.listActividades', [
            'actividades' => $result['actividades'],
            'actividadesTotales' => $result['actividadesTotales'],
            'centroCivicos' => CentroCivico::all(),
            'centroSeleccionado' => $id,
        ]);
    }

    public function filtrarActividades(Request $request, $id = null)
    {
        $query = Actividad::query();

        if ($id) {
            $query->where('centro_civico_id', $id);
        }

        if ($request->has('centro_civico')) {
            $query->where('centro_civico_id', $request->query('centro_civico'));
        }
        if ($request->has('edad')) {
            $query->where('edad_minima', '<=', $request->query('edad'))
                ->where('edad_maxima', '>=', $request->query('edad'));
        }
        if ($request->has('idioma') && $request->query('idioma') !== 'todos') {
            $query->where('idioma', $request->query('idioma'));
        }
        if ($request->has('horario')) {
            $horario = $request->query('horario');
            if (preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/', $horario)) {
                $horarioSegundos = $this->horaAsegundos($horario);
                $query->where(function ($q) use ($horarioSegundos) {
                    $q->whereRaw('TIME_TO_SEC(hora_inicio) <= ?', [$horarioSegundos])
                        ->whereRaw('TIME_TO_SEC(hora_fin) >= ?', [$horarioSegundos]);
                });
            }
        }
        if ($request->has('textoBusqueda')) {
            $query->where('titulo', 'like', '%' . $request->query('textoBusqueda') . '%')
                ->orWhere('descripcion', 'like', '%' . $request->query('textoBusqueda') . '%');
        }

        $actividades = $query->get();

        // Contar el total de actividades encontradas
        $actividadesTotales = $actividades->count();

        dump($request->all());

        return compact('actividades', 'actividadesTotales');
    }

    /**
     * Convierte una hora en formato HH:MM a segundos desde la medianoche.
     *
     * @param string $hora La hora en formato HH:MM.
     * @return int Los segundos desde la medianoche.
     */
    private function horaAsegundos(string $hora): int {
        list($horas, $minutos) = explode(':', $hora);
        return ($horas * 3600) + ($minutos * 60);
    }

    //public function destroy(Request $request)
    public function delete(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $actividad = Actividad::find($request->id);

        if ($actividad) {
            $imagenPath = 'public/' . $actividad->imagen;

            if ($actividad->imagen && Storage::exists($imagenPath)) {
                Storage::delete($imagenPath);
            }

            $actividad->delete();
        }

        return redirect()->back()->with('success', 'Actividad eliminada correctamente.');
    }

    public function edit($id){
        $datos = Actividad::findOrFail($id);
        return view('actividad.editActividad', compact('datos'));
    }

    public function update(Request $request, $id){
        $actividad = Actividad::findOrFail($id);

        $imagenPath = $actividad->imagen;

        if ($request->hasFile('imagen')) {
            $request->validate([
                'imagen' => 'image|mimes:jpeg,png,jpg,svg|max:2048', // Ajusta los requisitos si es necesario
            ]);

            $imagenOriginalName = $request->file('imagen')->getClientOriginalName();
            $imagenPath = $request->file('imagen')->storeAs('actividades', $imagenOriginalName, 'public');
        }

        $actividad->plazas_totales = $request->input('plazas_totales');

        $actividad->plazas_disponibles = $request->input('plazas_totales');

        $actividad->titulo = $request->input('titulo');
        $actividad->descripcion = $request->input('descripcion');
        $actividad->idioma = $request->input('idioma');
        $actividad->fecha_inicio = $request->input('fecha_inicio');
        $actividad->fecha_fin = $request->input('fecha_fin');
        $actividad->hora_inicio = $request->input('hora_inicio');
        $actividad->hora_fin = $request->input('hora_fin');
        $actividad->plazas_minimas = $request->input('plazas_minimas');
        $actividad->edad_minima = $request->input('edad_minima');
        $actividad->edad_maxima = $request->input('edad_maxima');
        $actividad->dia_1 = $request->input('dia_1');
        $actividad->dia_2 = $request->input('dia_2');

        $actividad->imagen = $imagenPath;

        $actividad->save();

        return redirect()->route('actividad.showActividades')->with('success', 'Actividad actualizada correctamente');
    }

    /*
    public function filtrarActividades(Request $request){
        $centro_civico = $request->input('centro_civico');
        $edad = $request->input('edad');
        $idioma = $request->input('idioma');
        $horario = $request->input('horario');
        $textoBusqueda = $request->input('textoBusqueda');

        $query = Actividad::query();

        // Aplicar los filtros según los parámetros recibidos
        if ($centro_civico) {
            $query->where('centro_civico_id', $centro_civico);
        }
        if ($edad) {
            $query->where('edad_minima', '<=', $edad)->where('edad_maxima', '>=', $edad);
        }
        if ($idioma && $idioma !== 'todos') {
            $query->where('idioma', $idioma);
        }
        if ($horario) {
            // Validar que el horario tenga el formato correcto (HH:MM)
            if (preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/', $horario)) {
                // Convertir el horario de búsqueda a un formato comparable (segundos desde la medianoche)
                $horarioSegundos = $this->horaAsegundos($horario);

                // Filtrar actividades cuyo horario coincida con el horario de búsqueda
                $query->where(function ($q) use ($horarioSegundos) {
                    $q->whereRaw('TIME_TO_SEC(hora_inicio) <= ?', [$horarioSegundos])
                        ->whereRaw('TIME_TO_SEC(hora_fin) >= ?', [$horarioSegundos]);
                });
            }
        }
        if ($textoBusqueda) {
            $query->where('titulo', 'like', '%' . $textoBusqueda . '%')
                ->orWhere('descripcion', 'like', '%' . $textoBusqueda . '%');
        }

        $actividades = $query->get();
        $actividadesCount = $actividades->count();

        $html = view('partials.actividades_list', ['actividades' => $actividades])->render();

        return response()->json(['html' => $html, 'actividadesCount' => $actividadesCount]);
    }
    */

}
