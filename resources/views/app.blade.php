<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hola</title>
    {!!Html::style('css/bootstrap-datetimepicker.min.css')!!}
    {!!Html::style('css/bootstrap-datetimepicker.css')!!}
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/metisMenu.min.css')!!}
    {!!Html::style('css/sb-admin-2.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
    {!!Html::script('jquery.js')!!}
    {!!Html::style('jquery.datetimepicker.css')!!}
    

</head>

<body>

    <div id="wrapper">

        
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Proyecto Formularios</a>
            </div>
           

            <ul class="nav navbar-top-links navbar-right">
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ajustes</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-education"></i> Cursos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php $cursos = DB::table('grupo')->get();

                                    foreach ($cursos as $curso)
                                    {
                                        
                                        $var= $curso->idgrupo;

                                         echo "<li><a href=\"mensaje/$var\">$curso->nombre</a></li>";
                                    }
                                
                                
                               
                                ?>
                                 <li>
                                    <li><a href="stats.html"><i class="glyphicon glyphicon-stats"></i> Estadisticas</a></li>
                    <!-- <li><a href="tables.html"><i class="glyphicon glyphicon-list"></i> Tables</a></li> -->
                    <!-- <li><a href="buttons.html"><i class="glyphicon glyphicon-record"></i> Buttons</a></li> -->
                                    <li><a href="editors.html"><i class="glyphicon glyphicon-pencil"></i> Inscripción</a></li>
                                    <li><a href="forms.html"><i class="glyphicon glyphicon-tasks"></i> Formularios</a></li>
                                    <a href="{!!URL::to('/mensaje/1')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                
                            </ul>
                        </li>
                    

                    </ul>
                </div>
                
            </div>

     </nav>
        
        <div id="page-wrapper">
                 @yield('content')     
        </div>
        

    </div>
    

    {!!Html::script('js/jquery.min.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}
    {!!Html::script('js/metisMenu.min.js')!!}
    {!!Html::script('js/sb-admin-2.js')!!}
 	{!!Html::script('js/bootstrap-datetimepicker.js')!!}
    {!!Html::script('js/materialize.js')!!}
    {!!Html::script('js/materialize.min.js')!!}
    
 </body>
  <footer>
         <div class="container">
         
            <div class="copy text-center">
               Ingenieria de software 2017
            </div>
            
         </div>
      </footer>

</html>