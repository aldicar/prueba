<section id="contenedor">
	<? foreach($filas as $fila):?>
	<? $id = $fila->id_emp ?>
	<? $nombre = $fila->nombre_emp?>

	<? $area = $fila->area?>

	
	<?endforeach?>

   <br> <br>	<h2 class = "letras" ><center><?= $title ?></center></h2><br><div>
				             

				              <div id="formulario">
				              	<?php echo validation_errors('<div class="errors">','</div>'); ?> 
								<br>
						        <?=form_open("empresas/modificar_empresa/$id" )?>
						        
								<div> 
									<div class="subtitulos centrar">
										<?=form_label('Nombre de la Empresa', 'username')?><br>
									</div>
									<?= form_input(array('name' => 'nombre', 'class'=>'entradas centrar', 'size'=>'60', 'value'=> $nombre, 'placeholder'=>'Ingrese el Nombre de la Empresa', 'required'=>'required'))?>
										<br>
									<div class="subtitulos centrar">
										<?=form_label('Area ', 'username')?><br>
									</div>
									<?= form_input(array( 'name' => 'area', 'class'=>'entradas centrar', 'size'=>'60', 'value'=>$area, 'placeholder'=>'Ingrese el area de la Empresa', 'required'=>'required'))?>
											
				
										<br>
										<input  name="submit" type="submit" id="submit"  class="respempre" value="MODIFICAR" /><br><br>
									</div>
				 				</div>
				 				<?form_close()?>
				 			  </div>	
				 		    </div><BR>
