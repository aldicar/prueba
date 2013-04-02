
	<section id="formulario">
		<h2><center><?= $title ?></center></h2>
		<div class="errors"><?= $error ?></div><br>
		
		<?=form_open('usuarios/logued')?>
			<?=form_label('Nombre de Usuario', 'username')?>
			<?= form_input(array('name' => 'username', 'id'=>'username', 'size'=>'20', 'value'=>set_value('username'), 'placeholder'=>'Ingrese el Nombre de Usuario', 'required'=>'required'))?>

			<?=form_label('Contraseña', 'pass')?>
			<?= form_input(array('type'=>'password', 'name' => 'pass','id'=>'pass', 'required'=>'required', 'placeholder'=>'Ingrese Su Contraseña'))?>
			<br>
			<?= form_submit(array('name'=>'guardar', 'value'=>'Entrar', 'class'=>'botoncss3'))?>
		<?form_close()?>
		
	</section>
<br><br><br><br><br>  
