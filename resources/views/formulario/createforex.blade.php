@extends('app')



@section('content')

<div class="container fluid">
	<div class="row">
			<div class="panel panel-default fluid">
				<div class="panel-heading "> <H4 align= center>Crear Formulario Exclusivo</H4> </div>
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
					
				
  				<form class="form-horizontal" id="form1" method="POST" action="{!!URL::to('/formulario/storepregunta')!!}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
					
						<h1 align=center ><?php use formulariosdinamicos\Formulario; 
							$titulo = Formulario::all()->last();
							echo $titulo->titulo_formulario; ?></h1>


					<div class="form-group" >
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary" >
									Guardar configuracion formulario
								</button>
							</div>
						</div>		
							
					
						
					</form>
						
   
</div>
</div>

</form>
				</div>
			</div>
		</div>
</div>

 <script type="text/javascript">
             

	//set up the 'Add New Question' button
	function hacer_formularios()
	    {
	   alert("ya se cargo");

	  var preguntas = <?php echo $cantidad_preguntas; ?>;
	  var alternativas = <?php echo $cantidad_alternativas; ?>;


	  var p = parseInt(preguntas);
	  var a = parseInt(alternativas);
	for (i=1;i<=p;i++){ 
  		var input = document.createElement("input");
  		input.setAttribute("placeholder","Pregunta"+" "+i); 

  		input.setAttribute("class","form-control"); 
  		input.setAttribute("style","margin: 10px"); 
		input.setAttribute("type","text"); 
		input.setAttribute("name","pregunta"+i);
		input.setAttribute("id","pregunta"+i);
	

   			document.getElementById("form1").appendChild(input);
   		

   				for (j=1;j<=a;j++){ 
   					
   					
   					var input = document.createElement("input");
   					var radio = document.createElement("input");
					input.setAttribute("type","text"); 
					input.setAttribute("placeholder","alternativa"+" "+j); 
					input.setAttribute("class","col-md-offset-1 "); 
					input.setAttribute("style","margin: 10px"); 
					input.setAttribute("name","respuesta"+i+j); 
					input.setAttribute("id","respuesta"+i+j); 
					radio.setAttribute("type","radio"); 
					radio.setAttribute("name","radio"+i); 
					radio.setAttribute("id","radio"+i+j); 
					radio.setAttribute("value",j);
					radio.setAttribute("class","radio-inline");
					 
					
   			       
   					document.getElementById("form1").appendChild(input);
   					document.getElementById("form1").appendChild(radio);
   				
   							
				}
	}
	
	}			
		hacer_formularios();
    </script>

@endsection
