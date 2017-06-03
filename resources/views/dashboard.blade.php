<?php 
	//session_start();
	//receiving data from page 1 on page 2.
    $datosUsuario = 1;
    //$_SESSION['idUsuarioAuthenticated'];
    //echo $datosUsuario[0],"<-- id del playo";

    //error_reporting(E_ALL ^ E_DEPRECATED); //remove after update mysql to mysqli or pdo to fix this error
	//$connect = mysql_connect('localhost','login_name', 'login_password');

    SELECT grupo.nombre FROM grupo, listado WHERE (grupo.idgrupo = listado.fk_idgrupo) AND listado.fk_idusuario = 3;
    $queryStr = 'SELECT grupo.nombre FROM final_formularios_schema.grupo, final_formularios_schema.listado WHERE (final_formularios_schema.grupo.idgrupo = final_formularios_schema.listado.fk_idgrupo) AND final_formularios_schema.listado.fk_idusuario =';
    $queryStr = $queryStr.$datosUsuario[0];
    echo $queryStr;
    $cursos = mysql_query($queryStr);
    
    //$queryStr = 'SELECT mensaje.mensaje_titulo, mensaje.mensaje_src, mensaje.fecha, mensaje.fk_idgrupo, mensaje.fk_idprioridad, mensaje.fk_formularios FROM mensaje WHERE fk_idusuario =';
    $queryStr = 'SELECT mensaje.mensaje_titulo, mensaje.fk_idprioridad FROM final_formularios_schema.mensaje WHERE fk_idusuario=';
    $queryStr = $queryStr.$datosUsuario[0];
    echo "<br>", $queryStr;
    
    $mensajes = mysql_query($queryStr);
    //$cursos = mysql_fetch_row($query);
    //print_r($cursos);
    
    echo "<br>",$cursos;
    echo "<br>",$mensajes;
    /*while($row_msg = mysql_fetch_array($mensajes))
	{
    	echo "$row_msg[mensaje_titulo]";
    }
    */
    
	//mysql_free_result($cursos);

	/**********funcionando****
	<?php
						  			while($row_msg = mysql_fetch_array($mensajes))
									{
								    	echo "<a href=\"#\" class=\"list-group-item\"> $row_msg[mensaje_titulo] </a>";
								    }
								    mysql_free_result($mensajes);
						  		?>
	*/
?>


<html lang="{{ config('app.locale') }}">
<head>
	<title>Dashboard - UCM</title>
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<!--
	<script src="js/bootstrap.js"></script>
	-->

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div class="header">
	    <div class="container">
	        <div class="row">
	    	    <div class="col-md-5">
	            <!-- Logo -->
	        	    <div class="logo">
	                	<h1><a href="#">Proyecto Formularios</a></h1>
	              	</div>
	            </div>
	           
	            <div class="col-md-7">
	                <div class="navbar navbar-inverse" role="banner">
	                	<nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    	<ul class="nav navbar-nav">
	                    		<li class="dropdown">
	                        		<a href="../" class="dropdown-toggle"><?php echo $datosUsuario[2]?></a>
	                      		</li>
	                        	<li>
	                        		<a href="../" class="dropdown-toggle">Salir</a>
	                        	</li>
	                    	</ul>
	                  	</nav>
	              	</div>
	           	</div>
	        </div>
	    </div>
	</div>

	<div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="index.html"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
					<!-- list of courses -->                    
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-education"></i> Cursos
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                         	<?php while($row = mysql_fetch_array($cursos))
    						{
						    	echo "<li><a href=\"#\">$row[nombre]</a></li>";
						    }
						    mysql_free_result($cursos);
						    ?>
                        </ul>
                    </li>


                    <li><a href="stats.html"><i class="glyphicon glyphicon-stats"></i> Estadisticas</a></li>
                    <!-- <li><a href="tables.html"><i class="glyphicon glyphicon-list"></i> Tables</a></li> -->
                    <!-- <li><a href="buttons.html"><i class="glyphicon glyphicon-record"></i> Buttons</a></li> -->
                    <li><a href="editors.html"><i class="glyphicon glyphicon-pencil"></i> Inscripción</a></li>
                    <li><a href="forms.html"><i class="glyphicon glyphicon-tasks"></i> Formularios</a></li>
                </ul>
             </div>
		  </div>
		  
			<div class="col-md-10 ">
		  		<div class="row">
					<div class="container" >
		  				<div class="col-md-11" >
						  	<h2>Mensajes</h2>
						  	<div class="list-group">
						  		<?php
						  			while($row_msg = mysql_fetch_array($mensajes))
									{
								    	echo "<a href=\"#\" class=\"list-group-item\"";
								    	
								    	/*if($row_msg[fk_idprioridad] == 2)
								    	{
								    		echo " style=\"background-color: lightgreen;\"";
								    	}
								    	if($row_msg[fk_idprioridad] == 3)
								    	{
								    		echo " style=\"background-color: #ffff80;\"";
								    	}
								    	if($row_msg[fk_idprioridad] == 4)
								    	{
								    		echo " style=\"background-color: #ff8080;\"";
								    	}
								    	*/
								    	echo ">";
								    	echo "<b>$row_msg[mensaje_titulo] $row_msg[fk_idprioridad]</b></a>";
								    }
								    mysql_free_result($mensajes);
						  		?>
							  	<a href="#" class="list-group-item"> <i class="glyphicon glyphicon-record"></i>  Formulario Exclusivo</a>
							    <a href="#" class="list-group-item"> <i class="glyphicon glyphicon-ok"></i>  Formulario Inclusivo</a>
							    <a href="#" class="list-group-item"> <i class="glyphicon glyphicon-record"></i>  Formulario Prioridad</a>
								<a href="#" class="list-group-item"> <i class="glyphicon glyphicon-shopping-cart"></i>  Formulario Ventas</a>						  
							  	
							  	<a href="#" class="list-group-item" style="background-color: lightgreen;"> <i class="glyphicon glyphicon-record"></i>  <b>Formulario Exclusivo</b></a>
							    <a href="#" class="list-group-item" style="background-color: lightblue;"> <i class="glyphicon glyphicon-ok"></i>  Formulario Inclusivo</a>
							    <a href="#" class="list-group-item" style="background-color: #ffff80;"> <i class="glyphicon glyphicon-record"></i>  Formulario Prioridad</a>
								<a href="#" class="list-group-item" style="background-color:  #ff8080;"> <i class="glyphicon glyphicon-shopping-cart"></i>  <b>Formulario Ventas</b></a>						  
						  	</div>
						</div>
		  			</div>
		  		</div>
		  	</div>


		  
		  		

		  	<div class="row">
		  		<!-- para que el footer no quede encima de las demás cosas -->
		  	</div>

		  	
    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Ingenieria de software 2017
            </div>
            
         </div>
      </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>