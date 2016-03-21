<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bibliotecamodel extends CI_Model {

	public function add_categoria()
	{

		$categoria = array(
			'cat_descricao' => $this->input->post('descricao'),
			'cat_observacao' => $this->input->post('observacao')
			);

		$this->db->insert('categoria', $categoria);

		if($this->db->affected_rows() > 0)
		{		

	    	return true; 

		}

	    return false;

	}


	public function list_categorias()
	{

		$r = $this->db->get('categoria');

		return $r->result();

	}

	public function show_categorias()
	{

		$this->db->select('cat_codigo, cat_descricao');
		$r = $this->db->get('categoria');

		return $r->result_array();

	}

	public function list_categorias_edit($cat_codigo){

		$this->db->where('cat_codigo', $cat_codigo);

		$r = $this->db->get('categoria');

		return $r->result();

	}

	public function edit_categoria($cat_codigo)
	{

		$categoria = array(
			'cat_descricao' => $this->input->post('descricao'),
			'cat_observacao' => $this->input->post('observacao')
			);

		$this->db->where('cat_codigo', $cat_codigo);
		$this->db->update('categoria', $categoria);

		if($this->db->affected_rows() > 0)
		{		

	    	return true; 

		}

		return false;

	}

	public function del_categoria($cat_codigo)
	{

		$categoria = array(
			'cat_codigo' => $cat_codigo
			);

		$this->db->delete('categoria', $categoria); 

		if($this->db->affected_rows() > 0)
		{    
			return true; 		    
		}

	}


	public function acervo_cad()
	{

		$acervo = array(		   	
			'acer_nome_livro' => $this->input->post('nome_livro'),	
			'acer_edicao'	  => $this->input->post('edicao'),
			'acer_editora'	  => $this->input->post('editora'),
			'acer_autor'	  => $this->input->post('autor'),
			'acer_resumo'     => $this->input->post('resumo'),
			'acer_status'     => 1,
			'acer_ano'	      => $this->input->post('ano'),
			'categoria_cat_codigo' => $this->input->post('categorias')
		);


		$this->db->insert('acervo', $acervo);

		if($this->db->affected_rows() > 0)
		{		

	    	return true; 

		}

		return false;

	}
	
	public function acervo_list()
	{

		$this->db->where('acer_status', 1);
		$this->db->join('categoria', 'acervo.categoria_cat_codigo = categoria.cat_codigo', 'inner');
		$r = $this->db->get('acervo');

		return $r->result();

	}


	public function acervo_edit($acer_codigo)
	{

		$this->db->where('acer_codigo', $acer_codigo);
		$this->db->where('acer_status', 1);
		$this->db->join('categoria', 'acervo.categoria_cat_codigo = categoria.cat_codigo', 'inner');
		$r = $this->db->get('acervo');

		return $r->result();

	}

	public function acervo_update($acer_codigo)
	{

		$acervo = array(		   	
			'acer_nome_livro' => $this->input->post('nome_livro'),	
			'acer_edicao'	  => $this->input->post('edicao'),
			'acer_editora'	  => $this->input->post('editora'),
			'acer_autor'	  => $this->input->post('autor'),
			'acer_resumo'     => $this->input->post('resumo'),
			'acer_status'     => 1,
			'acer_ano'	      => $this->input->post('ano'),
			'categoria_cat_codigo' => $this->input->post('categorias')
		);

		$this->db->where('acer_codigo', $acer_codigo);
		$this->db->update('acervo', $acervo);

		if($this->db->affected_rows() > 0)
		{		

	    	return true; 

		}

		return false;

	}

	public function acervo_del($acer_codigo)
	{

		$acervo = array(
			'acer_codigo' => $acer_codigo
			);

		$this->db->delete('acervo', $acer_codigo); 

		if($this->db->affected_rows() > 0)
		{    
			return true; 		    
		}

		return false;

	}

	public function consulta_acervo()
	{

		$busca = $this->input->post('busca');

		$this->db->like('acer_codigo', $busca);
		$this->db->or_like('acer_nome_livro', $busca);
		$this->db->or_like('acer_editora', $busca);
		$this->db->or_like('acer_autor', $busca);
		$this->db->or_like('acer_resumo', $busca);

		$this->db->where('acer_status', 1);
		$this->db->join('categoria', 'acervo.categoria_cat_codigo = categoria.cat_codigo', 'inner');

		$r = $this->db->get('acervo');

		return $r->result();

	}

	public function verificar_reserva($acer_codigo)
	{

		$this->db->where('acervo_acer_codigo', $acer_codigo);

		$r = $this->db->get('acervo_has_codigo');

		return $r->result();

	}

	public function dataFormater($data){
		$a = explode("/", $data);
		return $a[2]."-".$a[1]."-".$a[0];
	}

	public function reservar()
	{

		$dt_reserva = $this->dataFormater($this->input->post('dt_reserva'));

		$dt_devolucao = $this->dataFormater($this->input->post('dt_devolucao'));

		$reserva = array(
			'res_dataregistro'  => date('Y-m-d'),
			'res_datareserva'   => $dt_reserva,
		    'res_datadevolucao' => $dt_devolucao,
			'res_status'        => 1,
			'pessoa_pes_codigo' => $this->input->post('requerente') 
			);

		
		
		$this->db->insert('reserva', $reserva);

		$id = $this->db->insert_id();

		if($this->db->affected_rows() > 0)
		{		

			$reserva_has_acervo = array(
				'reserva_res_codigo' => $id,
				'reserva_pes_codigo' => $this->input->post('requerente'),
				'acervo_acer_codigo' => $this->input->post('acer_codigo') 
				);

			$this->db->insert('reserva_has_acervo', $reserva_has_acervo);

			if($this->db->affected_rows() > 0){
		    	return true; 
			}

		}
		
		return false;

	}

	public function reservas()
	{

		$this->db->join('reserva_has_acervo', 'reserva_has_acervo.reserva_res_codigo = reserva.res_codigo', 'join');
		$this->db->join('acervo', 'reserva_has_acervo.acervo_acer_codigo = acervo.acer_codigo', 'join');
		$this->db->join('categoria', 'acervo.categoria_cat_codigo = categoria.cat_codigo', 'inner');
		$this->db->join('pessoa', 'reserva.pessoa_pes_codigo = pessoa.pes_codigo', 'inner');

		$r = $this->db->get('reserva');
		return $r->result();		

	}

	public function reserva_deletar($res_codigo)
	{

		$reserva = array(
			'acer_codigo' => $acer_codigo
			);

		$this->db->delete('acervo', $acer_codigo); 

		if($this->db->affected_rows() > 0)
		{    
			return true; 		    
		}

		return false;

	}

	public function acervo_nome($acer_codigo)
	{

		$this->db->select('acer_nome_livro');

		$this->db->where('acer_codigo', $acer_codigo);

		$r = $this->db->get('acervo');

		return $r->result();

	}

	public function emprestimo_res_confirmar()
	{

			
		$emp = array(
			'emp_dataemprestimo' => $this->dataFormater($this->input->post('dt_emprestimo')), 
			'emp_datadevolucao' => $this->dataFormater($this->input->post('dt_devolucao')),  
			'emp_status' => 1, 
			'pessoa_pes_codigo' => $this->input->post('requerente'), 
			'reserva_res_codigo' => $this->input->post('res_codigo'), 
			'reserva_pes_codigo' => $this->input->post('requerente')
		);

		$this->db->insert('emprestimo', $emp);

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}

	}

	public function reserva_dados($res_codigo)
	{
		$this->db->where('reserva_res_codigo', $res_codigo);

		$this->db->join('pessoa', 'pessoa.pes_codigo = reserva_has_acervo.reserva_pes_codigo', 'inner');

		$r = $this->db->get('reserva_has_acervo');

		return $r->result();

	}

	public function emprestimo_listar()
	{

		$this->db->where('emp_status', 1);

		$this->db->join('pessoa', 'pessoa.pes_codigo = emprestimo.pessoa_pes_codigo', 'inner');

		$this->db->join('reserva', 'reserva.res_codigo = emprestimo.reserva_res_codigo', 'inner');

		$r = $this->db->get('emprestimo');

		return $r->result();

	}

	public function devolver($emp_codigo)
	{

		$emp = array(
			'emp_status' => 0
			);

		$this->db->where('emp_codigo', $emp_codigo);

		$this->db->update('emprestimo', $emp);

		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else{
			return false;
		}

	}
}

/* End of file biblioteca.php */
/* Location: ./application/models/biblioteca.php */