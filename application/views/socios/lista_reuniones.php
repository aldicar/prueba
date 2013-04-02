
<br> <br>	<h2 class = "letras"><center><?= $title ?></center></h2><br>
<div class="letraslink"><?=anchor('reuniones/new_reunion','NUEVA REUNION')?></div>
<br>
  	  <center><table class="tablas">
			<tr>
				<th width="20%">CREADOR</th>	
				<th width="15%">TIPO</th>			
				<th width="15%">LUGAR</th>			
				<th width="10%">FECHA</th>
				
				
				<th width="40%">DESCRIPCION</th>
				
				
			</tr>
			<? foreach($filas as $fila):?>
				<tr>
					<td> <?= $fila->nombre?></td>
					<td> <?= $fila->tipo?></td>
					<td> <?= $fila->lugar?></td>
						
					
				
					<td> <?= $fila->fecha?></td>
					<td> <?= $fila->descripcion?></td>
					
									
				</tr>
			<?endforeach?>
			</table></center><br><br><br>