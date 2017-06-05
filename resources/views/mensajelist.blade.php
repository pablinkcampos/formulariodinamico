@extends('app')

	
@section('content')


<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Mensajes</div>
  <div class="panel-body">
  	<ul class="list-group">

     <?php $mensajes = DB::table('mensaje')->where('fk_idgrupo', "$id_curso")->get();
     								
                                         foreach ($mensajes as $mensaje)
                                    {
                                      
                                         echo "<li><a href=\"mensaje/index/\">\n$mensaje->mensaje_titulo \n\n$mensaje->mensaje_src</a></li>";
                                    }
                                
                                
                               
     ?>

     <a href="{!!URL::to('/usuario/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
      <a href="{!!URL::to('/formulario/createconfigex')!!}" class="list-group-item" style="background-color: lightgreen;"> <i class="glyphicon glyphicon-record"></i>  <b>Formulario Exclusivo</b></a>
                                <a href="#" class="list-group-item" style="background-color: lightblue;"> <i class="glyphicon glyphicon-ok"></i>  Formulario Inclusivo</a>
                                <a href="#" class="list-group-item" style="background-color: #ffff80;"> <i class="glyphicon glyphicon-record"></i>  Formulario Prioridad</a>
                                <a href="#" class="list-group-item" style="background-color:  #ff8080;"> <i class="glyphicon glyphicon-shopping-cart"></i>  <b>Formulario Ventas</b></a>                          
	

  <!-- List group -->
  
</div>

@stop

@section('footer')





	



@endsection
