<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maestros;
use DB;

class maestrosController extends Controller
{
   public function registrar(){
   		
   		return view('registrarMaestro');
   }

   public function guardar(Request $datos){
         $maestro= new Maestros();
         $maestro->nombre=$datos->input('nombre');
         $maestro->rfc=$datos->input('rfc');
         $maestro->edad=$datos->input('edad');
         $maestro->sexo=$datos->input('sexo');
         $maestro->save();

         flash('Datos guardados exitosamente')->success();
         return redirect('/consultarMaestros');
   }
   public function consultar(){
         $maestros=DB::table('maestros')
            ->select('maestros.*')
            ->paginate(5);

         return view('consultarMaestros', compact('maestros'));
   }
   public function eliminar($id){
         $maestro=Maestros::find($id);
         $maestro->delete();

         flash('Datos eliminados exitosamente')->success();
         return redirect('consultarMaestros');
   }
   public function editar($id){
      $maestro=DB::table('maestros')
         ->where('maestros.id', '=', $id)
         ->select('maestros.*')
         ->first();

      return view('editarMaestro', compact('maestro'));
   }
   public function actualizar($id, Request $datos){
      $maestro=Maestros::find($id);
      $maestro->nombre=$datos->input('nombre');
      $maestro->rfc=$datos->input('rfc');
      $maestro->edad=$datos->input('edad');
      $maestro->sexo=$datos->input('sexo');
      $maestro->save();
      
      flash('Datos guardados exitosamente')->success();
      return redirect('consultarMaestros');
   }  

   public function pdf(){
      $maestros=Maestros::all();
      $vista=view('maestrosPDF', compact('maestros'));

      $pdf=\App::make('dompdf.wrapper');
      $pdf->loadHTML($vista);
      return $pdf->stream('ListaMaestros.pdf');
   }
   
}











