<?php

class Usuarios extends CI_Controller
    {
    	function __construct(){
    		parent::__construct();
    	/*	$this->load->model('policia_model');
    		$this->load->model('horario_model');
    		
    		$this->load->model('cargos_model');*/
			$this->load->model('usuarios_model');
			$this->load->model('empresas_model');
    		$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->helper('date');
    	}
		
		
		function index()
		{
				//$dato['consulta'] = $this->horario_model->selec_horario();	
				$dato['title']= "Ingreso de usuarios";	
				$dato['error'] ="";	
				$this->load->view("inicio/cabecera",$dato);
				$this->load->view("inicio/vacio");
				$this->load->view("usuarios/loguen",$dato); 
				$this->load->view("inicio/pie");	
			 
				
				
			
		}
		function lis_user()
		{
			$menu = $this->session->userdata('menu');
			$id = $this->session->userdata('id_pol');
            $dato ['policia'] =$this->policia_model->selec_policia($id);  
			$dato['tipo_user'] = $this->session->userdata('tipo_user');	
			$dato['consulta'] = $this->horario_model->selec_horario();	

			if($dato['filas'] =$this->usuarios_model->seleccionar()) 
			{
				$dato['title']= "Lista de usuarios del sistema";	
				$this->load->view("inicio/cabecera",$dato);
				$this->load->view("inicio/$menu",$dato);
				$this->load->view("usuarios/view_usuario",$dato);
				$this->load->view("inicio/pie");	
			} 
			else
			{
				$dato['title']= "Lista de efectivos policiales";
				$dato['filas'] =$this->policia_model->seleccionar();
				$dato['error'] ="";	
				$this->load->view("inicio/cabecera",$dato);
				$this->load->view("inicio/$menu",$dato);
				$this->load->view("usuarios/lis_policia",$dato);
				$this->load->view("inicio/pie");
			}	
		}

		function nuevo_user($id_pol,$cargo)
		{
			$dato['consulta'] = $this->horario_model->selec_horario();	
			$menu = $this->session->userdata('menu');
				$id = $this->session->userdata('id_pol');
                $dato ['policia'] =$this->policia_model->selec_policia($id);  
				$dato['tipo_user'] = $this->session->userdata('tipo_user');
			if($this->usuarios_model->id_check($id_pol))
			{
				if($cargo != 'FURRIEL')
				{
					$dato['title']= "Registro de usuarios del sistema";
					$dato['filas'] =$this->policia_model->selec_policia($id_pol);
					$this->load->view("inicio/cabecera",$dato);
					$this->load->view("inicio/$menu",$dato);
					$this->load->view("usuarios/new_user",$dato);
					$this->load->view("inicio/pie");
				}	
				else
				{
					$dato['title']= "Lista de efectivos policiales";
					$dato['filas'] =$this->cargos_model->seleccionar();
					$dato['error'] ="ERROR... !! El efectivo policial no puede ser usuario del sistema por el cargo que tiene asignado...!!!";	
					$this->load->view("inicio/cabecera",$dato);
					$this->load->view("inicio/$menu");
					$this->load->view("usuarios/lis_policia",$dato);
					$this->load->view("inicio/pie");

				}	
				
			}
			else
			{
				$dato['title']= "Lista de efectivos policiales";
				$dato['filas'] =$this->cargos_model->seleccionar();
				$dato['error'] ="ERROR... !! El efectivo policial ya esta registrado como usuario...!!!";	
				$this->load->view("inicio/cabecera",$dato);
				$this->load->view("inicio/$menu");
				$this->load->view("usuarios/lis_policia",$dato);
				$this->load->view("inicio/pie");
			}
		}

		function lista_poli()
		{
				$menu = $this->session->userdata('menu');
				$id = $this->session->userdata('id_pol');
                $dato ['policia'] =$this->policia_model->selec_policia($id);  
				$dato['tipo_user'] = $this->session->userdata('tipo_user');
				$dato['title']= "Lista de efectivos policiales";
				$dato['filas'] =$this->cargos_model->seleccionar();
				
				$dato['error'] ="";	
				$dato['consulta'] = $this->horario_model->selec_horario();	 
				$this->load->view("inicio/cabecera",$dato);
				$this->load->view("inicio/$menu",$dato);
				$this->load->view("usuarios/lis_policia",$dato);
				$this->load->view("inicio/pie");
		}
		
		function registrar_usuario($id)
		{
				
			$this->form_validation->set_rules('username', 'CI', 'required|trim|min_length[4]|callback__verificar_usuario');
			$this->form_validation->set_rules('clave', 'NOMBRE ', 'required|trim|min_length[4]|md5');
			
			
			$this->form_validation->set_message('_verificar_usuario', 'el nombre de usuario ya ha sido registrado ...!!!!!');
		
			$this->form_validation->set_message('required', 'Debe introducir el campo %s ...!!!!!');
			$this->form_validation->set_message('min_length', 'el %s tiene q tener 4 caracteres ...!!!!!');
			//$this->form_validation->set_message('_verificar_usuario', 'el nombre de usuario ya esta registrado');
			
			if (($this->form_validation->run()) == FALSE)
			{
				$this->lis_user();
			}
			else
			{
				if($this->usuarios_model->id_check($id))
				{
					$username = $this->input->post('username');
				$clave = $this->input->post('clave');			
				$tipo = $this->input->post('tipo_user');		
				$unidad = $this->input->post('unidad');
				$estado = 'HABILITADO';
				$insert = $this->usuarios_model->insert_user($tipo,$id,$estado,$username,$clave);
				}	
				$this->lis_user();
			}
		}
		function _verificar_usuario ($user) 
		{
			return $this->usuarios_model->user_check($user);
		}

		
		function logued() 
		{	
		
			$username = $this->input->post('usuario'); 
			$password = md5($this->input->post('password'));
			$login = $this->usuarios_model->loguear($username, $password);
				//echo $password;
				
			if($login)
			{
				
				

				
				$data = array(
					'is_logued_in'  => TRUE,
					'id_user' => $login[0]->id_user,
					/*'tipo_user' => $login[0]->tipo_user,
					'id_pol' => $login[0]->id_pol,
					'estado' => $login[0]->estado_user,*/
					'user' => $login[0]->username
								
					
				);

				
					$this->session->set_userdata($data);
				redirect("socios");
				//echo "esta bien";

			}
			else 
			{
				
				$dato['error'] ="El nombre de usuario o contraseña son incorrectos";	
				

				$dato['title']= "Pagina de Inicio";	
				
			//	$dato['consulta'] = $this->horario_model->selec_horario();	
			
				$this->load->view("inicio/cabecera",$dato);
				//$this->load->view("inicio/$menu",$dato);
				$this->load->view("inicio/bienvenidos");
				$this->load->view("inicio/pie");	
			}
		}
	function salir()
	{
		$this->session->sess_destroy();
		redirect('inicio/index');

	}

	function cambio_contra()
	{
		$is_logued_in = $this->session->userdata('is_logued_in');
			if($is_logued_in != TRUE)
			{
				//echo $is_logued_in;
				redirect('inicio');
			}	
			else{


				$dato['error'] ="";

				$dato['title']= "Cambiar Contraseña";	
				//$dato['filas'] = $this->usuarios_model->selec_user($id_pol);
				
				
				$this->load->view("socios/cabecera",$dato);
			//this->load->view("inicio/$menu",$dato);
				$this->load->view("socios/modi_contra",$dato);
				$this->load->view("socios/pie");
			}	
		
	}
	function _control_clave($clave)
	{
		
		$user = $this->session->userdata('user');

		return $this->usuarios_model->contro_user($user, $clave);
	}

	function cambiar_contra()
	{

		$user = $this->session->userdata('user');
		$id = $this->session->userdata('id_user');
		$clave  = md5($this->input->post('clave'));
		$nueva =  md5($this->input->post('password'));
		$confimar = md5($this->input->post('repassword'));

		if ($this->usuarios_model->contro_user($user, $clave))
		{
			if($nueva == $confimar)
			{
				$update = $this->usuarios_model->cambiar_clave($id,$nueva);
				$dato['error'] ="SE MODIFICON SU CONTRASEÑA ...!!";
			}
			else
			{
				$dato['error'] ="Los campos nueva contraseña  y confimar contraseña  no coinciden ...!!";
			}	
		}
		else
		{
			
				$dato['error'] ="La contraseña actual es incorrecta ";

		}

				

			$dato['title']= "Cambiar Contraseña";	
			//$dato['filas'] = $this->usuarios_model->selec_user($id_pol);
			
			
			$this->load->view("socios/cabecera",$dato);
			//this->load->view("inicio/$menu",$dato);
			$this->load->view("socios/modi_contra",$dato);
			$this->load->view("socios/pie");

	}
	function _control_email($email)
	{
		return $this->usuarios_model->email_check($email);
	}

	function olvide_contra()
	{
		$this->form_validation->set_rules('usuariosas', 'EMAIL', 'required|trim|min_length[3]|valid_email');
		//$this->form_validation->set_message('_control_email', 'el email no esta registrado en el sistema ...!!!!!');
		$this->form_validation->set_message('valid_email', 'El direccion email es incorrecta ...!!!!!');
		if (($this->form_validation->run()) == FALSE)
			{
				$dato['title']= "Pagina de Inicio";	
						$dato['error'] = "";
						$dato['error2'] =  "la direccion es incorrecta";
						$dato['filas'] = $this->empresas_model->selec_empresas();
					//	$dato['consulta'] = $this->horario_model->selec_horario();	
					
						$this->load->view("inicio/cabecera",$dato);
						//$this->load->view("inicio/$menu",$dato);
						$this->load->view("inicio/bienvenidos");
						$this->load->view("inicio/pie",$dato);
			}
			else
			{

				$email = $this->input->post('usuariosas');

				if($this->usuarios_model->emails($email))
				{		 
			
					$id_email = $this->usuarios_model->email_id($email);
					$id_user_email = $id_email[0]->id_user;

					$comentario = " HAZ CLICK AQUI ->    http://siesrl.260mb.org/SIE_otro/SIE/index.php/usuarios/recuperar_contra/$id_user_email";	

					
					$email2 = "sieboliva@gmail.com";
					
				$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'smtp.googlemail.com';
				$config['smtp_port'] = 587;
				$config['smtp_user'] = 'sieboliva@gmail.com';
				$config['smtp_pass'] = 'siebolivia2012';

				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");


				$this->email->from($email2);
				$this->email->to($email);
				
				//$this->email->subject('Aquí está su información ');
				$this->email->subject('cambio de Contraseña');
				$this->email->message($comentario);
				$this->email->send();

					if ( ! $this->email->send())
					{
				
						 echo "no se envio nada a su correo jajajaj";
					}
					else
					{
										//
						//$insert = $this->consulta_model->registrar_consulta($email,$nombre,$comentario,$fecha);
						//redirect("inicio");
						$update = $this->usuarios_model->actu_estado($id_user_email);
						$dato['title']= "Pagina de Inicio";	
						$dato['error'] = "";
						$dato['error2'] =  "se envio un email a su correo";
						$dato['filas'] = $this->empresas_model->selec_empresas();
					//	$dato['consulta'] = $this->horario_model->selec_horario();	
					
						$this->load->view("inicio/cabecera",$dato);
						//$this->load->view("inicio/$menu",$dato);
						$this->load->view("inicio/bienvenidos");
						$this->load->view("inicio/pie",$dato);
						
					}
				}
				else
				{
					$dato['title']= "Pagina de Inicio";	
						$dato['error'] = "";
						$dato['error2'] =  " EL CORREO NO ESTA REGISTRADO EN EL SISTEMA ";
						$dato['filas'] = $this->empresas_model->selec_empresas();
					//	$dato['consulta'] = $this->horario_model->selec_horario();	
					
						$this->load->view("inicio/cabecera",$dato);
						//$this->load->view("inicio/$menu",$dato);
						$this->load->view("inicio/bienvenidos");
						$this->load->view("inicio/pie",$dato);

				}	

			}


				
		 
	}

	function recuperar_contra($id)
	{
			$dato['id']= $id;	
			if($this->usuarios_model->consulta_acc($id))
			{

					$dato['error'] ="";

				$dato['title']= "Actualizar Contraseña";	
			//$dato['filas'] = $this->usuarios_model->selec_user($id_pol);
			
			
			//$this->load->view("socios/cabecera",$dato);
			//$this->load->view("inicio/$menu",$dato);
				$this->load->view("socios/recuperar",$dato);
			//	$this->load->view("socios/pie");
			}
			else
			{
				redirect('inicio');

			}	

	}
	function recuperar_clave($id)
	{
		$user = $this->session->userdata('user');
		//$id = $this->session->userdata('id_user');
		
		$nueva =  md5($this->input->post('password'));
		$confimar = md5($this->input->post('repassword'));

			if($nueva == $confimar)
			{
				$update = $this->usuarios_model->cambiar_clave($id,$nueva);
				$update = $this->usuarios_model->actu_estado_dos($id);
				$dato['error'] ="SE MODIFICON SU CONTRASEÑA ...!!";
				redirect('inicio');
			}
			else
			{
				$dato['error'] ="Los campos nueva contraseña  y confimar contraseña  no coinciden ...!!";

				$dato['id']= $id;	

				$dato['title']= "Actualizar Contraseña";	
			//$dato['filas'] = $this->usuarios_model->selec_user($id_pol);
			
			
			//$this->load->view("socios/cabecera",$dato);
			//$this->load->view("inicio/$menu",$dato);
				$this->load->view("socios/recuperar",$dato);
			}	
		
	}



}
?>