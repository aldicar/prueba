<?php
/*
*/

class Consulta_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}


	function registrar_consulta($email,$nombre,$descripcion,$fecha)
	{
		$data = array(
			'email' => $email,
			'nombre' => $nombre,
			'descripcion_con' => $descripcion,
			'fecha' => $fecha,
			'estado_con' => 'NO',
			'estado_lei' => 'NO'
		 );
		return  $this->db->insert('consulta',$data);
	}
	function selec_consultas()
	{
		$es = "NO";
		$this->db->where('estado_con',$es);
		$query = $this->db->get('consulta');
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$dato[] = $fila;
			}
			return $dato;
		}

	}
















	function selec_consultas_id($id)
	{
		$this->db->where('id_con',$id);
		$query = $this->db->get('consulta');
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$dato[] = $fila;
			}
			return $dato;
		}		
	}
	function repondi_con($id)
	{
		$es = "NO";
		$this->db->where('id_con',$id);

		$this->db->where('estado_con',$es);
		$query = $this->db->get('consulta');
		if($query->num_rows() > 0)
		{
			
			return false;
		}	
		else
		{
			return true;
			}	
	}
	function registrar_respuest($id_user,$id_con,$fecha,$comentario)
	{
		$data = array(
			'id_user' => $id_user,
			'id_con' => $id_con,
			'fecha' => $fecha,
			'descripcion' => $comentario
		 );
		  $this->db->insert('respuesta',$data);

		$data2 = array(
			'estado_con' => 'SI'
		 );
		$this->db->where('id_con',$id_con);
		$this->db->update('consulta',$data2);



	}
	function actu_leido($id_con)
	{
		$data2 = array(
			'estado_lei' => 'SI'
		 );
		$this->db->where('id_con',$id_con);
		$this->db->update('consulta',$data2);
	}

	function lista_reuniones()
	{

		$query = $this->db->query("select *from reuniones r , usuario u  where r.id_user = u.id_user");
		//$query = $this->db->get('reuniones');
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$dato[] = $fila;
			}
			return $dato;
		}

	}
	function registrar_reunion($id_user,$tipo,$lugar,$fecha,$descripcion)
	{
		$data = array(
			'id_user' => $id_user,
			'tipo' => $tipo,
			'lugar' => $lugar,
			'fecha' => $fecha,
			'descripcion' => $descripcion
		 );
		  $this->db->insert('reuniones',$data);
	}

	function ultimid()

		{
		
			$this->db->select_max('id_con');
			$query = $this->db->get('consulta');

			if($query->num_rows() > 0)
			{
				return $query->result();
			}
		}
	
}
?>