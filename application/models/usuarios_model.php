<?php
/*
*/

class Usuarios_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function seleccionar()
	{
		$query = $this->db->query("select *from usuario u , asignacion_cargo a, efectivo_policial e where a.id_pol = e.id_pol and u.id_pol = e.id_pol and e.estado = 'ACTIVO' ");

		//$query = $this->db->query("select *from asignacion_cargo a , efectivo_policial e where  a.id_pol = e.id_pol and  e.estado = 'ACTIVO'");

		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$dato[] = $fila;
			}
			return $dato;
		}
	}

	function email_id($email)
	{
		$this->db->where('email',$email);
		$query = $this->db->get('usuario');
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$dato[] = $fila;
			}
			return $dato;
		}		
	}

	function id_check($id)
	{
		$this->db->where('id_pol',$id);
		$query = $this->db->get('usuario');
		if($query->num_rows()>0){
			return false;
		}
		else
		{
			return true;
		}
	}
	
	function insert_user($tipo,$id,$estado,$user,$clave)
	{
		$data = array(
			'tipo_user' => $tipo,
			'id_pol' => $id,
			'estado_user' => $estado,
			'username' => $user,
			'clave' => $clave
		 );
		return  $this->db->insert('usuario',$data);
	}
	
	function modificar_user($id,$tipo,$estado)
	{
		$data = array(
			'tipo_user' => $tipo,
			'estado_user' => $estado,
		 );
		$this->db->where('id_user',$id);
		return  $this->db->update('usuario',$data);
	}

	function selec_user($id)
	{
		 	
		
		$query = $this->db->query("select *from usuario u , asignacion_cargo a, efectivo_policial e where a.id_pol = e.id_pol and u.id_user = '$id' and u.id_pol = e.id_pol ");
		//$query = $this->db->get_where('usuario',array ('id_user' =>$id));
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$dato[] = $fila;
			}
			return $dato;
		}
	} 
	function user_check($user) 
	{
		$this->db->where('username',$user);
		$query = $this->db->get('usuario');
		if($query->num_rows()>0){
			return false;
		}
		else{
			return true;
		}
	}
	function emails($email)
	{
		$this->db->where('email',$email);
		$query = $this->db->get('usuario');
		if($query->num_rows()>0){
			return true;
		}
		else{
			return false;
		}	
	}
	function loguear($username, $password)

	{

		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$query = $this->db->get('usuario');
		if($query->num_rows() > 0) 
		{
			return $query->result();
		}
	}
	function contro_user($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$query = $this->db->get('usuario');
		if($query->num_rows()>0){
			return true;
		}
		else{
			return false;
		}

	}
	function consulta_acc($id)
	{
		$this->db->where('es_acceso', 1);

		$query = $this->db->get('usuario');
		if($query->num_rows()>0){
			return true;
		}
		else{
			return false;
		}
	
	}
	function cambiar_clave($id,$password)
	{
		$data = array(
			
			'password' => $password,
		 );
		$this->db->where('id_user',$id);
		return  $this->db->update('usuario',$data);

	}

	function actu_estado($id)
	{
		$data = array(
			
			'es_acceso' => 1,
		 );
		$this->db->where('id_user',$id);
		return  $this->db->update('usuario',$data);

	}
	function actu_estado_dos($id)
	{
		$data = array(
			
			'es_acceso' => 0,
		 );
		$this->db->where('id_user',$id);
		return  $this->db->update('usuario',$data);

	}
	/*	function insert_usuario($ci,$username,$password,$tipo,$estado)
	{
		$data = array(
			'ci_persona' => $ci,
			'username' => $username,
			'password' => $password,
			'tipo_user' => $tipo,
			'estado' => $estado
			
		 );
		return  $this->db->insert('user',$data);
	}*/
}
?>