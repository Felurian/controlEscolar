<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupos;
use App\GruposDetalle;
use App\Materias;
use App\Maestros;
use DB;

class gruposController extends Controller
{
   
   public function registrar(){
      $materias=Materias::all();
      $maestros=Maestros::all();
      return view('registrarGrupo', compact('materias', 'maestros'));
   }

   public function guardar(Request $datos){
      $grupo= new Grupos();
      $grupo->materia_id=$datos->input('materia');
      $grupo->maestro_id=$datos->input('maestro');
      $grupo->hora   =$datos->input('hora');
      $grupo->salon  =$datos->input('salon');
      $grupo->save();
      return redirect('/consultarGrupos');
   }
   public function consultar(){
      $grupos=DB::table('grupos')
         ->join('materias', 'grupos.materia_id', '=', 'materias.id')
         ->join('maestros', 'grupos.maestro_id', '=', 'maestros.id')
         ->select('grupos.*', 'materias.nombre AS nom_materia', 'maestros.nombre AS nom_maestro')
         ->paginate(5);
      return view('consultarGrupos', compact('grupos'));
   }
   public function eliminar($id){
      $grupo=Grupos::find($id);
      $grupo->delete();
      return redirect('consultarGrupos');
   }
   public function editar($id){
      $grupo=DB::table('grupos')
         ->where('grupos.id', '=', $id)
         ->join('materias', 'grupos.materia_id', '=', 'materias.id')
         ->join('maestros', 'grupos.maestro_id', '=', 'maestros.id')
         ->select('grupos.*', 'materias.nombre AS nom_materia', 'maestros.nombre AS nom_maestro')
         ->first();
      $materias=Materias::all();
      $maestros=Maestros::all();
      return view('editarGrupo', compact('grupo', 'materias', 'maestros'));
   }
   public function actualizar($id, Request $datos){
      $grupo=Grupos::find($id);
      $grupo->materia_id=$datos->input('materia');
      $grupo->maestro_id=$datos->input('maestro');
      $grupo->hora      =$datos->input('hora');
      $grupo->salon     =$datos->input('salon');
      $grupo->save();

      return redirect('consultarGrupos');
   }  
   
   public function detalleGrupo($id){
      $alumnos=DB::table('grupos_detalle')
         ->where('grupos_detalle.grupo_id', '=', $id)
         ->join('alumnos', 'grupos_detalle.alumno_id', '=', 'alumnos.id')
         ->select('alumnos.*')
         ->paginate(5);
      $grupo=DB::table('grupos')
         ->where('grupos.id', '=', $id)
         ->join('materias', 'grupos.materia_id', '=', 'materias.id')
         ->join('maestros', 'grupos.maestro_id', '=', 'maestros.id')
         ->select('grupos.*', 'materias.nombre as nom_materia', 'maestros.nombre as nom_maestro')
         ->first();
      return view('detalleGrupo', compact('alumnos', 'grupo'));
   }

   public function eliminarAlumno($grupo_id, $alumno_id){
      DB::table('grupos_detalle')
         ->where('grupo_id', '=', $grupo_id)
         ->where('alumno_id', '=', $alumno_id)
         ->delete();
      return redirect('detalleGrupo/'.$grupo_id);
   }

   public function agregarAlumno($id){
      $inscritos=DB::table('alumnos')
         ->leftJoin('grupos_detalle', 'alumnos.id', '=', 'grupos_detalle.alumno_id')
         ->where('grupos_detalle.grupo_id', '=', $id)
         ->select('alumnos.*')
         ->get();
      $inscritos = $inscritos->all(); // convertir de Collection a arreglo
      $inscrito_ids = [];
      foreach ($inscritos as $e) {
         $inscrito_ids[] = $e->id;
      }
      $alumnos=DB::table('alumnos')
         ->select('alumnos.*')
         ->whereNotIn('id', $inscrito_ids)
         ->paginate(5);
      $grupo_id = $id;
      return view('agregarAlumnoGrupo', compact('alumnos', 'grupo_id'));
   }

   public function guardarAlumno($grupo_id, $alumno_id){
      $entrada= new GruposDetalle();
      $entrada->grupo_id = $grupo_id;
      $entrada->alumno_id = $alumno_id;
      $entrada->save();
      return redirect('detalleGrupo/'.$grupo_id);
   }

   public function pdf($gid){
      $alumnos=DB::table('grupos_detalle')
         ->where('grupos_detalle.grupo_id', '=', $gid)
         ->join('alumnos', 'grupos_detalle.alumno_id', '=', 'alumnos.id')
         ->select('alumnos.*')
         ->get();
      $grupo=DB::table('grupos')
         ->where('grupos.id', '=', $gid)
         ->join('materias', 'grupos.materia_id', '=', 'materias.id')
         ->join('maestros', 'grupos.maestro_id', '=', 'maestros.id')
         ->select('grupos.*', 'materias.nombre as nom_materia', 'materias.id as id_materia', 'maestros.nombre as nom_maestro', 'maestros.id as id_maestro')
         ->first();
      $vista=view('grupoPDF', compact('alumnos', 'grupo'));

      $pdf=\App::make('dompdf.wrapper');
      $pdf->loadHTML($vista);
      return $pdf->stream('ListaAlumnos.pdf');
   }
}











