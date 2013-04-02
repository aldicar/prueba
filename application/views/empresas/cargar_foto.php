<br><br><h2 class = "letras"><center><?= $title ?></center></h2>

<section id="contenedor">
	<? foreach($filas as $fila):?>
	<? $id = $fila->id_emp ?>
	<? $nombre = $fila->nombre_emp?>

	<? $area = $fila->area?>

	
	<?endforeach?>

<br><br>	

				  
				              <div id="formulario">

<center><br>
      	

  	   <table border="0" width="50%" aling="center">
			
			
			<tr>
					<td width="80%" ><?php echo $nombre;?> </td>
					<td width="20%" >&nbsp;</td>
			</tr>		
			<tr>		
					<td width="80%" ><?php echo $area;?></td>
					<td width="20%" > 
					</tr>
			<tr>		
			<td>	<?php echo $error;?>
				<?php echo form_open_multipart("empresas/do_upload/$id");?>
				<?= form_label("Seleccionar imagen:", "descripcion")?>
				</td>	
				<td>
				<input type="file" name="userfile" size="25" />
				</td>
			</tr>	
			</table>
		
			<input  name="submit" type="submit" id="submit" class="guardarfoto" value="GUARDAR" />
</div>

	<?form_close()?>
 </div>	
    </div><BR>	
			
					
			
		
</center>
<br><br><br>
<h2><?=anchor("noticia/opciones_noticias","Volver")?></h2> 

</section> 