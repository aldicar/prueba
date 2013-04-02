<!doctype html>
<html lang ="es">
	<head>
		<title>siesrl</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="<?=base_url()?>css/style.css"/>
		<link rel="stylesheet" href="<?=base_url()?>css/menusuario.css"/>
		<!--link rel="stylesheet" href="css/logo.css"/-->
		<link rel="stylesheet" href="<?=base_url()?>css/logousuario.css"/>
		<link rel="stylesheet" href="<?=base_url()?>css/tablasusuarios.css"/>
		<!--link rel="stylesheet" href="<?=base_url()?>css/ventanamodal.css"/>
		<!--link rel="stylesheet" href="<?=base_url()?>http://fonts.googleapis.com/css?family=Tangerine"/>
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
   
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
						<div id="lema"><h2>Trabajando por un mejor futuro tecnológico</h2>
					</div>
				</div>
			
				<div class="mensaje">
						<img class="imagenes" id="imagen1"> 
						<img class="imagenes" id="imagen2">
						<img class="imagenes" id="imagen3">
				</div>
				
			
			
				
			</header>
			 

				<section class="cuerpo">

<br><br><br><br><br>
	<section id="formulario">
		<h2 class = "letras"><center><?= $title ?></center></h2><br><br>
		<div class="errors"><?= $error ?></div>
		<br>
		<?=form_open("usuarios/recuperar_clave/$id")?>
			
			<div class="subtitulos">
				<?=form_label('Nueva Contraseña', 'clave')?><br>
			</div>
			<?= form_password(array('name' => 'password', 'class'=>'entradas', 'size'=>'50', 'placeholder'=>'Ingrese su nueva  Contraseña', 'required'=>'required'))?>
		<br>
			
			<div class="subtitulos">
				<?=form_label('Confirmar Contraseña', 'clave')?><br>
			</div>
			<?= form_password(array('name' => 'repassword', 'class'=>'entradas', 'size'=>'50',  'placeholder'=>'Ingrese la confirmacion de su  Contraseña', 'required'=>'required'))?>

			
			<br><br>
			<?= form_submit(array('name'=>'guardar', 'value'=>'Modificar', 'id'=>'submit', 'class'=>'guardar'))?>
		<?form_close()?>
		
	</section>
	<br><br><br><br> 


			</section>

			<footer id="pie">
				<p>Copyright (c) 2013 <a  title="DESARROLLADORES" href="#example" class="openModal">sie</a>Todos los derechos reservados</p>
			</footer>
		</section>
		</body>
	
</html>
