<?php namespace FormulariosD\Http\Controllers;

use Illuminate\Http\Request;


use FormulariosD\Http\Controllers\Controller;
use FormulariosD\Formulario;
use Session;
use Redirect;
use Illuminate\Routing\Route;

class FormularioController extends Controller {



	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return view('home');
	}

	public function getCrearFormex()
	{
		return  view('formulario.createfex');
	}

	public function postCrearFormex(Request $request)
	{

		$formulario = new Formulario;
    	$formulario->titulo_formulario = $request->titulo_formulario;
     	$formulario->tipo = $request->tipo;
      	$formulario->cantidad_preguntas = $request->cantidad_preguntas;
      	$formulario->cantidad_alternativas = $request->cantidad_alternativas;
        $formulario->visible = $request->visible;
    	$formulario->fecha_expiracion = $request->fecha_expiracion;
    	
    	$formulario->save();
		
       
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