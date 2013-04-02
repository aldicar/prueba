<?php

class Empresas extends CI_Controller
    {
    	function __construct(){
    		parent::__construct();
    		$this->_is_logued_in();
    		$this->load->helper(array('form', 'url'));
    		//$this->load->model('policia_model');
    		$this->load->model('empresas_model');
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
								
				

				if($dato['filas'] = $this->empresas_model->selec_empresas())
				{
					$dato['title']= "Lista de Empresas";	
					$this->load->view("socios/cabecera",$dato);
				//$this->load->view("inicio/$menu",$dato);
				$this->load->view("empresas/lista_empresas",$dato);
				$this->load->view("socios/pie");
			
				}	
				else
				{

					$this->new_empresa();
				}
		}
		function new_empresa()
		{
			$datestring = " %Y-%m-%d";
				$time = time();
				$fecha =  mdate($datestring, $time);

				$dato['fecha'] = $fecha;
					$dato['title']= "Registrar Nueva Empresa";	
					$this->load->view("socios/cabecera",$dato);
				//$this->load->view("inicio/$menu",$dato);
				$this->load->view("empresas/nueva_empresa",$dato);
				$this->load->view("socios/pie");

		}

		function registrar_empresa()
		{
			$this->form_validation->set_rules('nombre', 'NOMBRE DE EMPRESA', 'required|trim|strtoupper|min_length[3]|max_length[10]');
			$this->form_validation->set_rules('area', 'AREA', 'required|trim|min_length[3]');
			
		
			$this->form_validation->set_message('required', 'Debe introducir el campo %s ...!!!!!');
			$this->form_validation->set_message('valid_email', 'La direccion de correo es incorrecta ...!!!!!');
			$this->form_validation->set_message('min_length', 'el %s tiene q tener 3 caracteres ...!!!!!');
			$this->form_validation->set_message('max_length', 'el %s tiene maximo 10 caracteres ...!!!!!');
			
			if (($this->form_validation->run()) == FALSE)
			{
				//redirect("inicio");
				$this->new_empresa();
				//echo "error";
			}
			else
			{
				$id_user = $this->session->userdata('id_user');
				$nombre = $this->input->post ('nombre');
				$area = $this->input->post ('area');
				$insert = $this->empresas_model->registrar_empre($nombre,$area);
				$this->index();
				


				

				
			}

		}
		function cargar_foto($id, $error)
		{
			
			if ($id == $error) {
				$dato ['error']	= '';
			}
			else
			{
				$dato ['error']	= $error;
			}
			$dato ['title'] = 'Cargar Foto';

			$data ['filas'] = $this->empresas_model->selec_empresas_id($id);
			$this->load->view("socios/cabecera",$dato);
			$this->load->view('empresas/cargar_foto', $data);
			$this->load->view("socios/pie");

		}
		function do_upload($id)
		{
			//
			
			//echo $id;
			$max = $this->empresas_model->id_max_foto();
			$nombre = $max[0]->num_foto;  
			$nombre= $nombre + 1;
			$config['upload_path'] = './images/img_empresas/';
			//$config['upload_path'] = 'htdocs/images/img_empresas/';
			//$config['allowed_types'] = 'pdf';
			$config['allowed_types'] = 'pdf|jpg';
			$config['max_size'] = '0';
			$config['file_name'] = $nombre;
			//$config['max_width'] = '0';
			//$config['max_height'] = '0';
			
			$this->load->library('upload', $config); 
			if ( ! $this->upload->do_upload())
			{
			$error = "ERROR NO SE PUDO SUBIR LA IMAGEN auraaaaaa ..!!";
			$this->cargar_foto($id,$error);
			}
			else
			{
				$insert = $this->empresas_model->modi_foto($id,$nombre);
				$error = "LA IMAGEN SE SUBIO CORRECTAMENTE..!!";
				$this->cargar_foto($id,$error);
			}

		}
		function edit_empresa($id)
		{

			$dato ['title'] = 'Modificar Empresa';

			$data ['filas'] = $this->empresas_model->selec_empresas_id($id);
			$this->load->view("socios/cabecera",$dato);
			$this->load->view('empresas/modifi_empresa', $data);
			$this->load->view("socios/pie");

		}

		function modificar_empresa($id)
		{
			$this->form_validation->set_rules('nombre', 'NOMBRE DE EMPRESA', 'required|trim|strtoupper|min_length[3]|max_length[10]');
			$this->form_validation->set_rules('area', 'AREA', 'required|trim|min_length[3]');
			
		
			$this->form_validation->set_message('required', 'Debe introducir el campo %s ...!!!!!');
			$this->form_validation->set_message('valid_email', 'La direccion de correo es incorrecta ...!!!!!');
			$this->form_validation->set_message('min_length', 'el %s tiene q tener 3 caracteres ...!!!!!');
			$this->form_validation->set_message('max_length', 'el %s tiene maximo 10 caracteres ...!!!!!');
			
			if (($this->form_validation->run()) == FALSE)
			{
				//redirect("inicio");
				$this->edit_empresa($id);
				//echo "error";
			}
			else
			{
				$id_user = $this->session->userdata('id_user');
				$nombre = $this->input->post ('nombre');
				$area = $this->input->post ('area');
				$insert = $this->empresas_model->modificar_empre($id,$nombre,$area);
				$this->index();
				

			}

		}
		

		
		
		
}
?>