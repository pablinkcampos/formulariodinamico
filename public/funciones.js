function RESULTcargacursosins(result){
	localStorage.cargacursosins= JSON.stringify(result);
   	var listado = result[0];

   	var codigo = "" 
   	for ( x in listado){
   		var curso = listado[x];
   		codigo = codigo + '<a onClick="elicurso1(this)" class="waves-effect waves-light btn grey lighten-3 modal-trigger" data-target="modal5" data-cursoid="'+curso.listado_id+'" data-cursocodigo="'+curso.grupo_codigo+'" data-cursonombre="'+curso.grupo_nombre+
   		'" style="width:100%;margin-bottom:2px;color:black;"><span class="btntextmover">'+
   		'<i class="material-icons left" style="color:#d50000;">delete</i>'+curso.grupo_nombre+'</span></a>';
   	}
   	$("#liscursoins").html(codigo);

   	function_uploadpag();
}

function cargacursosins(){

  data = {id: Mi_user}
  $.post( url_rest+"/rest/listado/cursosins",{data}, function(result) {
  	   	//console.log(result[0]);
  	   	RESULTcargacursosins(result);
	})
	  .fail(function() {
	  	if (typeof localStorage.cargacursosins !== 'undefined') {
        	RESULTcargacursosins(JSON.parse(localStorage.cargacursosins));
    	}
	    //console.log( "error" );

	});
}

function RESULTcargacursosmen(result){
	localStorage.cargacursosmen=JSON.stringify(result);
	var listado = result[0];
  	   	
   	if(listado.length ==0){
   		$("#eladdmen").hide();
   	}else{
   		$("#eladdmen").show();
	   	var codigo = ' <option value="" disabled selected>seleccione cursos</option>'; 
	   	for ( x in listado){
	   		var curso = listado[x];
	   		codigo = codigo + '<option value="'+curso.id+'" >('+curso.codigo+') - '+curso.nombre+'</option>';
	   	}
	   	$("#men_cursos_man").html(codigo);

	   	function_uploadpag();
   	}

}

function cargacursosmen(){

  data = {id: Mi_user}
  $.post( url_rest+"/rest/listado/cursospermiso",{data}, function(result) {
  	   	//console.log(result[0]);
  	   	RESULTcargacursosmen(result);
	})
	  .fail(function() {
	  	if (typeof localStorage.cargacursosmen !== 'undefined') {
        	RESULTcargacursosmen(JSON.parse(localStorage.cargacursosmen));
    	}
	    //console.log( "error" );
	});
}

function elicurso1 (elemento) {
	$("#mdl5_cursocodigo").html($(elemento).attr('data-cursocodigo'));
	$("#mdl5_cursonombre").html($(elemento).attr('data-cursonombre'));
	$("#mdl5_cursodelete").attr("data-listadoid",$(elemento).attr('data-cursoid'));

}
function buscurso1 (elemento) {
	
	$("#meninscurso").html('');
	$("#lapasscurso").val('');

	$("#m6_cursocodigo").html($(elemento).attr('data-buscursocodigo'));
	$("#m6_cursonombre").html($(elemento).attr('data-buscursonombre'));
	$("#m6_inscurso").attr("data-cursoid",$(elemento).attr('data-buscursoid'));
	$("#passcurso").val($(elemento).attr('data-buscursoidpass'));

}


