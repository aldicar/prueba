
<br> <br>	<h2 class = "letras"><center><?= $title ?></center></h2><br><br>

  	  <center><table class="tablas">
			<tr>
				<th width="20%">EMAIL</th>	
				<th width="15%">NOMBRE</th>			
				<th width="10%">FECHA</th>
				
				
				<th width="40%" background="red">DESCRIPCION</th>
				
				<th width="15%">OPCIONES</th>
			</tr>
			<? foreach($filas as $fila):?><tr>
					<?php 	
					$descripcion = $fila->descripcion_con;
					$length = 20;
				    //Primero eliminamos las etiquetas html y luego cortamos el string
			   			 $stringDisplay = substr(strip_tags($descripcion), 0, $length);
			  			  //Si el texto es mayor que la longitud se agrega puntos suspensivos
			  		  if (strlen(strip_tags($descripcion)) > $length){
				 		   $descripcion = $stringDisplay .= ' ...';
						}
					?>
					<td> <?= $fila->email?></td>
						
					<td> <?= $fila->nombre?></td>
				
					<td> <?= $fila->fecha?></td>
					<td> <?= $descripcion ?></td>
					<td><?= anchor("consulta/respuesta_consulta/$fila->id_con","LEER")?>
					<?PHP 
						if($fila->estado_lei == 'NO')
						{
							echo "NO LEIDO";
						}	

					 ?>	
					 </td>
									
				</tr>
			<?endforeach?>
			</table></center><br><br><br>