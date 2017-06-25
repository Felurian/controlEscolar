<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupos;
use DB;

class gruposController extends Controller
{
   
   public function registrar(){
         
         return view('registrarGrupo');
   }

   public function guardar(Request $datos){
         $grupo= new Grupos();
         $grupo->materia=$datos->input('materia');
         $grupo->maestro=$datos->input('maestro');
         $grupo->hora   =$datos->input('hora');
         $grupo->salon  =$datos->input('salon');
         $grupo->save();

         return redirect('/consultarGrupos');
   }
   public function consultar(){
         $grupos=DB::table('grupos')
            ->select('grupos.*')
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
         ->select('grupos.*')
         ->first();

      return view('editarGrupo', compact('grupo'));
   }
   public function actualizar($id, Request $datos){
      $grupo=Grupos::find($id);
      $grupo->materia=$datos->input('materia');
      $grupo->maestro=$datos->input('maestro');
      $grupo->hora   =$datos->input('hora');
      $grupo->salon  =$datos->input('salon');
      $grupo->save();

      return redirect('consultarGrupos');
   }  
   
}











