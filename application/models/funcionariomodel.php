<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Funcionariomodel extends CI_Model {

	public function listar()
	{

		$this->db->join('pessoa', 'funcionario.pes_codigo = pessoa.pes_codigo', 'inner');

		$r = $this->db->get('funcionario');

		return $r->result();

	}

	public function cadastrar()
	{


		$pessoa = array(		   	
			'perfil_codigo'	  => 2,
			'pes_nome'	      => $this->input->post('nome'),
			'pes_cpf'	      => $this->input->post('cpf'),
			'pes_rg'          => $this->input->post('rg'),
			'pes_sexo'        => $this->input->post('sexo'),
			'pes_cep'	      => $this->input->post('cep'),
			'pes_logradouro'  => $this->input->post('logradouro'),
			'pes_numero'	  => $this->input->post('numero'),
			'pes_complemento' => $this->input->post('complemento'),
			'pes_bairro'      => $this->input->post('bairro'),	 
			'pes_cidade'	  => $this->input->post('cidade'),
			'pes_estado'	  => $this->input->post('estado'),
			'pes_fone'	      => $this->input->post('fone'),
			'pes_email'	      => $this->input->post('email'),
			'pes_usuario'	  => $this->input->post('usuario'),
			'pes_senha'	      => md5($this->input->post('senha')),
			'pes_data_nasc'   => $this->formatData($this->input->post('nascimento'))
		);


		$this->db->insert('pessoa', $pessoa);

		if($this->db->affected_rows() > 0)
		{		    

			$funcionario = array(
				'pes_codigo' => $this->db->insert_id()
				);

			$this->db->insert('funcionario', $funcionario);

			if($this->db->affected_rows() > 0){
		    	return true; 
			}

			return false;
		}

	}

	public function busca_editar($pes_codigo)
	{

		$this->db->where('pessoa.pes_codigo', $pes_codigo);

		$this->db->join('pessoa', 'pessoa.pes_codigo = funcionario.pes_codigo', 'inner');

		$r = $this->db->get('funcionario');

		return $r->result();

	}

	public function editar($pes_codigo)
	{

		$pessoa = array(		   	
			'perfil_codigo'	  => 3,
			'pes_nome'	      => $this->input->post('nome'),
			'pes_cpf'	      => $this->input->post('cpf'),
			'pes_rg'	      => $this->input->post('rg'),
			'pes_sexo'        => $this->input->post('sexo'),
			'pes_cep'	      => $this->input->post('cep'),
			'pes_logradouro'  => $this->input->post('logradouro'),
			'pes_numero'	  => $this->input->post('numero'),
			'pes_complemento' => $this->input->post('complemento'),
			'pes_bairro'      => $this->input->post('bairro'),	 
			'pes_cidade'	  => $this->input->post('cidade'),
			'pes_estado'	  => $this->input->post('estado'),
			'pes_email'	      => $this->input->post('email'),
			'pes_usuario'	  => $this->input->post('usuario'),
			'pes_senha'	      => md5($this->input->post('senha')),
			'pes_data_nasc'   => $this->input->post('nascimento')
		);



		$this->db->where('pes_codigo', $pes_codigo);

		$this->db->update('pessoa', $data);

		if($this->db->affected_rows() > 0)
		{		    
		    return true; 
		}

	}

	public function deletar($pes_codigo)
	{

		$pessoa = array(
			'pes_codigo' => $pes_codigo
			);

		$this->db->delete('funcionario', $pessoa); 

		if($this->db->affected_rows() > 0)
		{		    
			$this->db->delete('pessoa', $pessoa);
		    
		    if($this->db->affected_rows() > 0){
		    	return true; 
		    }
		}
	}

	public function formatData($data)
	{
		$a = explode("/", $data);
		$new = $a[0]."-".$a[1]."-".$a[2];

		return $new;
	}


	

}

/* End of file cadastromodel.php */
/* Location: ./application/models/cadastromodel.php */