<?php

class Inicio extends CI_Controller
    {
    	function __construct(){
    		parent::__construct();
    		//$this->_is_logued_in();
    		$this->load->helper(array('form', 'url'));
    		//$this->load->model('policia_model');
    		$this->load->model('empresas_model');
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
			
				/*$menu = $this->session->userdata('menu');
				$id = $this->session->userdata('id_pol');
                $dato ['policia'] =$this->policia_model->selec_policia($id);  
				$dato['tipo_user'] = $this->session->userdata('tipo_user');*/
				
				
				$dato['title']= "Pagina de Inicio";	
				$dato['error'] = "";
				$dato['error2'] = "";
				$dato['filas'] = $this->empresas_model->selec_empresas();
			//	$dato['consulta'] = $this->horario_model->selec_horario();	
			
				$this->load->view("inicio/cabecera",$dato);
				//$this->load->view("inicio/$menu",$dato);
				$this->load->view("inicio/bienvenidos");
				$this->load->view("inicio/pie",$dato);
			
			
		}
		function cambiar_turnos()
		{
			$dato['title']= "Cambiar turno";	
			$menu = $this->session->userdata('menu');
				$id = $this->session->userdata('id_pol');
                $dato ['policia'] =$this->policia_model->selec_policia($id);  
				$dato['tipo_user'] = $this->session->userdata('tipo_user');
				$dato['consulta'] = $this->horario_model->selec_horario();	
			
				$this->load->view("inicio/cabecera",$dato);
					$this->load->view("inicio/$menu",$dato);
					$this->load->view("inicio/cambiar_turno");
					$this->load->view("inicio/pie");
		}

		function edit_horario()
		{
			$turno = $this->input->post ('turno');
			$grupo = $this->input->post ('grupo');
			$update = $this->horario_model->modifi_horario($turno,$grupo);
			$this->index();


		}
		function edit_horario2($turno, $grupo)
		{
			
			$update = $this->horario_model->modifi_horario($turno,$grupo);
			$this->index();


		}

		function cambiar_permiso()
		{
			$dato['title']= "Cambiar turno";	
			$menu = $this->session->userdata('menu');
				$id = $this->session->userdata('id_pol');
                $dato ['policia'] =$this->policia_model->selec_policia($id);  
				$dato['tipo_user'] = $this->session->userdata('tipo_user');
				$dato['consulta'] = $this->horario_model->selec_horario();	
			
				$this->load->view("inicio/cabecera",$dato);
					$this->load->view("inicio/$menu",$dato);
					$this->load->view("inicio/cambiar_turno");
					$this->load->view("inicio/pie");
		}

		function permiso($id_user)
		{

			/*$permiso = "PERMISO";
			$update = $this->policia_model->permisos($id,$permiso);
			redirect("turnos/lista_turnos/0");*/
				$dato['title']= "PERMISOS A EFECTIVOS POLICIALES";	
				$menu = $this->session->userdata('menu');
				$id = $this->session->userdata('id_pol');
                $dato ['policia'] =$this->policia_model->selec_policia($id);  
				$dato['tipo_user'] = $this->session->userdata('tipo_user');
				
 				$dato ['id_user'] = $id_user;
				$dato['consulta'] = $this->horario_model->selec_horario();	
				$this->load->view("inicio/cabecera",$dato);
				$this->load->view("inicio/$menu",$dato);
				$this->load->view("inicio/permisos_usuario",$dato);
				$this->load->view("inicio/pie");

		}
		function dar_permiso($id)
		{

			 
			$permiso = $this->input->post ('permiso');
			$update = $this->policia_model->permisos($id,$permiso);
			redirect("turnos/lista_turnos/0");
				

		}

		function registrar_tipi()
		{

				$dato['title']= "Registro de Tipificaciones";	
				$menu = $this->session->userdata('menu');
				$id = $this->session->userdata('id_pol');
                $dato ['policia'] =$this->policia_model->selec_policia($id);  
				$dato['tipo_user'] = $this->session->userdata('tipo_user');
				
				$dato['consulta'] = $this->horario_model->selec_horario();	
				$this->load->view("inicio/cabecera",$dato);
				$this->load->view("inicio/$menu",$dato);
				$this->load->view("inicio/registrar_tipificacion");
				$this->load->view("inicio/pie");
		}
		function _control_tipi($tipi)
		{
			return $this->horario_model->tipi_ckeck($tipi);
		}
		function guardar_tipi()
		{
			
			$this->form_validation->set_rules('tipificacion', 'TIPIFICACION', 'required|trim|min_length[3]|strtoupper|callback__control_tipi');
			
		
			$this->form_validation->set_message('_control_tipi', 'la TIPIFICACION ya ha sido registrado ...!!!!!');
		
			$this->form_validation->set_message('required', 'Debe introducir el campo %s ...!!!!!');
			$this->form_validation->set_message('min_length', 'el %s tiene q tener 3 caracteres ...!!!!!');
			
			if (($this->form_validation->run()) == FALSE)
			{
				$this->registrar_tipi();
			}
			else
			{
				$tipi = $this->input->post ('tipificacion');
					
									
				$insert = $this->horario_model->registro_tipificacion($tipi);
						
				$this->lista_tipicacion();
			}	
		}
		function lista_tipicacion()
		{
				$dato['title']= "Lista de Tipificaciones";	
				$menu = $this->session->userdata('menu');
				$id = $this->session->userdata('id_pol');
                $dato ['policia'] =$this->policia_model->selec_policia($id);  
				$dato['tipo_user'] = $this->session->userdata('tipo_user');
				
				$dato['filas'] = $this->horario_model->seleccionar_tipi();
				$dato['consulta'] = $this->horario_model->selec_horario();	
				$this->load->view("inicio/cabecera",$dato);
				$this->load->view("inicio/$menu",$dato);
				$this->load->view("inicio/lista_tipificado");
				$this->load->view("inicio/pie");

		}
		function edit_tipifcado($id_tipi)
		{
				$dato['title']= "Modificar Tipificación";	
				$menu = $this->session->userdata('menu');
				$id = $this->session->userdata('id_pol');
                $dato ['policia'] =$this->policia_model->selec_policia($id);  
				$dato['tipo_user'] = $this->session->userdata('tipo_user');	


				$dato['filas'] = $this->horario_model->seleccionar_tipi_id($id_tipi);
				$dato['consulta'] = $this->horario_model->selec_horario();	
				$this->load->view("inicio/cabecera",$dato);
				$this->load->view("inicio/$menu",$dato);
				$this->load->view("inicio/modificar_tipi");
				$this->load->view("inicio/pie");	
		}
		function modificar_tipificacion($id_tipi)
		{
			$this->form_validation->set_rules('tipificacion', 'TIPIFICACION', 'required|trim|min_length[3]|strtoupper|callback__control_tipi');
			$this->form_validation->set_message('_control_tipi', 'la TIPIFICACION ya ha sido registrado ...!!!!!');
		
			$this->form_validation->set_message('required', 'Debe introducir el campo %s ...!!!!!');
			$this->form_validation->set_message('min_length', 'el %s tiene q tener 3 caracteres ...!!!!!');
			
			if (($this->form_validation->run()) == FALSE)
			{
				$this->edit_tipifcado($id_tipi);
			}
			else
			{
				$tipi = $this->input->post ('tipificacion');
					
									
				$insert = $this->horario_model->modificar_tipificacion($id_tipi,$tipi);
						
				$this->lista_tipicacion();
			}	

		}
}
?>