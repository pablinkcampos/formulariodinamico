<?php

namespace formulariosdinamicos\Http\Controllers;
use formulariosdinamicos\Formulario;
use Illuminate\Support\Facades\DB;
use formulariosdinamicos\Exclusivopregunta;
use formulariosdinamicos\Exclusivorespuesta;
use formulariosdinamicos\Exclusivoalternativa;
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
							$a=$formulario->cantidad_alternativas;
							$id=$formulario->idformularios;
		for ($i=1;$i<=$p;$i++){ 
			
			$pregunta = new Exclusivopregunta;
    		$pregunta->titulo_pregunta = $_REQUEST['pregunta'.$i];;
     		$pregunta->pf_idformularios = $id;
      		$pregunta->respuesta_correcta = $_REQUEST['radio'.$i];;
      		$pregunta->save();
      		for ($j=1;$j<=$a;$j++){ 
			$pregunta = Exclusivopregunta::all()->last();
			$idp=$pregunta->idform_exclusivo;
			$alternativa = new Exclusivoalternativa;
    		$alternativa->nombre_alternativa = $_REQUEST['respuesta'.$i.$j];;
     		$alternativa->fk_idform_exclusivo = $idp;
      		$alternativa->save();

      		
		};	

		};	
		

       
       return view('app');

    	}


	public function postCrearRespuesta(Request $request)
	{
		list($respuesta, $id_pregunta) = explode(" ",$_REQUEST['radio1'] );
		$preguntas = DB::table('form_exclusivo_pregunta')->where('idform_exclusivo', "$id_pregunta")->first();
		
		$idformulario=$preguntas->pf_idformularios;
		$formulario = DB::table('formularios')->where('idformularios', "$idformulario")->first();
							$p=$formulario->cantidad_preguntas;
							
		for ($i=1;$i<=$p;$i++){ 
			
			list($respuesta, $id_pregunta) = explode(" ",$_REQUEST['radio'.$i] );
			$respuestas = new Exclusivorespuesta;
    		$respuestas->usuario_idusuario = 1;
    		$respuestas->pf_idform_exclusivo = $id_pregunta;
    		$respuestas->pf_idformularios = $idformulario;
    		$respuestas->respuesta_marcada = $respuesta;
     		
      		$respuestas->save();
      		
      		
		};	
		
		 return view('app');
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
