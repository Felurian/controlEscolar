<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materias;
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
   
}











