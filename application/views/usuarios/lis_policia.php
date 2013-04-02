
  <br>

      	<h2><center><?= $title ?></center></h2>
<div class="errors"><?= $error ?></div><br>
  	  <center><table border="1" width="100%" aling="center">
			<tr>
				<th width="5%">CI</th>	
				<th width="8%">GRADO</th>			
				<th width="12%">APELLIDOS</th>
				<th width="10%">NOMBRE</th>
				
				<th width="8%">UNIDAD</th>
				<th width="10%">CARGO</th>
				<th width="20%">OPCIONES</th>
			</tr>
			<? foreach($filas as $fila):?>
				<tr>
					<td> <?= $fila->ci_pol?></td>
						<td> <?= $fila->grado?></td>
					<td> <?= $fila->apellidos?></td>
					<td> <?= $fila->nombre?></td>
				
					<td> <?= $fila->unidad?></td>
					<td> <?= $fila->nombre_cargo?></td>
					<td><?= anchor("usuarios/nuevo_user/$fila->id_pol/$fila->nombre_cargo","Seleccionar")?> </td>
									
				</tr>
			<?endforeach?>
			</table></center><br><br><br><br><br><br><br><br>

