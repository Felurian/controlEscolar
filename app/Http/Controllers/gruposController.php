<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupos;
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
      $grupo->hora   =$datos->input('hora');
      $grupo->salon  =$datos->input('salon');
      $grupo->save();

      return redirect('consultarGrupos');
   }  
   
}











