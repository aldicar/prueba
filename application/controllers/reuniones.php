<?php

class Reuniones extends CI_Controller
    {
    	function __construct(){
    		parent::__construct();
    		$this->_is_logued_in();
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
				redirect('inicio');
			}	
		}
		function index() 
		{
			
				/*$menu = $this->session->userdata('menu');
				$id = $this->session->userdata('id_pol');
                $dato ['policia'] =$this->policia_model->selec_policia($id);  
				$dato['tipo_user'] = $this->session->userdata('tipo_user');*/
								
				

				if($dato['filas'] = $this->consulta_model->lista_reuniones())
				{
					$dato['title']= "Reuniones";	
					$this->load->view("socios/cabecera",$dato);
				//$this->load->view("inicio/$menu",$dato);
				$this->load->view("socios/lista_reuniones",$dato);
				$this->load->view("socios/pie");
			
				}	
				else
				{

					$this->new_reunion();
				}
		}
		function new_reunion()
		{
			$datestring = " %Y-%m-%d";
				$time = time();
				$fecha =  mdate($datestring, $time);

				$dato['fecha'] = $fecha;
					$dato['title']= "Registrar Nueva Reunion";	
					$this->load->view("socios/cabecera",$dato);
				//$this->load->view("inicio/$menu",$dato);
				$this->load->view("socios/nueva_reunion",$dato);
				$this->load->view("socios/pie");

		}

		function registrar_reunion()
		{
			$this->form_validation->set_rules('tipo', 'RESPUESTA', 'required|trim|min_length[3]');
			$this->form_validation->set_rules('lugar', 'RESPUESTA', 'required|trim|min_length[3]');
			$this->form_validation->set_rules('respuesta', 'RESPUESTA', 'required|trim|min_length[3]');
		
			$this->form_validation->set_message('required', 'Debe introducir el campo %s ...!!!!!');
			$this->form_validation->set_message('valid_email', 'La direccion de correo es incorrecta ...!!!!!');
			$this->form_validation->set_message('min_length', 'el %s tiene q tener 3 caracteres ...!!!!!');
			
			if (($this->form_validation->run()) == FALSE)
			{
				//redirect("inicio");
				$this->new_reunion();
				//echo "error";
			}
			else
			{
				$id_user = $this->session->userdata('id_user');
				$tipo = $this->input->post ('tipo');
				$lugar = $this->input->post ('lugar');
				$fecha = $this->input->post ('fecha');
				$respuesta = $this->input->post ('respuesta');

				$contenido = ("fecha de reunion: $fecha  <br />  Lugar: $lugar <br />  Descripcion:  $respuesta ") ;
				
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
			        $mail->Subject    = "NUEVA REUNION";  //Asunto del mensaje
			        $mail->Body      = "$contenido	";
			        $mail->AltBody    = "Cuerpo en texto plano";
			        $destino = "alvarod745@gmail.com";
			        $mail->AddAddress($destino);

			      //  $mail->AddAttachment("images/phpmailer.gif");      // añadimos archivos adjuntos si es necesario
			        //$mail->AddAttachment("images/phpmailer_mini.gif"); // tantos como queramos

			        if(!$mail->Send()) {
			        	echo "error no se envio ";
			            //$data["message"] = "Error en el envío: " . $mail->ErrorInfo;
			        } else {
			        					//
					$insert = $this->consulta_model->registrar_reunion($id_user,$tipo,$lugar,$fecha,$respuesta);
					$this->index();
				
			        }
			        //$this->load->view('sent_mail',$data);				    
							    
							    
			}			

		}

		
		
		
}
?>