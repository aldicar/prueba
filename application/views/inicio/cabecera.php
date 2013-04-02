<!doctype html>
<html lang ="es">
	<head>
		<title>siesrl</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="<?=base_url()?>css/style.css"/>
		<link rel="stylesheet" href="<?=base_url()?>css/menu.css"/>
		<link rel="stylesheet" href="<?=base_url()?>css/logousuario.css"/>
		<link rel="stylesheet" href="<?=base_url()?>css/ventanamodal.css"/>
		<script src="modernizr-1.6.min.js"></script>
   	</head>
	<body>
	<section id="todo">		
		
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
						<div id="lema"><h3>Trabajando por un mejor futuro tecnológico</h3></div>
					
				</div>
			
				<div class="mensaje">
						<img class="imagenes" id="imagen1">
						<img class="imagenes" id="imagen2">
						<img class="imagenes" id="imagen3">
				</div>
				
				<div id="iniciose">
				  <label for="sesion" id="labeluno" class="inicios">Inicio Sesion</label>
					  <div class="errors"><?= $error ?></div>
					 <?=form_open('usuarios/logued')?>
					 <input id ="usuario" class="inicios" name="usuario" type="usuario" placeholder="usuario" required />
					 <input id ="password" class="inicios" name="password" type=password placeholder="password" required />
					 
					 <?= form_submit(array('name'=>'guardar', 'value'=>'Entrar', 'class'=>'buttonsend'))?>
					 <?= form_close()?>
				</div>
				</div>
				
			</header> 


			<a  id="passwordmodal" title="Cambiar contraseña" href="#example2" >Olvidaste tu contraseña?</a>
			
			<aside id="example2" class="modal">
					<div>
						<h2 class="letrasmodal">Cambiar contraseña</h2>
							<section id="flotante">
								
								<div class="errors"><?= $error2 ?></div>
								<?php echo validation_errors('<div class="errors">','</div>'); ?>
								 <?=form_open('usuarios/olvide_contra')?>
									 <label class="labelmodal">Email : </label>
							 		<input id ="usuariomodal" class="inicios inputmodal" name="usuariosas" type="usuario" placeholder="Ingrese su Direccion Email" required /><br>
							 
					 
					               <?= form_submit(array('name'=>'enviar', 'value'=>'Enviar','class'=>'botonmodal'))?>
					 
					               <?= form_close()?>
						
								
							</section>
						<a href="#close" title="CERRAR">Cerrar</a>
					</div>
			</aside>
				