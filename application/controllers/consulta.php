<?php

class Consulta extends CI_Controller
    {
    	function __construct(){
    		parent::__construct();
    		//$this->_is_logued_in();
    		$this->load->library('My_PHPMailer');
    		$this->load->helper(array('form', 'url'));
    		//$this->load->model('policia_model');
    		$this->load->model('consulta_model');
			//$this->load->library('email');
			$this->load->library('form_validation');
			$this->load->helper('date'); 
    	}
		function _is_logued_in()
		{
			$is_logued_in = $this->session->userdata('is_logued_in');
			if($is_logued_in != TRUE)
			{
				//echo $is_logued_in;
				redirect('usuarios');
			}	
		}
		function index()
		{
			
			$is_logued_in = $this->session->userdata('is_logued_in');
			if($is_logued_in != TRUE)
			{
				//echo $is_logued_in;
				redirect('inicio');
			}	
			else{
				/*$menu = $this->session->userdata('menu');
				$id = $this->session->userdata('id_pol');
                $dato ['policia'] =$this->policia_model->selec_policia($id);  
				$dato['tipo_user'] = $this->session->userdata('tipo_user');*/
								
				$dato['title']= "Pagina de Socios";	

			//	$dato['consulta'] = $this->horario_model->selec_horario();	
			
				$this->load->view("socios/cabecera",$dato);
				//$this->load->view("inicio/$menu",$dato);
				$this->load->view("socios/bienvenidos");
				$this->load->view("socios/pie");
			}
			
		}
			function registrar_consulta()
		{


			$this->form_validation->set_rules('nombre', 'NOMBRE', 'required|trim|min_length[3]|strtoupper');
			$this->form_validation->set_rules('email', 'EMAIL', 'required|trim|min_length[3]|valid_email');
			$this->form_validation->set_rules('comentario', 'COMENTARIO', 'required|trim|min_length[3]');
			
		
			$this->form_validation->set_message('required', 'Debe introducir el campo %s ...!!!!!');
			$this->form_validation->set_message('valid_email', 'La direccion de correo es incorrecta ...!!!!!');
			$this->form_validation->set_message('min_length', 'el %s tiene q tener 3 caracteres ...!!!!!');
			
			if (($this->form_validation->run()) == FALSE)
			{
				redirect("inicio");
				//$this->registrar_tipi();
				//echo "error";
			}
			else
			{
				$datestring = " %Y-%m-%d";
				$time = time();
				$fecha =  mdate($datestring, $time);

				$ultimo = $this->consulta_model->ultimid();
					$id_ult = $ultimo[0]->id_con;
					$id_ult = $id_ult + 1;
				$nombre = $this->input->post ('nombre');
				$email = $this->input->post ('email'); 
				$comentario = $this->input->post ('comentario');

				$contenido = "$comentario <br /> REPONDER -> http://siesrl.260mb.org/index.php/consulta/reponder_consulta_correo/$id_ult/1";
				//$contenido = $comentario;	

					
				$mail = new PHPMailer();
			        $mail->IsSMTP(); // establecemos que utilizaremos SMTP
			        $mail->SMTPAuth   = true; // habilitamos la autenticación SMTP
			        $mail->SMTPSecure = "ssl";  // establecemos el prefijo del protocolo seguro de comunicación con el servidor
			        $mail->Host       = "smtp.gmail.com";      // establecemos GMail como nuestro servidor SMTP
			        $mail->Port       = 465;                   // establecemos el puerto SMTP en el servidor de GMail
			       	$mail->SMTPAuth   = true;
			        $mail->Username   = "sieboliva@gmail.com";  // la cuenta de correo GMail
			        $mail->Password   = "siebolivia2012";            // password de la cuenta GMail
			        $mail->SetFrom('sieboliva@gmail.com', 'S.I.E. SRL');  //Quien envía el correo
			        $mail->AddReplyTo("alvarod745@gmail.com","Nombre Apellido");  //A quien debe ir dirigida la respuesta
			         $mail->Timeout=30;
			        $mail->Subject    = "NUEVA CONSULTA";  //Asunto del mensaje
			        $mail->Body      = "$contenido	";
			        $mail->AltBody    = "Cuerpo en texto plano";
			       $destino = ('roger.mendez.r@gmail.com, fr2percy@gmail.com,iverherlandth@gmail.com,alvarod745@gmail.com,rafa_rolando@hotmail.com');
			        //$destino = "alvarod745@gmail.com";
			        $mail->AddAddress("roger.mendez.r@gmail.com");

			      //  $mail->AddAttachment("images/phpmailer.gif");      // añadimos archivos adjuntos si es necesario
			        //$mail->AddAttachment("images/phpmailer_mini.gif"); // tantos como queramos

			        if(!$mail->Send()) {
			        	echo "error no se envio ";
			            //$data["message"] = "Error en el envío: " . $mail->ErrorInfo;
			        } else { 
							//
					$insert = $this->consulta_model->registrar_consulta($email,$nombre,$comentario,$fecha);
					Redirect("inicio");
				
				}	
				
				
			}

		}
		
		function lista_consulta()
		{
			$is_logued_in = $this->session->userdata('is_logued_in');
			if($is_logued_in != TRUE)
			{
				//echo $is_logued_in;
				redirect('inicio');
			}	
			else{

				$dato['title']= "Lista de Consultas";	

			$dato['filas'] = $this->consulta_model->selec_consultas();	
			
				$this->load->view("socios/cabecera",$dato);
				//$this->load->view("inicio/$menu",$dato);
				$this->load->view("socios/lista_consultas");
				$this->load->view("socios/pie");
			}

		}

		function respuesta_consulta($id_cons)
		{
			
			$is_logued_in = $this->session->userdata('is_logued_in');
			if($is_logued_in != TRUE)
			{
				//echo $is_logued_in;
				redirect('inicio');
			}	
			else{

				$dato['id_user'] = $this->session->userdata('id_user');
				$dato['title']= "Responder Consulta";	

			$dato['filas'] = $this->consulta_model->selec_consultas_id($id_cons);	
				$insert = $this->consulta_model->actu_leido($id_cons);
				$this->load->view("socios/cabecera",$dato);
				//$this->load->view("inicio/$menu",$dato);
				$this->load->view("socios/responder_consultas");
				$this->load->view("socios/pie");
			}
		}

		function reponder_consulta_correo($id_cons,$id_user)
		{
			if($this->consulta_model->repondi_con($id_cons))
			{
				redirect('inicio');
			}	
			else
			{	
				$dato['title']= "Responder Consulta";	
				$dato['id_user'] = $id_user;
				$dato['filas'] = $this->consulta_model->selec_consultas_id($id_cons);	
				$insert = $this->consulta_model->actu_leido($id_cons);
				$this->load->view("socios/cabecera",$dato);
				//$this->load->view("inicio/$menu",$dato);
				$this->load->view("socios/responder_consultas");
				$this->load->view("socios/pie");
			}
		}

		function registrar_respuesta($id_con,$id_user)
		{
			$this->form_validation->set_rules('respuesta', 'RESPUESTA', 'required|trim|min_length[3]');
		
			$this->form_validation->set_message('required', 'Debe introducir el campo %s ...!!!!!');
			//$this->form_validation->set_message('valid_email', 'La direccion de correo es incorrecta ...!!!!!');
			$this->form_validation->set_message('min_length', 'el %s tiene q tener 3 caracteres ...!!!!!');
			
			if (($this->form_validation->run()) == FALSE)
			{
				//redirect("inicio");
				$this->respuesta_consulta($id_con);
				//echo "error";
			}
			else
			{
				$filas = $this->consulta_model->selec_consultas_id($id_con);	
				$email = $filas[0]->email;

				$datestring = " %Y-%m-%d";
				$time = time();
				$fecha =  mdate($datestring, $time);

				

				$contenido = $this->input->post ('respuesta');

					$mail = new PHPMailer();
			        $mail->IsSMTP(); // establecemos que utilizaremos SMTP
			        $mail->SMTPAuth   = true; // habilitamos la autenticación SMTP
			        $mail->SMTPSecure = "ssl";  // establecemos el prefijo del protocolo seguro de comunicación con el servidor
			        $mail->Host       = "smtp.gmail.com";      // establecemos GMail como nuestro servidor SMTP
			        $mail->Port       = 465;                   // establecemos el puerto SMTP en el servidor de GMail
			        $mail->Username   = "sieboliva@gmail.com";  // la cuenta de correo GMail
			        $mail->Password   = "siebolivia2012";            // password de la cuenta GMail
			        $mail->SetFrom('sieboliva@gmail.com', 'S.I.E. SRL');  //Quien envía el correo
			        $mail->AddReplyTo("alvarod745@gmail.com","Nombre Apellido");  //A quien debe ir dirigida la respuesta
			        $mail->Subject    = "NUEVA CONSULTA";  //Asunto del mensaje
			        $mail->Body      = "$contenido	";
			        $mail->AltBody    = "Cuerpo en texto plano";
			      // $destino = ('roger.mendez.r@gmail.com, fr2percy@gmail.com,iverherlandth@gmail.com,alvarod745@gmail.com,rafa_rolando@hotmail.com');
			        //$destino = "alvarod745@gmail.com";
			        $mail->AddAddress($email);

			      //  $mail->AddAttachment("images/phpmailer.gif");      // añadimos archivos adjuntos si es necesario
			        //$mail->AddAttachment("images/phpmailer_mini.gif"); // tantos como queramos

			        if(!$mail->Send()) {
			        	echo "error no se envio ";
			            //$data["message"] = "Error en el envío: " . $mail->ErrorInfo;
			        } else { 
				

					$insert = $this->consulta_model->registrar_respuest($id_user,$id_con,$fecha,$contenido);
					$this->index();
				}
			}
		}

		
		
}
?>