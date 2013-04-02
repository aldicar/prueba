			<section class="cuerpo">
			
				<div class="menu">
      				<ul>
         				<li>
         				  <a href="">Home</a>
             				<div>
               					<h3>Home</h3>
               					<p>MISIÓN</p>
               						<h5>Es misión de S.I.E. Ofrecer soluciones tecnológicas innovadoras, 
               							de acuerdo a las necesidades específicas de cada cliente ofreciéndoles 
               							soluciones integrales con la finalidad de crear o desarrollar software 
               							de fácil uso, que tenga sobresalientes niveles de rentabilidad, calidad, 
               							presencia e influencia en el mercado laboral, además de fomentar su 
               							desarrollo y crecimiento, mediante un equipo de profesionales en tecnologías 
               							de información altamente competitivo.</h5>
               					
               					<p>VISIÓN</p>
               						<h5>¿Cómo  nos  vemos en el futuro?</br></br>
               							Es la pregunta que nos inspira día a día para trabajar por un mejor futuro tecnológico. Pero sin duda para el futuro tenemos una gran visión
               							ser empresa líder, modelo de desarrollo y aplicación de herramientas de tecnología informática;
               							sólida, rentable y en permanente evolución. Y estar comprometidos con los problemas de nuestros clientes de forma 
               							transparentey eficaz para convertirnos en su socio de confianza. 
               							</h5>
               					
             				</div>
         				</li>
         				<li>
				          <a href="">Servicios</a>
				            <div>
				              <h3>Ofrecemos los Servicios</h3>
				              <p>Desarrollo Web, <br/>
				              	Desarrollo Aplicaciones  Móviles, <br/>
				              	Tecnologías Microsoft, <br/>
				              	Aplicaciones de la Nanotecnología, <br/>
				              	Visión Artificial, <br/>
				              	Sistemas de Reconocimiento de voz, <br/> 
				              Diseño Grafico, Ciencia, <br/>
				               Tecnología, Learning, <br/>
				               Redes, Soporte Técnico.
				            <p/>
				           </div>
				        </li>
				        <li>
				         <a href="">Temas y Cursos</a>
				          <div>
				             <h3>Cursos</h3>
				              <p>Html5<br />
				                 Css3<br />
				                 Jquery<br />
				                 CodeIgneiter<br />
				                 Ruby On Rails<br />
				                 Django<br />
				                 Python...
				                </p>
				          </div>
				        </li>
				        <li>
				          <a href="">Reservado</a>
				            <div>
				              <h3>Espacio Reservado</h3>
				              <p>Este espacio esta reservado para proximos proyectos ... </p>
				              <div id="contenido">  s i e </div>

				            </div>
				        </li>
				         <li class="listass">
				          <a href="">Contactos</a>
				           
				              
				             
				              <div id="formulariocontacto">
				              	<h3>Contactanos</h3>
				              	<?php echo validation_errors('<div class="errors">','</div>'); ?> 
								<br>
						        <?=form_open('consulta/registrar_consulta')?>
						        
			
									<input  class="textoinput textoinputuno" name="nombre" id ="nombre" placeholder="Ingrese su Nombre" type=text/><br>
								
								
									
									<input  class="textoinput textoinputuno" name="email"  placeholder="Ingrese su Email" type="text"/><br>
								
								
									
									<textarea  class="textoinput textoinputuno" name ="comentario" cols="40" rows="10" placeholder="Mensaje" aria-required="true"></textarea><br>
									<input  class="button" name="submit" type="submit"  value="Enviar" />
				 				
				 				<?= form_close()?>
				 			  </div>	
				 		    
				 		
				        </li>
         				 
				   </ul>
				</div>
			</section>