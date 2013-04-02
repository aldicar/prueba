<? foreach($filas as $fila):?>
	<? $id = $fila->id_pol ?>
	<? $ci = $fila->ci_pol ?>
	<? $apellido = $fila->apellidos?>
	<? $nombre = $fila->nombre?>
	<? $grado = $fila->grado?>
	<? $telefono = $fila->telefono?>
	<? $direccion = $fila->direccion?>
	<? $unidad = $fila->unidad?>
	<? $cargo = $fila->nombre_cargo?>

	
<?endforeach?>
<?php
 $ci;
?>



	<section id="formulario">
		<h2><center><?= $title ?></center></h2><br>
		<?php echo validation_errors('<div class="errors">','</div>'); ?> 
		<br>
		<?=form_open("usuarios/registrar_usuario/$id")?>
			
			<?=form_label('Tipo de usuario', 'unidad')?> 
					
			<?php 
			if($cargo == 'OPERADOR')
			{
				$options = array(
				 
                  'ENCARGADO'  => 'ENCARGADO',
                
            	);
			}	
			if($cargo == 'RECEPCIONISTA')
			{
				$options = array(
				 
                  'ENCARGADO'  => 'ENCARGADO',
                
            	);
			}
			if($cargo == 'PATRULLERO')
			{
				$options = array(
				 
                 'PATRULLERO' => 'PATRULLERO',
                
            	);
			}
			if($cargo == 'CHOFER')
			{
				$options = array(
				 
                 'PATRULLERO' => 'PATRULLERO',
                
            	);
			}	
			if($cargo == 'SECRETARIO')
			{
				$options = array(
				 
                  'ADMINISTRADOR'    => 'ADMINISTRADOR',	
                  'OFICIAL DE TURNO'  => 'OFICIAL DE TURNO',
                
            	);
			}	
			if($cargo == 'ENCARGADO')
			{
				$options = array(
				 
                  	
                  'OFICIAL DE TURNO'  => 'OFICIAL DE TURNO',
                
            	);
			}		


			/*$options = array(
				  'ADMINISTRADOR'    => 'ADMINISTRADOR',	
                  'OFICIAL DE TURNO'  => 'OFICIAL DE TURNO',
                  'ENCARGADO'  => 'ENCARGADO',
                  'PATRULLERO' => 'PATRULLERO',
            );*/

			$shirts_on_sale = array('small', 'large');

			echo form_dropdown('tipo_user', $options, 'large'); 
			?>

			<?=form_label('Nombre de usuario', 'username')?>
			<?= form_input(array('name' => 'username', 'id'=>'username', 'size'=>'20', 'value'=>set_value('username'), 'placeholder'=>'Ingrese su nombre de usuario', 'required'=>'required'))?>

			<?=form_label('Contraseña', 'clave')?>
			<?= form_password(array('name' => 'clave', 'id'=>'clave', 'size'=>'20', 'value'=>set_value('clave'), 'placeholder'=>'Ingrese su Contraseña', 'required'=>'required'))?>

			
			<br><br>
			<?= form_submit(array('name'=>'guardar', 'value'=>'Guardar', 'class'=>'botoncss3'))?>
		<?form_close()?>
		
	</section>
	<br><br><br><br>
