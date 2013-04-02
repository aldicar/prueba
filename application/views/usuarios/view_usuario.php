
  <br><br>

      	
  	<center><h2><?= $title ?></h2><br></center>
  	  <center><table border="1" width="100%" aling="center">
			<tr>
				<th width="5%">CI</th>				
				<th width="12%">APELLIDOS</th>
				<th width="10%">NOMBRE</th>
				<th width="8%">GRADO</th>
				<th width="8%">UNIDAD</th>
				<th width="8%">TIPO DE USUARIO</th>
				<th width="10%">ESTADO DE USUARIO</th>
				<th width="20%">OPCIONES</th>
			</tr>
			<? foreach($filas as $fila):?>
				<tr>
					<td> <?= $fila->ci_pol?></td>
					<td> <?= $fila->apellidos?></td>
					<td> <?= $fila->nombre?></td>
					<td> <?= $fila->grado?></td>
					<td> <?= $fila->unidad?></td>
					<td> <?= $fila->tipo_user?></td>
					<td> <?= $fila->estado_user?></td>
					
					<td><?= anchor("usuarios/modificar_user/$fila->id_user","Modificar")?> </td>
									
				</tr>
			<?endforeach?>
			</table></center><br><br><br><br><br><br><br><br>

