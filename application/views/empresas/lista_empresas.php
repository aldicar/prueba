<br> <br>	<h2 class = "letras"><center><?= $title ?></center></h2><br>
<div class = "letraslink"><?=anchor('empresas/new_empresa','NUEVA EMPRESA')?></div>
<br>
  	  <center><table class="tablas">
			<tr>
				<th width="33.33%">NOMBRE DE LA EMPRESA</th>	
				<th width="33.33%">AREA</th>			
							
				<th width="33.33%">OPCIONES</th>
			</tr>
			<? foreach($filas as $fila):?>
				<tr>
					<td> <?= $fila->nombre_emp?></td>
					<td> <?= $fila->area?></td>
					
					<td><?= anchor("empresas/edit_empresa/$fila->id_emp","MODIFICAR")?> 

					<?php
					if ( $fila->num_foto == 0)
					{	?>

						<?= anchor("empresas/cargar_foto/$fila->id_emp/$fila->id_emp","CARGAR FOTITO")?> 
					<?php	
					}	
					?>	
					</td>
									
				</tr>
			<?endforeach?>
			</table></center><br><br><br>