<br> <br>	<h2 class = "letras" ><center><?= $title ?></center></h2><br><div>
				             

			              <div id="formulario">
				              	<?php echo validation_errors('<div class="errors">','</div>'); ?> 
								<br><br>
						        <?=form_open("empresas/registrar_empresa" )?>
						        
								<div > 
									<div class="subtitulos centrar">
										<?=form_label('Nombre de la Empresa', 'username')?><br>
									</div>
									<?= form_input(array('name' => 'nombre', 'class'=>'entradas centrar', 'size'=>'60', 'value'=>set_value('nombre'), 'placeholder'=>'Ingrese el Nombre de la Empresa', 'required'=>'required'))?>
										<br>
									<div class="subtitulos centrar">
										<?=form_label('Area ', 'username')?><br>
									</div>
									<?= form_input(array( 'name' => 'area', 'class'=>'entradas centrar', 'size'=>'60', 'value'=>set_value('nombre'), 'placeholder'=>'Ingrese el area de la Empresa', 'required'=>'required'))?>
										<br>	
				
									
										<input  name="submit" type="submit" id="submit" class="resp" value="GUARDAR" /><br><br><br><br><br><br><br><br><br><br>
									</div>
				 				</div>
				 				<?form_close()?>
				 			  </div>	
				 		    </div><BR>
