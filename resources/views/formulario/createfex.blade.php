@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Crear Formulario Exclusivo</div>
				<div class="panel-body">
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

					<form class="form-horizontal" role="form" method="POST" action="{!!URL::to('/formulario/storeconfigex')!!}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="tipo" value="A">
						<input type="hidden" name="id_curso" value="{{ $id_curso }}">
						
						<div class="form-group">
							<label class="col-md-4 control-label">Titulo del mensaje</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="mensaje_titulo" value="">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">descripcion</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="mensaje_src" value="">
							</div>
						</div>



						<div class="form-group">
							<label class="col-md-4 control-label">Titulo de Formulario</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="titulo_formulario" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Cantidad de preguntas</label>
							<div class="col-md-6">
								<input type="number" class="form-control" name="cantidad_preguntas" value="1" min="1" max="10">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Cantidad de alternativas</label>
							<div class="col-md-6">
								<input type="number" class="form-control" name="cantidad_alternativas" value="1" min="1" max="10">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Privacidad</label>
							<label class="radio-inline">
  							<input type="radio" name="visible" id="publico" value="1"> Publico
							</label>
							<label class="radio-inline">
  							<input type="radio" name="visible" id="privado" value="0"> Privado
							</label>
						</div>
						<div class="form-group">
							<div class="container">
    							<div class="col-sm-6" style="height:130px;">
      							  <div class="form-group">
        							<label class="col-md-4 control-label">Fecha</label>
           							 <div class='input-group date' id='datetimepicker1' name="fecha">
              						  <input type='text' class="form-control" name="fecha_expiracion" >
               							<span class="input-group-addon">
                   						 <span class="fa fa-calendar">
                    						</span>
               							 </span>
           							 </div>
        						</div>
   						 </div>
    




    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            });
        });
    </script>
</div>
</div>
						
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Guardar configuracion formulario
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
