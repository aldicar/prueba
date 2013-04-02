<br> <br>	<h2 class = "letras"><center><?= $title ?></center></h2><br><div>
				             


				              
				              <div id="formulario">
				              	<?php echo validation_errors('<div class="errors">','</div>'); ?> 
								<br>
						        <?=form_open("reuniones/registrar_reunion" )?>
						        
								<p> 
									<div class="subtitulos">
										<?=form_label('TIPO DE REUNION', 'username')?><br>
									</div>
									<?= form_input(array('name' => 'tipo', 'class'=>'entradas', 'size'=>'60', 'value'=>set_value('username'), 'placeholder'=>'Ingrese el Nombre de Usuario', 'required'=>'required'))?>
										<br>
									<div class="subtitulos">
										<?=form_label('LUGAR DE REUNION', 'username')?><br>
									</div>
									<?= form_input(array( 'name' => 'lugar', 'class'=>'entradas', 'size'=>'60', 'value'=>set_value('username'), 'placeholder'=>'Ingrese el Nombre de Usuario', 'required'=>'required'))?>
										<br>	
									<div class="subtitulos">
										<?=form_label('FECHA DE REUNION', 'username')?><br>
									</div>
											<input type = "date" name = "fecha" class="entradas" value = <?= $fecha?>>
										<br>
									<div class="label" >
										<label  class="subtitulos">DESCRIPCION: </label>
										<textarea name ="respuesta" class="textotaresa"cols="50" rows="10" aria-required="true"></textarea>
										
										<input  name="submit" type="submit" id="submit" class="guardar reunion" value="GUARDAR" />
									</div>
				 				</p>
				 				<?form_close()?>
				 			  </div>	
				 		    </div><BR>
