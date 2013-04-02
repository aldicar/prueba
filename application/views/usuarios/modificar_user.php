<? foreach($filas as $fila):?>
	<? $id = $fila->id_user ?>
	<? $ci = $fila->ci_pol ?>
	<? $apellido = $fila->apellidos?>
	<? $nombre = $fila->nombre?>
	<? $grado = $fila->grado?>
	<? $telefono = $fila->telefono?>
	<? $direccion = $fila->direccion?>
	<? $unidad = $fila->unidad?>
	<? $tipo_user = $fila->tipo_user?>
	<? $cargo = $fila->nombre_cargo?>
	
	
<?endforeach?>
	
	<section id="formulario">
		<h2><center><?= $title ?></center></h2>
		<?php echo validation_errors('<div class="errors">','</div>'); ?>
		<br>
			<H3><?=  "TIPO DE USUARIO:"; ?><?=  $tipo_user?></H3>
			<H3><?=  "CARGO:"; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=  $cargo?></H3>
			<H3><?=  "GRADO:"; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=  $grado?></H3>
			<H3><?=  "APELLIDOS:"; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=  $apellido?></H3>
			<H3><?=  "NOMBRE:"; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=  $nombre?></H3>
			<H3><?=  "UNIDAD:"; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=  $unidad?></H3>
		<br><br><br>
		<?=form_open("usuarios/edit_usuario/$id")?>
		
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




			$shirts_on_sale = array('small', 'large');

			echo form_dropdown('tipo_user', $options, 'large');
			?>

			<?=form_label('Estado de usuario', 'unidad')?> 
					
			<?php 
			$options = array(
				  'HABILITADO'    => 'HABILITADO',	
                  'DESHABILITADO'  => 'DESHABILITADO',
                  
            );

			$shirts_on_sale = array('small', 'large');

			echo form_dropdown('estado', $options, 'large');
			?>

			<br><br>
			<?= form_submit(array('name'=>'guardar', 'value'=>'Modificar', 'class'=>'botoncss3'))?>
		<?form_close()?>
		<br><br><br><br><br><br>
		
	</section>
