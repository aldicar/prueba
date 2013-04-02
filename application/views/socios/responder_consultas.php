<br><br>   <h2 class = "letras"><center><?= $title ?></center></h2><br><div>
				             
<table border="0" width="50%" align="center">
			
			<? foreach($filas as $fila):?>
				<tr>
					<th width="20%">EMAIL</th><td> <?= $fila->email?></td>
				</tr>		
				<tr>	<th width="15%">NOMBRE</th>			<td> <?= $fila->nombre?></td>
				</tr>
				<tr>	<th width="10%">FECHA</th><td> <?= $fila->fecha?></td>
				</tr>	
				<tr>	<th width="40%">DESCRIPCION</th><td> <?= $fila->descripcion_con?></td>
				<?php $id = $fila->id_con ?>	
									
				</tr>
			<?endforeach?>
			
</table>
							<br>
				             <div id="formulario">
				              	<?php echo validation_errors('<div class="errors">','</div>'); ?> 
								<br>
						        <?=form_open("consulta/registrar_respuesta/$id/id_user" )?><br>
						        
									<label  class="subtitulos sub1">RESPUESTA :</label><br>
									<textarea class="label" id="respuesta" name ="respuesta" cols="40" rows="10" aria-required="true"></textarea>
									
									<input  name="submit" type="submit" id="submit"  class="responder1" value="RESPONDER" />
				 			
				 				<?form_close()?>
				 			  	
				 		    </div><br><br><br><br><br><br><br><br>
