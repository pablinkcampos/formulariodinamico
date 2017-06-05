<?php

namespace formulariosdinamicos\Http\Controllers;
use formulariosdinamicos\Formulario;
use formulariosdinamicos\Exclusivopregunta;
use Illuminate\Http\Request;

class ExclusivoController extends Controller
{
    
	public function getIndex()
	{
		return view('home');
	}

	public function getCrearFormex()
	{
		return  view('formulario.createforex');
	}

	public function postCrearPregunta(Request $request)
	{
		$formulario = Formulario::all()->last();
							$p=$formulario->cantidad_preguntas;
							$id=$formulario->idformularios;
		for ($i=1;$i<=$p;$i++){ 
			
			$pregunta = new Exclusivopregunta;
    		$pregunta->titulo_pregunta = $_REQUEST['pregunta'.$i];;
     		$pregunta->pf_idformularios = $id;
      		$pregunta->respuesta_correcta = $_REQUEST['radio'.$i];;
      		$pregunta->save();
		};	
		

       
       echo 'se guardo';
	}

	public function getActualizarForm()
	{
		return 'mostrar formulario actualizar';
	}
	public function postActualizarForm()
	{
		return 'recibe almacenar form';
	}

	public function getEliminarForm()
	{
		return 'muestra formulario';
	}
	public function postEliminarForm()
	{
		return 'elimina form';
	}

}
