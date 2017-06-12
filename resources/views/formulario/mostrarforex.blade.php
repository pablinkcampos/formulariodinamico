@extends('app')



@section('content')

<div class="container fluid">
	<div class="row">
			<div class="panel panel-default fluid">
				<div class="panel-heading "> <H4 align= center>Responder Formulario Exclusivo</H4> </div>
				<div class="panel-body ">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					
				
  				<form class="form-horizontal" id="form1" method="POST" action="{!!URL::to('/formulario/storerespuesta')!!}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
					
						<h1 align=center margin=20px> <?php $mensaje= DB::table('mensaje')->where('idmensaje', "$id_mensaje")->first(); echo $mensaje->mensaje_titulo; ?></h1>
						<p align=center margin=20px> <?php $mensaje= DB::table('mensaje')->where('idmensaje', "$id_mensaje")->first(); echo $mensaje->mensaje_src; ?></p>



						<h2 align=center margin=100px ><?php use formulariosdinamicos\Formulario; 
							
							

							$idform= $mensaje->fk_formularios;
							$formulario = DB::table('formularios')->where('idformularios', "$idform")->first();
							echo $formulario->titulo_formulario; 
							?></h2>

							 <?php $preguntas = DB::table('form_exclusivo_pregunta')->where('pf_idformularios', "$idform")->get();
							       	$i=0;
							       	
							       foreach ($preguntas as $pregunta)
                                    {
                                      	$i++;
                                         //echo "<ul class='list-unstyled' style='margin: 10px'>$pregunta->titulo_pregunta";
                                          echo "<table class='table table-bordered' <thead > <tr> $pregunta->titulo_pregunta</thead></tr><thbody>";
                                          $id_pregunta=$pregunta->idform_exclusivo;
                                          $alternativas = DB::table('alternativa_exclusiva')->where('fk_idform_exclusivo', "$id_pregunta")->get();
                                          $j=0;
                                          echo "<tr'>";
                                          
                                          foreach ($alternativas as $alternativa){
                                          	$j++;
                                          	echo "<td ><input name='radio$i' id='radio$i$j' value='$j $id_pregunta' class='radio-inline' type='radio' style='margin: 10px'>$alternativa->nombre_alternativa </td>";
                                     		 
                                         	
                                    	 }
                                    	 echo "</tr>";
                                    	 echo "</thbody>";

                                    	 echo"</table>";
                                    	 
                                    }
                                
                                ?>


					<div class="form-group" >
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary" >
									Guardar respuestas formulario
								</button>
							</div>
						</div>		
							
					
						
					</form>
						
   
			</div>
		</div>
	</div>

</div>
	


 

@endsection
