
<br><br>
	<section id="formulario">
		<h2 class = "letras"><center><?= $title ?></center></h2>
		<div class="errors"><?= $error ?></div>
		<?=form_open("usuarios/cambiar_contra")?>
			<div class="subtitulos centrar">
				<?=form_label('Contraseña Actual', 'clave')?><br>
			</div>
			<?= form_password(array('name' => 'clave', 'class'=>'entradas centrar', 'size'=>'50', 'placeholder'=>'Ingrese su Contraseña', 'required'=>'required'))?>
			<br>
			<div class="subtitulos centrar">
				<?=form_label('Nueva Contraseña', 'clave')?><br>
			</div>
			<?= form_password(array('name' => 'password', 'class'=>'entradas centrar', 'size'=>'50', 'placeholder'=>'Ingrese su nueva  Contraseña', 'required'=>'required'))?>
<br>
			
			<div class="subtitulos centrar">
				<?=form_label('Confirmar Contraseña', 'clave')?><br>
			</div>
			<?= form_password(array('name' => 'repassword', 'class'=>'entradas centrar', 'size'=>'50',  'placeholder'=>'Ingrese la confirmacion de su  Contraseña', 'required'=>'required'))?>

			
			<br>
			<?= form_submit(array('name'=>'guardar', 'value'=>'Guardar', 'id'=>'submit', 'class'=>'guardar guardarcontra'))?>
		<?form_close()?>
		
	</section>
	<br><br><br><br>
