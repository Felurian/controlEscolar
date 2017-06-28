<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materias;
use App\Alumnos;
use App\GruposDetalle;

use DB;

class materiasController extends Controller
{
   
   public function registrar(){
         
         return view('registrarMateria');
   }

   public function guardar(Request $datos){
         $materia= new Materias();
         $materia->nombre=$datos->input('nombre');
         $materia->save();

         return redirect('/consultarMaterias');
   }
   public function consultar(){
         $materias=DB::table('materias')
            ->select('materias.*')
            ->paginate(5);

         return view('consultarMaterias', compact('materias'));
   }
   public function eliminar($id){
         $materia=Materias::find($id);
         $materia->delete();
         return redirect('consultarMaterias');
   }
   public function editar($id){
      $materia=DB::table('materias')
         ->where('materias.id', '=', $id)
         ->select('materias.*')
         ->first();

      return view('editarMateria', compact('materia'));
   }
   public function actualizar($id, Request $datos){
      $materia=Materias::find($id);
      $materia->nombre=$datos->input('nombre');
      $materia->save();

      return redirect('consultarMaterias');
   }  

   public function pdf(){
      $materias=Materias::all();
      $vista=view('materiasPDF', compact('materias'));

      $pdf=\App::make('dompdf.wrapper');
      $pdf->loadHTML($vista);
      return $pdf->stream('ListaMaterias.pdf');
   }

   public function cargar($id)
   {
      $alumno = Alumnos::find($id);
      $gruposid=DB::table('grupos_detalle')
         ->join('grupos','grupos.id','=','grupos_detalle.grupo_id')
         ->where('grupos_detalle.alumno_id','=',$id)
         ->pluck('grupos.id');
         

      $lista=DB::table('grupos')
         ->whereNotIn('grupos.id', $gruposid)
         ->join('materias','materias.id','=','grupos.materia_id')
         ->join('maestros','maestros.id','=','grupos.maestro_id')
         ->select('maestros.nombre AS nom_maestro','materias.nombre','grupos.hora','grupos.id AS gid')
         ->get();

      $materias=DB::table('grupos')
         ->whereIn('grupos.id', $gruposid)
         ->join('materias','materias.id','=','grupos.materia_id')
         ->join('maestros','maestros.id','=','grupos.maestro_id')
         ->select('materias.id AS mid','grupos.id AS gid','materias.nombre','grupos.hora','grupos.salon')
         ->get();


      return view('cargarMaterias', compact('lista','materias','alumno'));
   }
   public function cargarGrupo($id, Request $datos)
   {
      $grupos_detalle = new GruposDetalle();
      $grupos_detalle->alumno_id=$id;
      $grupos_detalle->grupo_id=$datos->input('grupo_id');
      $grupos_detalle->save();
      return redirect('/cargarMaterias/'.$id);
   }
   public function quitarGrupo($grupo_id, $alumno_id){
      DB::table('grupos_detalle')
         ->where('grupo_id', '=', $grupo_id)
         ->where('alumno_id', '=', $alumno_id)
         ->delete();
      return redirect('cargarMaterias/'.$alumno_id);
   }
}











