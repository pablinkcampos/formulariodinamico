<?php

namespace formulariosdinamicos\Http\Controllers;

use Illuminate\Http\Request;

class ExclusivoController extends Controller
{
    / * @return Response
	 */
	public function getIndex()
	{
		return view('home');
	}

	public function getCrearFormex()
	{
		return  view('formulario.createforex');
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
/
}
