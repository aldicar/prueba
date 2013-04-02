
<br>
	<section id="formulario">
		<h2><center><?= $title ?></center></h2><br><br>
		<div class="errors"><?= $error ?></div>
		<br>
		<?=form_open("usuarios/cambiar_contra")?>
			
			<?=form_label('Contraseña Actual', 'clave')?>
			<?= form_password(array('name' => 'clave', 'id'=>'clave', 'size'=>'20', 'placeholder'=>'Ingrese su Contraseña', 'required'=>'required'))?>
			
			<?=form_label('Nueva Contraseña', 'clave')?>
			<?= form_password(array('name' => 'password', 'id'=>'password', 'size'=>'20', 'placeholder'=>'Ingrese su nueva  Contraseña', 'required'=>'required'))?>

			
			<?=form_label('Confirmar Contraseña', 'clave')?>
			<?= form_password(array('name' => 'repassword', 'id'=>'repassword', 'size'=>'20',  'placeholder'=>'Ingrese la confirmacion de su  Contraseña', 'required'=>'required'))?>

			
			<br><br>
			<?= form_submit(array('name'=>'guardar', 'value'=>'Guardar', 'class'=>'botoncss3'))?>
		<?= form_close()?>
		
	</section>
<br><br><br><br>
