
			<section id="confian">
			<h2 id="ellos">Ellos sí confián en nosotros </h2></section>
			
			<section id="secciones">
					<? foreach($filas as $fila):?>
				

					 <? $nombre =  $fila->nombre_emp?>
					 <? $foto = $fila->num_foto?>
					<article class="columnas">
						<h2 class="nomempresa"><?= $nombre ?></h2>
						<p><img id="empresa1" src="<?=base_url()?>images/img_empresas/<?= $foto ?>.jpg"> </p>
					</article>
			


<?endforeach?>
					
					
			</section>
			
			<footer id="pie">
				<p>Copyright (c) 2013 <a  title="DESARROLLADORES" href="#example" class="openModal">sie</a>Todos los derechos reservados</p>
			</footer>
			<!--todo referente a la ventana modal-->
			
				<aside id="example" class="modal">
					<div>
						<h2 class="letrasmodal">SIE S.R.L.</h2>
							
							<section id="flotante">
								<!--div id="contefotos" class="general proyectos"></div-->
								<li class="letrasubmodal"><a href="http://www.facebook.com/roger.mendez.r?fref=ts">DIRECTOR GENERAL  </a></li>
								<li class="letrasubmodal"><a href="http://www.facebook.com/rafarolan?fref=ts">DIRECTOR DE PROYECTOS  </a></li>
								<li class="letrasubmodal"><a href="http://www.facebook.com/ron.hernandez.3998?fref=ts">DIRECTOR DE RR. HH.  </a></li>
								<li class="letrasubmodal"><a href="http://www.facebook.com/kyoir?fref=ts">DIRECTOR DE INVESTICACION</a></li>
								<li class="letrasubmodal"><a href="http://www.facebook.com/alvarodiego.dazaalcaraz">DIRECTOR DE FINANZAS </a></li>
							</section>
						
						<a href="#close" title="CERRAR">Cerrar</a>
					</div>
				</aside>
			
		
	</section>
	</body>
</html>