<?php
/*
*/

class Empresas_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
function selec_empresas()
	{
		$query = $this->db->get('empresa');
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$dato[] = $fila;
			}
			return $dato;
		}

	}

	function registrar_empre($nombre,$area)
	{
		$data = array(
			'nombre_emp' => $nombre,
			'area' => $area,
			
			
		 );
		return  $this->db->insert('empresa',$data);
	}
	
	function modificar_empre($id,$nombre,$area)
	{
		$data = array(
			'nombre_emp' => $nombre,
			'area' => $area,
			
			
		 );

		$this->db->where('id_emp',$id);
		$this->db->update('empresa',$data);

	}

	function selec_empresas_id($id)
	{
		$this->db->where('id_emp',$id);
		$query = $this->db->get('empresa');
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$dato[] = $fila;
			}
			return $dato;
		}		
	}


	function id_max_foto()
		{
		
			$this->db->select_max('num_foto');
			$query = $this->db->get('empresa');

			if($query->num_rows() > 0)
			{
				return $query->result();
			}
		}
	function modi_foto($id,$nombre)
	{
		$data = array(
			'num_foto' => $nombre
		 );
		$this->db->where('id_emp',$id);
		$this->db->update('empresa',$data);

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

	
}
?>