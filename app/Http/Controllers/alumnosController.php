<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carreras;
use App\Alumnos;
use DB;

class alumnosController extends Controller
{
   public function registrar(){
   		$carreras=Carreras::all();
   		return view('registrarAlumno', compact('carreras'));
   }

   public function guardar(Request $datos){
   		$alumno= new Alumnos();
   		$alumno->nombre=$datos->input('nombre');
   		$alumno->numero_control=$datos->input('control');
   		$alumno->edad=$datos->input('edad');
   		$alumno->sexo=$datos->input('sexo');
   		$alumno->carrera_id=$datos->input('carrera');
   		$alumno->save();
         flash('¡Se registró correctamente el Alumno!')->success();
   		return redirect('/consultarAlumnos');
   }

   public function consultar(){
   		//$alumnos=Alumnos::paginate(5);
      $alumnos=DB::table('alumnos')
         ->join('carreras', 'alumnos.carrera_id', '=', 'carreras.id')
         ->select('alumnos.*', 'carreras.nombre AS nom_carrera')
         ->paginate(5);

   	return view('consultarAlumnos', compact('alumnos'));
   }

   public function eliminar($id){
      $alumno=Alumnos::find($id);
      $alumno->delete();
         flash('Alumno eliminado exitosamente')->success();
      return redirect('consultarAlumnos');
   }

   public function editar($id){
      $alumno=DB::table('alumnos')
         ->where('alumnos.id', '=', $id)
         ->join('carreras', 'alumnos.carrera_id', '=', 'carreras.id')
         ->select('alumnos.*', 'carreras.nombre AS nom_carrera')
         ->first();
      $carreras=Carreras::all();
      return view('editarAlumno', compact('alumno', 'carreras'));
   }

   public function actualizar($id, Request $datos){
      $alumno=Alumnos::find($id);
      $alumno->nombre=$datos->input('nombre');
      $alumno->numero_control=$datos->input('control');
      $alumno->edad=$datos->input('edad');
      $alumno->sexo=$datos->input('sexo');
      $alumno->carrera_id=$datos->input('carrera');
      $alumno->save();

      flash('Datos guardados exitosamente')->success();
      return redirect('consultarAlumnos');
   }

   public function pdf()
   {
      $alumnos=DB::table('alumnos')
         ->join('carreras', 'alumnos.carrera_id', '=', 'carreras.id')
         ->select('alumnos.*', 'carreras.nombre AS nom_carrera')
         ->get();
      $vista=view('alumnosPDF', compact('alumnos'));

      $pdf=\App::make('dompdf.wrapper');
      $pdf->loadHTML($vista);
      return $pdf->stream('ListaAlumnos.pdf');
   }
   public function boletaPDF($a)
   {
      $datos=DB::table('grupos_detalle')
         ->join('alumnos', 'grupos_detalle.alumno_id', '=', 'alumnos.id')
         ->join('grupos','grupos_detalle.grupo_id','=','grupos.id')
         ->join('maestros', 'grupos.maestro_id', '=', 'maestros.id')
         ->join('materias', 'grupos.materia_id', '=', 'materias.id')
         ->where('grupos_detalle.alumno_id', '=', $a)
         ->select('materias.nombre AS nom_materia','materias.id AS mid', 'grupos_detalle.calificacion','alumnos.nombre','alumnos.numero_control')
         ->get();


      $vista=view('boletaPDF', compact('datos'));

      $pdf=\App::make('dompdf.wrapper');
      $pdf->loadHTML($vista);
      return $pdf->stream('Boleta.pdf');

   }
}












