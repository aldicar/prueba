<!doctype html>
<html lang ="es">
	<head>
		<title>siesrl</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="<?=base_url()?>css/style.css"/>
		<link rel="stylesheet" href="<?=base_url()?>css/menusuario.css"/>
		<link rel="stylesheet" href="<?=base_url()?>css/logousuario.css"/>
		<link rel="stylesheet" href="<?=base_url()?>css/tablasusuarios.css"/>
		
	</head>
	<section id="todo">		
		<body>
			<header id="cabecera">
				<div id="logo">
					<div id="contelogo">
						<div id ="soluciones2">
								<h3 class="nombres">Soluciones</br>
								Inteligentes</br>Empresariales</h3>
						</div>
						<div id="logo1" class="logos"></div>
						<div id="logo2" class="logos"></div>
						<div id="logo3" class="logos"><p id="letralogo">SIE</p></div>
						<div id="lema"><h3>Trabajando por un mejor futuro tecnológico</h3>
					</div>
				</div>
			
				<div class="mensaje">
						<img class="imagenes" id="imagen1"> 
						<img class="imagenes" id="imagen2">
						<img class="imagenes" id="imagen3">
				</div>
				
				 <div id="iniciose"><br>
					<li class="buttonsende"> <?=anchor("usuarios/salir",'Salir')?></li><br><br>
				  	 <li class="buttonsende"> <?=anchor("usuarios/cambio_contra",'Cambio')?></li>
				  	 
				 </div>
				</div> 
				
			</header>
			
					   <nav id="menunave">
							<ul id="menuhorizontal">
								<li class="listas"> <?=anchor("socios",'Inicio')?></li>
								<li class="listas"> <?=anchor("consulta/lista_consulta",'Lista de consultas')?></li>
								<li class="listas"><?=anchor('reuniones','Lista de reuniones')?></li>
								<li class="listas"><?=anchor('empresas','Lista de empresas')?></li>
								
							</ul>
						</nav>
				  


				<section class="cuerpo">