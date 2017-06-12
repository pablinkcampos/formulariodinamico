<?php namespace formulariosdinamicos\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use formulariosdinamicos\Http\Controllers\Controller;
use formulariosdinamicos\Formulario;
use formulariosdinamicos\Mensaje;
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
		return view('app');
	}

	public function getMostrarformulario($id)
	{
		return view('formulario.mostrarforex')->with('id_mensaje',$id);
	}

	public function getCrearFormex($id)
	{
		return  view('formulario.createfex')->with('id_curso',$id);
	}

	public function postCrearFormex(Request $request)
	{
		$mensaje= new Mensaje;
		$mensaje->mensaje_titulo = $request->mensaje_titulo;
		$mensaje->mensaje_src = $request->mensaje_src;
		$mensaje->fk_idgrupo = $request->id_curso;
		$mensaje->fk_idprioridad = 1;
		$mensaje->fk_idusuario = 1;
		$formulario = new Formulario;
    	$formulario->titulo_formulario = $request->titulo_formulario;
     	$formulario->tipo = $request->tipo;
      	$formulario->cantidad_preguntas = $request->cantidad_preguntas;
      	$formulario->cantidad_alternativas = $request->cantidad_alternativas;
        $formulario->visible = $request->visible;
    	$formulario->fecha_expiracion = $request->fecha_expiracion;
    	
    	$formulario->save();

    	$form=Formulario::all()->last();
    	$idf=$form->idformularios;
    	$mensaje->fk_formularios = $idf;
		
		$mensaje->save();
       
       return view("formulario.createforex")->with('cantidad_preguntas',$request->cantidad_preguntas)->with('cantidad_alternativas',$request->cantidad_alternativas);

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