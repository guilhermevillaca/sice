<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfilmodel extends CI_Model {


	public function novo()
	{

		$perfil = array(
		   'perfil_nome' => $this->input->post('descricao')
		);

		$this->db->insert('perfil', $perfil);

		if($this->db->affected_rows() > 0)
		{		    
		    return true; 
		}

	}

	public function listar()
	{
		$r = $this->db->get('perfil');

		return $r->result();
		
	}

	public function busca_editar($perfil_codigo)
	{

		$this->db->where('perfil_codigo', $perfil_codigo);

		$r = $this->db->get('perfil');

		return $r->result();

	}

	public function editar($perfil_codigo)
	{
		$data = array(
            'perfil_nome' => $this->input->post('descricao')               
        );

		$this->db->where('perfil_codigo', $perfil_codigo);

		$this->db->update('perfil', $data);

		if($this->db->affected_rows() > 0)
		{		    
		    return true; 
		}

	}

	public function deletar($perfil_codigo)
	{

		$this->db->where('perfil_codigo', $perfil_codigo);

		$this->db->delete('perfil');

		if($this->db->affected_rows() > 0)
		{		    
		    return true; 
		}

	}
	

}

/* End of file perfilmodel.php */
/* Location: ./application/models/perfilmodel.php */