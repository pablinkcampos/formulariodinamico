<?php namespace formulariosdinamicos\Http\Controllers;

use Illuminate\Http\Request;


use formulariosdinamicos\Http\Controllers\Controller;
use formulariosdinamicos\Mensaje;
use Session;
use Redirect;
use Illuminate\Routing\Route;

class MensajeController extends Controller {



	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function getIndex($id)

	{
		
		return view('mensajelist')->with('id_curso',$id);
	}

	public function getCrearFormex()
	{
		return  view('formulario.createfex');
	}

	public function postCrearFormex(Request $request)
	{

		$formulario = new Formulario;
    	//$formulario->titulo_formulario = $request->titulo_formulario;
     	//$formulario->tipo = $request->tipo;
      	//$formulario->cantidad_preguntas = $request->cantidad_preguntas;
      	//$formulario->cantidad_alternativas = $request->cantidad_alternativas;
        //$formulario->visible = $request->visible;
    	//$formulario->fecha_expiracion = $request->fecha_expiracion;
    	$formulario->titulo_formulario = "hola";
     	$formulario->tipo ="A";
      	$formulario->cantidad_preguntas =1;
      	$formulario->cantidad_alternativas =1;
        $formulario->visible =1;
    	 
    	$formulario->save();
		dd($request->input('visible'));
       
        return 'espera';
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
