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
        return view('Actividad.createActividad', compact('centroCivicos'));
    }

    public function store(Request $request){
        try {
            $centroCivicos = CentroCivico::all();

            // Validar campos requeridos
            $validator = Validator::make($request->all(), [
                'titulo' => 'required|string|max:30',
                'descripcion' => 'required|string|max:300',
                'fecha_inicio' => 'required|date|before_or_equal:fecha_fin',
                'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
                'dia_1' => 'required|string|in:L,M,X,J,V,S,D',
                'dia_2' => 'nullable|string|in:L,M,X,J,V,S,D',
                'hora_inicio' => 'required',
                'hora_fin' => 'required',
                'idioma' => 'required|string|max:15',
                'plazas_totales' => 'required',
                'plazas_minimas' => 'required',
                'edad_minima' /*=> 'nullable|integer|min:0|max:edad_maxima'*/,
                'edad_maxima' /*=> 'nullable|integer|min:0'*/,
                'centro_civico_id' => 'required|exists:centros_civicos,id',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            /*
             * Se podría poner el "administrador_id" del admin logueado (e implementar vMisActividades
             * para acceder a las creadas por él más fácilmente; y poder ver/editar/eliminar).
             * */
            $actividad->centro_civico_id = $request->input('centro_civico_id');
            $actividad->imagen = $imagenPath;

            $actividad->save();

        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()])->withInput();
        }

        return view('Actividad.createActividad', compact('centroCivicos'));
    }

    public function index(Request $request){

        $result = $this->filtrarActividades($request);

        return view('Actividad.listActividades', [
            'actividades' => $result['actividades'],
            'actividadesTotales' => $result['actividadesTotales'],
            'centroCivicos' => CentroCivico::all(),
        ]);
    }

    public function show(Request $request, $id){

        $result = $this->filtrarActividades($request, $id);

        return view('Actividad.listActividades', [
            'actividades' => $result['actividades'],
            'actividadesTotales' => $result['actividadesTotales'],
            'centroCivicos' => CentroCivico::all(),
            'centroSeleccionado' => $id,
        ]);
    }

    public function filtrarActividades(Request $request, $id = null){
        $query = Actividad::query();

        if ($id) {
            $query->where('centro_civico_id', $id);
        }

        // Aplicar filtros solo si están presentes y no son nulos
        if ($request->has('centro_civico') && $request->query('centro_civico') !== null) {
            $query->where('centro_civico_id', $request->query('centro_civico'));
        }
        if ($request->has('edad') && $request->query('edad') !== null) {
            $edad = intval($request->query('edad'));
            $query->where('edad_minima', '<=', $edad)
                ->where('edad_maxima', '>=', $edad)
                ->whereNotNull('edad_minima')
                ->whereNotNull('edad_maxima');
        }
        if ($request->has('idioma') && $request->query('idioma') !== null
            && $request->query('idioma') !== 'todos') {
                $query->where('idioma', $request->query('idioma'));
        }
        if ($request->has('horario') && $request->query('horario') !== null) {
            $horario = $request->query('horario');
            if (preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/', $horario)) {
                $horarioSegundos = $this->horaAsegundos($horario);
                $query->where(function ($q) use ($horarioSegundos) {
                    $q->whereRaw('TIME_TO_SEC(hora_inicio) <= ?', [$horarioSegundos])
                        ->whereRaw('TIME_TO_SEC(hora_fin) >= ?', [$horarioSegundos]);
                });
            }
        }
        if ($request->has('textoBusqueda') && $request->query('textoBusqueda') !== null) {
            $query->where('titulo', 'like', '%' . $request->query('textoBusqueda') . '%')
                ->orWhere('descripcion', 'like', '%' . $request->query('textoBusqueda') . '%');
        }

        $actividades = $query->get();

        // Contar el total de actividades encontradas
        $actividadesTotales = $actividades->count();

        // Código para mostrar por pantalla los valores de los filtros como logs de depuración
        //dump($request->all());

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

    public function destroy(Request $request){
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
        return view('Actividad.editActividad', compact('datos'));
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

        return redirect()->route('Actividad.showActividades')->with('success', 'Actividad actualizada correctamente');
    }

}
