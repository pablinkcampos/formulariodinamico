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
					

  				<form class="form-horizontal" id="form1" method="POST" action="">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
					
						<div class="form-group">
							<label class="col-sm-4 control-label">Titulo de Formulario</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="titulo_formulario" value="">
								
							</div>
						</div>
					
						
					</form>
						<div class="form-group" >
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary" >
									Guardar configuracion formulario
								</button>
							</div>
						</div>
   
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
	for (i=0;i<10;i++){ 
  		var input = document.createElement("input");

  		var div1 = document.createElement("div");
  		var div2 = document.createElement("div");
  		div1.setAttribute("class","form-group;"); 
  		div2.setAttribute("class","col-sm-4"); 
		input.setAttribute("type","text"); 
		input.setAttribute("class","form-control"); 
		input.setAttribute("name","pregunta"+i);
		input.setAttribute("id","pregunta"+i);
	

			
   			document.getElementById("form1").appendChild(input);
   			document.getElementById("pregunta"+i).appendChild(div1);
   			document.getElementById("pregunta"+i).appendChild(div2);

   				for (j=0;j<10;j++){ 
   					
   					
   					var input = document.createElement("input");
   					var radio = document.createElement("input");
					input.setAttribute("type","text"); 
					//input.setAttribute("class","col-md-5 "); 
					input.setAttribute("name","respuesta"+i+j); 
					input.setAttribute("id","respuesta"+i+j); 
					radio.setAttribute("type","radio"); 
					radio.setAttribute("name","respuestas"); 
					radio.setAttribute("id","radio"+i+j); 
					radio.setAttribute("class","radio-inline");
					 
					
   			       
   					document.getElementById("form1").appendChild(input);
   					document.getElementById("form1").appendChild(radio); 
   							
				}
	}
	
	}			
		hacer_formularios();
    </script>

@endsection