$(document).ready(function(){
	$('#mdl5_cursodelete').click(function () {
		alertapp('Eliminando curso <br> espere un momento ...',0);
	   	data = {id: $("#mdl5_cursodelete").attr("data-listadoid")}
		$.post( url_rest+"/rest/listado/cursosinselim",{data}, function(result) {
			$('#modal4').closeModal();
			$('#modal5').closeModal();
		  	cargacursosins();
  			cargacursosmen();
		  	//console.log( "ok" );
		  	PRIMERA=true;
		  	$("#cursos1").html('');
        		$("#cursos2").html('');
		  	elcargamensajes(false);
		  	alertapp('Curso eliminado',2000);
		})
		  .fail(function() {
		    //console.log( "error" )
		    $('#lanotifica').html('');
		});

	});

	$('#mdl3_buscar').click(function () {
		if($("#mdl3_cursoid").val().trim()!=''){
			buscarCursos();
		}else{
			alertapp('Inserte Codigo<br>antes de buscar',2000);
		}
		
	});


	function buscarCursos () {
		alertapp('Buscando curso<br>espere un momento ...',0);
	   	data = {id: $("#mdl3_cursoid").val().trim(),user:Mi_user}
		$.post( url_rest+"/rest/listado/buscacurso",{data}, function(result) {

			var cursos = result[0];
			codigo = "";
			for(x in cursos){
				var curso = cursos[x];
				codigo = codigo+'<tr><td class="center"><div style="font-weight: bold;">Codigo</div><div>'+curso.codigo+'</div>'+
                '<div style="font-weight: bold;">Curso</div><div>'+curso.nombre+'</div>'+
                '<div><a onClick="buscurso1(this)" data-buscursocodigo="'+curso.codigo+'" data-buscursoid="'+curso.id+'" data-buscursoidpass="'+curso.pass+'" data-buscursonombre="'+curso.nombre+'" class="waves-effect waves-light btn light-green darken-4 modal-trigger" data-target="modal6" >'+
                '<span><i class="material-icons left">mode_edit</i> Inscribir</span></a></div></td></tr>';
			}		
			
			$("#buscalistadocurso").html(codigo);

	  	   	function_uploadpag();
	  	   	$('#lanotifica').html('');

		})
		  .fail(function() {
		    //console.log( "error" );
		    $('#lanotifica').html('');
		});
	}


	$('#mdl_rcurso').click(function () {
		cargacursosins();
	});
	
	$('#m6_inscurso').click(function () {
		var buscursoid = $("#m6_inscurso").attr("data-cursoid");
		var pass1 = $("#passcurso").val();
		var pass2 = $("#lapasscurso").val();
		alertapp('Inscribiendo Curso',0);
		if(pass1.trim()+''===pass2.trim()+''){
			$("#meninscurso").html('');
			data = {id : Mi_user,
				curso : buscursoid
			}
		  	$.post( url_rest+"/rest/listado/inscurso",{data}, function(result) {
		  	   	console.log(result);
		  	   	PRIMERA=true;
		  	   	$("#cursos1").html('');
        			$("#cursos2").html('');
		  	   	alertapp('Curso Inscrito<br>Correctamente',2000);
		  	   	$('#modal3').closeModal();
		  	   	$('#modal6').closeModal();
		  	   	cargacursosins();
  				cargacursosmen();
  				elcargamensajes(false);
			})
			  .fail(function() {
			  	alertapp('Error de Inscripción',2000);
			    console.log( "error" );
			});

		}else{
			alertapp('Codigo Incorrecto',2000);
			$("#meninscurso").html('<span class="alertamen">codigo incorrecto</span><br><br>');
		}

	});

	$('#cerrarm3').click(function () {
		$("#mdl3_cursoid").val('');
		$("#buscalistadocurso").html('');
	});
	$('#eladdcurso').click(function () {
		$("#mdl3_cursoid").val('');
		$("#buscalistadocurso").html('');
	});
	
	$('#enviarmens').click(function () {
		
		if($("#men_titulo").val().trim()+''!=''){
			if($("#men_cursos_man").val().length > 0){
				if($("#men_mensaje").val().trim()+''!=''){

					if( $("#modal2 input[name='men_prio']:radio").is(':checked')) {  
						if($("#men_check").is(':checked')){
							enviarelmensaje();
						}else{
							alertapp('Confirme el mensaje',2000);
						}
					} else{  
						alertapp('Especifique<br>Prioridad del Mensaje',2000);
					}  
				}else{
					alertapp('Especifique<br>Contenido del Mensaje',2000);
				}
			}else{
				alertapp('Especifique<br>Destinatario',2000);
			}
		}else{
			alertapp('Especifique<br>Título del Mensaje',2000);
		}		

		
	});
});

	function enviarelmensaje() {
		alertapp('Enviando Mensaje',0);

		data = {id : Mi_user,
			cursos : $("#men_cursos_man").val(),
			titulo : $("#men_titulo").val() , 
			mensaje: $("#men_mensaje").val(),
			prioridad : $('input:radio[name=men_prio]:checked').val(),
			fecha : getfechahora()
		}

	  	$.post( url_rest+"/rest/listado/nuevomensaje",{data}, function(result) {
	  	   	console.log(result);
	  	   	alertapp('Mensaje Enviado',2000);
	  	   	$('#modal2').closeModal();
	  	   	$("#men_titulo").val('');
	  	   	$("#men_cursos_man").val('');
	  	   	$("#men_mensaje").val('');
	  	   	//$("#men_prio").val('');
	  	   	$('input:radio[name=men_prio]:checked').prop("checked", "");
	  	   	$("#men_check").prop("checked", "");
	  	   	PRIMERA=true;
	  	   	elcargamensajes(false);
	  	   	function_uploadpag();
		})
		  .fail(function() {
		    console.log( "error" );
            alertapp('Mensaje No Enviado',2000);
		});
	}

	function getfechahora() {
		var fecha = new Date();
		var dia = fecha.getDate();
		if(dia<10){
			dia='0'+dia;
		}
		var mes = fecha.getMonth();
		if(mes<10){
			mes='0'+mes;
		}

		var anio = fecha.getFullYear();
		if(anio<10){
			anio='0'+anio;
		}

		var hora = fecha.getHours();
		if(hora<10){
			hora='0'+hora;
		}

		var min = fecha.getMinutes();
		if(min<10){
			min='0'+min;
		}

		return anio+'/'+mes+'/'+dia+' - '+hora+':'+min;
	}


	function miinfo(){
		$('#miinfo').openModal();
	}
	function cerrarsession(){
		localStorage.removeItem("sessionUCMapp");
		localStorage.removeItem("NOTIFICAR");
		localStorage.removeItem("REFRESCAR");

		localStorage.removeItem("cargacursosins");
		localStorage.removeItem("cargacursosmen");
		localStorage.removeItem("elcargacursos");
        localStorage.removeItem("elcargamensajes");

		window.location.href = "index.html";
	}




	function modalmensaje(id) {
		var mensaje = []
		var posmen = 0;
		for(var x in LOSMENSAJES){
  	   		if(LOSMENSAJES[x].id==id){
  	   			mensaje = LOSMENSAJES[x];
  	   			posmen=x;
  	   		}
	  	}

		$('#mentitulo').html(mensaje['mensaje_titulo']);
		$('#mencurso').html(mensaje['nombre']);
		$('#mencuerpo').html(nl2br(mensaje['mensaje_src']));
		$('#menfecha').html(mensaje['fecha']);
		$('#modal1').openModal();

		    //console.log(mensaje['visto']);
		    //console.log(mensaje['id']);
		    //console.log(Mi_user);


		var classmensaje = "" ;
		if(mensaje['prioridad_id']!="0"){
		    if(mensaje['prioridad_id']==="1"){classmensaje="m-rojo"}
		    if(mensaje['prioridad_id']==="2"){classmensaje="m-naranjo"}
		    if(mensaje['prioridad_id']==="3"){classmensaje="m-verde"}
		    if(mensaje['prioridad_id']==="4"){classmensaje="m"}
		}else{
		    if(mensaje['visto']==="0"){classmensaje="m-noleido"}
		}

		classmensaje = " mensajes "+classmensaje+" lighten-4 waves-effect waves-blue-grey ";

		var mnd= "elmen_"+mensaje['id']; 
		$("#"+mnd).attr('class',classmensaje);

		 if(mensaje['visto']=="0"){
		 	(LOSMENSAJES[posmen]).visto="1";
		    data = {usuario: Mi_user ,mensaje: mensaje['id']}
		    $.post( url_rest+"/rest/listado/visto",{data}, function(result) {
		    	elcargacursos();
		        //console.log( "ok" );
		    })
		      .fail(function() {
		      	elcargacursos();
		        //console.log( "error" );
		    });
		    }

	}

	function codigomensaje(el_mensaje){
        var classmensaje = "" ;
        if(el_mensaje['prioridad_id']!="0"){
            if(el_mensaje['prioridad_id']==="1"){classmensaje="m-rojo"}
            if(el_mensaje['prioridad_id']==="2"){classmensaje="m-naranjo"}
            if(el_mensaje['prioridad_id']==="3"){classmensaje="m-verde"}
            if(el_mensaje['prioridad_id']==="4"){classmensaje="m"}
            if(el_mensaje['visto']==="0"){classmensaje=classmensaje+"-noleido"}
        }else{
            if(el_mensaje['visto']==="0"){classmensaje="m-noleido"}
        }

        classmensaje = " mensajes "+classmensaje+" lighten-4 waves-effect waves-blue-grey ";
        var mnd= "elmen_"+el_mensaje['id'];

        return  '<div class="'+classmensaje+'" onClick="modalmensaje('+el_mensaje['id']+');" id="'+mnd+'"  >'+
              '<div name="curso">'+el_mensaje['mensaje_titulo']+'</div>'+
              '<div name="titulo">'+el_mensaje['nombre']+'</div>'+
              '<div name="cuerpo">'+el_mensaje['mensaje_src']+'</div>'+
              '<div name="fecha">'+el_mensaje['fecha']+'</div>'+
            '</div>';
          
    }

    function dibujalosmensajes(filtro) {
 		codigo = '';
 		FILTRO=filtro;
 		//console.log("entras : "+filtro);
 		if(filtro==0){
 			for(var x in LOSMENSAJES){
	  	   		codigo=codigo+codigomensaje(LOSMENSAJES[x]);
	  	   	}
 		}else{
 			for(var x in LOSMENSAJES){
 				if(LOSMENSAJES[x].grupo_id+''===''+filtro){
	  	   			codigo=codigo+codigomensaje(LOSMENSAJES[x]);
	  	   		}
	  	   	}
 		}
    	$("#mensajes1").html(codigo);

    	if(filtro==0){
		    $('.button-collapse').sideNav('hide');
		}
    }

	function elcargamensajes(ciclo) {
		if (ciclo === undefined) {
        	ciclo = true;
    	}
		var data = {'id':Mi_user,'curso':Mi_curso,'carga':0};
		if(PRIMERA==true){
			data = {'id':Mi_user,'curso':Mi_curso,'carga':1};
		}
		
	  	$.post( url_rest+"/rest/listado/mensajes",{data}, function(result) {
	  	   	$('#lanotifica2').html('');
	  	   	if(PRIMERA==true){
	  	   		LOSMENSAJES = result[0];
	  	   		dibujalosmensajes(FILTRO);
	  	   		elcargacursos();
	  	   		PRIMERA=false;
	  	    }else{
	  	    	console.log(result);
	  	    	if(result!=false){
		  	    	if(JSON.stringify(result[0])!=JSON.stringify(LOSMENSAJES)){
		  	    		LOSMENSAJES = result[0];
		  	   			dibujalosmensajes(FILTRO);
		  	   			elcargacursos();
		  	   			notificacion();
		  	    	}
	  	    	}
	  	    }
            
            localStorage.elcargamensajes=JSON.stringify(LOSMENSAJES);
            
	  	    if(ciclo==true){
	  	    	setTimeout(function(){ elcargamensajes();}, REFRESCAR);
	  	    }
		}).fail(function() {
		    //console.log( "error" );
            if (typeof localStorage.elcargamensajes !== 'undefined') {
        	    LOSMENSAJES = JSON.parse(localStorage.elcargamensajes);
                dibujalosmensajes(FILTRO);
	  	   		elcargacursos();
    	   }
		    alertapp2('<div onClick="elcargamensajes();">No Hay Conexión</div>',0);
		});
	}

	function RESULTelcargacursos(result) {
		$("#cursos1").html('');
       		$("#cursos2").html('');
		dibujamenucurso(result[0]);
	}

	function elcargacursos () {
        var data = {'id':Mi_user,'carga':0};
		if(PRIMERA==true){
			data = {'id':Mi_user,'carga':1};
		}
	  	$.post( url_rest+"/rest/listado/cursos",{data}, function(result) {
	  		//console.log(result[0]);
	  		if(result!=false){
        		localStorage.elcargacursos=JSON.stringify(result);
    			RESULTelcargacursos(result);	
	  		}
			$('#load').hide();
		})
		  .fail(function() {
		    console.log( "error" );

		    if (typeof localStorage.elcargacursos !== 'undefined') {
        		RESULTelcargacursos(JSON.parse(localStorage.elcargacursos));
    		}
    		$('#load').hide();
		});

	}

	function dibujamenucurso (ALLGRUPOS) {	
		var los_grupos=[];
        var los_cursos=[];
        var largo = ALLGRUPOS.length;
        for(var x=0;x<largo;x++){
            /*//console.log(ALLGRUPOS[x]);*/
            var curso = [];
            curso.push(ALLGRUPOS[x]['listado_id']);
            curso.push(ALLGRUPOS[x]['grupo_id']);
            curso.push(ALLGRUPOS[x]['grupo_nombre']);
            curso.push(ALLGRUPOS[x]['grupo_descripcion']);
            curso.push(ALLGRUPOS[x]['grupo_codigo']);
            curso.push(ALLGRUPOS[x]['t_grupo_id']);
            curso.push(ALLGRUPOS[x]['t_grupo_name']);
            curso.push(ALLGRUPOS[x]['permiso']);
            curso.push(ALLGRUPOS[x]['mensajes_curso']);
            los_cursos.push(curso);        


            var grupo = [];
            grupo.push(ALLGRUPOS[x]['t_grupo_id']);
            grupo.push(ALLGRUPOS[x]['t_grupo_name']);
            grupo.push(ALLGRUPOS[x]['permiso']);
            grupo.push(ALLGRUPOS[x]['mensajes_grupo']);
            grupo.push(ALLGRUPOS[x]['t_grupo_icono']);


            if(los_grupos.length === 0){
                los_grupos.push(grupo);
            }else{
                var cont = 0;

                for(var x2 in los_grupos){
                    if(los_grupos[x2][0]+''===grupo[0]+''){
                        cont=1;
                    }
                }
                if(cont===0){
                    los_grupos.push(grupo);
                }
            }

        }
        //console.log("losgrupos");
        //console.log(los_grupos);
        var codigoCurso = function(grupo_id){
            var rows = '';
            for (x in los_cursos) {
                if(grupo_id===los_cursos[x][5]){
                    var mensaje = los_cursos[x][8];
                    if(mensaje==0){
                        mensaje=' ';
                    }
                    var curso = los_cursos[x][1]
                    //console.log("curso");
        			//console.log(los_cursos);
                    rows = rows + '<li><a><div onClick="dibujalosmensajes('+los_cursos[x][1]+')"> '+los_cursos[x][2]+'<span class="badge">'+mensaje+'</span></div></a></li>';
                }
            }

            return '<ul>'+rows+'</ul>';
        }

        var codigoGrupo = function(grupo) {
            return '<ul><li class="no-padding">'+
                    '<ul class="collapsible collapsible-accordion">'+
                    '<li>'+
                    '<a class="collapsible-header">'+grupo[1]+'<i class="material-icons">'+grupo[4]+'</i><span class="badge">'+grupo[3]+'</span></a>'+
                        '<div class="collapsible-body">'+
                          '<ul>'+codigoCurso(grupo[0])+'</ul>'+
                        '</div>'+
                    '</li>'+
                    '</ul>'+
                '</li></ul>';
        } 

        /*var todomen = function(grupo) {
            return '<ul ><li class="no-padding">'+
                    '<ul class="collapsible collapsible-accordion">'+
                    '<li>'+
                    '<a class="collapsible-header">'+grupo[1]+'<i class="material-icons">'+grupo[4]+'</i><span class="badge">'+grupo[3]+'</span></a>'+
                        '<div class="collapsible-body">'+
                          '<ul>'+codigoCurso(grupo[0])+'</ul>'+
                        '</div>'+
                    '</li>'+
                    '</ul>'+
                '</li></ul>';
        } 
		*/

        var elmenu = function() {
            var rows = '';

            var men=0;
            try{
                for(var x=0;x<los_grupos.length;x++){
                	contador = parseInt(los_grupos[x][3]) || 0;
                    men = men+contador;
                }
            }catch(e){
                men = 0;
            }
            var grupo = [];
            grupo.push('bandeja completa');
            grupo.push('textsms');
            if(men+''==='0'){
                grupo.push(' ');
            }else{
                grupo.push(men);
            }
            
            rows=rows +'<li class="bold"><a  data-activates="slide-out" class="collapsible-header"><div onClick="dibujalosmensajes(0)"> '+grupo[0]+'<i class="material-icons">'+grupo[1]+'</i><span class="badge">'+grupo[2]+'</span></div></a></li>';

            for(var x=0;x<los_grupos.length;x++){
                var mensaje = los_grupos[x][3];
                    if(mensaje==0){
                        los_grupos[x][3]=' ';
                    }
                rows=rows + codigoGrupo(los_grupos[x]);
            }
            
            return '<div>'+rows+'</div>';    
        }

        //console.log(elmenu());

        $("#cursos1").html(elmenu());
        $("#cursos2").html(elmenu());

	}

function abriruser() {
    $('#mdlhola').openModal();
}
function cerrarsesion() {
    $('#modalcerrar').openModal();
}
