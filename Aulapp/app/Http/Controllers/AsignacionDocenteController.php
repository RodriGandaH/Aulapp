<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAsignacion;
use App\Models\asignacionDocentes;
use App\Models\gestion;
use App\Models\Grupo;
use App\Models\Materia;
use App\Models\UserRol;
use Illuminate\Http\Request;

class AsignacionDocenteController extends Controller
{

    public function registro()
    {
        $materias = Materia::where('estado', true)->get();
        $grupos=Grupo::join("materia_carreras","materia_carreras.id","=","grupos.materia_carrera_id")->join("materias","materias.id","=","materia_carreras.materia_id")->where('grupos.estado', true)->select("grupos.*","materias.id as materia_id")->get();
        $grupos=$grupos->unique('nombre','materia_id');
        $docentes = UserRol::all();
        $gestion=gestion::firstWhere('estado',true);
        $docente_grupos= asignacionDocentes::where('gestion_id',$gestion->id)->get();
        $filtered = $grupos->reject(function ($value, $key) {
            $gestion=gestion::firstWhere('estado',true);
            $docente_grupos= asignacionDocentes::where('gestion_id',$gestion->id)->get();
            return $docente_grupos->contains('grupo_id',$value->id);
        });
  
        return view('Asignacion-Docente.registro_asignacion_docente', ['materias' => $materias, 'docentes' => $docentes, 'docente_materias' => $docente_grupos,'grupos'=>$filtered]);
    }

    public function store(StoreAsignacion $request)
    {
        
        $grupos=Grupo::join("materia_carreras","materia_carreras.id","=","grupos.materia_carrera_id")->join("materias","materias.id","=","materia_carreras.materia_id")->where('grupos.estado', true)->where('grupos.nombre',$request->grupo)->where('materias.id',$request->materia)->select("grupos.id")->get();
        
        
       $gestion=gestion::firstWhere('estado', true);
        foreach($grupos as $grupo){
            $asignacion_docente = new asignacionDocentes();
            $asignacion_docente->user_rol_id = $request->docente;
            $asignacion_docente->grupo_id = $grupo->id;
            $asignacion_docente->gestion_id=$gestion->id;
            $asignacion_docente->save();
        }
        

        return redirect()->route('materia_docente')->with('registrar', 'ok');

    }

    public function busqueda(Request $request)
    {

        try {
            $asignacionDocente = asignacionDocentes::query();

            if ($request->has('search')) {
                $asignacionDocente->where('id', 'like', $request->search);
            }
            $asignacionDocentes = $asignacionDocente->get();
            return view('Asignacion-Docente.eliminar_asignacion_docente', compact('asignacionDocentes'));

        } catch (\Throwable $th) {
            return redirect()->route('eliminar-asignacion-docente')->with('buscar', 'error');

        }

    }
    public function reporte()
    {

        $asignacionDocentes = asignacionDocentes::all();
        return view('Asignacion-Docente.reporte_asignacion_docente', compact('asignacionDocentes'));

    }
    public function estado($asignacion_docente)
    {
        $asignacion_docente = asignacionDocentes::find($asignacion_docente);
        $asignacion_docente->estado = false;
        $asignacion_docente->save();

        //$asignacion_docente->where('id', $asignacion_docente->id)->update(['estado' => false]);

        return redirect()->route('eliminar-asignacion-docente')->with('eliminar', 'ok');
    }
}