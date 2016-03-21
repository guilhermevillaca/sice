<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['title'] = "::.SICE.::";

		$this->load->model('perfilmodel');

		

	}

	public function index()
	{
		if($this->loginmodel->logado()){
		
			$this->template->load('template', 'perfil/perfil', $this->data);

		}else{

			redirect('user');

		}

	}

	public function novo()
	{

		if($this->loginmodel->logado()){

			$this->data['form_perfil'] = 'perfil/cadastrar';

			$this->data['descricao'] = array(
				'placeholder' => 'Descrição',
				'name'        => 'descricao',
				'id'          => 'descricao',
				'class'       => ''
				);

			$this->data['enviar'] = array(
				'value' => 'Enviar',
				'class' => 'button small right',
				'id'    => 'enviar'
				);	

			$this->template->load('template', 'perfil/novo', $this->data);

		}else{

			redirect('user');

		}
	}

	public function cadastrar()
	{

		if($this->loginmodel->logado()){

			if($this->perfilmodel->novo()){
				echo "<script>alert('Cadastrado com sucesso')</script>";
				#redirect('perfil');
				$this->index();
			}

		}else{

			redirect('user');

		}

	}

	public function listar()
	{

		if($this->loginmodel->logado()){

			$this->data['perfis'] = $this->perfilmodel->listar();

			$this->template->load('template', 'perfil/listar', $this->data);

		}else{

			redirect('user');

		}
	}

	public function editar($perfil_codigo)
	{

		if($this->loginmodel->logado()){

			$perfil = $this->perfilmodel->busca_editar($perfil_codigo);

			$this->data['form_perfil'] = 'perfil/confirmar_edit';

			$this->data['hidden'] = array('perfil_codigo' => $perfil_codigo);

			$this->data['descricao'] = array(			
				'name'        => 'descricao',
				'id'          => 'descricao',
				'class'       => '',
				'value'       => $perfil[0]->perfil_nome
				);

			$this->data['enviar'] = array(
				'value' => 'Editar',
				'class' => 'button small right',
				'id'    => 'enviar'
				);	

			$this->template->load('template', 'perfil/editar', $this->data);

		}else{

			redirect('user');

		}
	}

	public function confirmar_edit()
	{

		if($this->loginmodel->logado()){

			if ($this->perfilmodel->editar($this->input->post('perfil_codigo'))) {
				echo "<script>alert('Editado com sucesso')</script>";
				#redirect('perfil');
				$this->index();
			}

		}else{

			redirect('user');

		}
	}

	public function deletar($perfil_codigo)
	{

		if($this->loginmodel->logado()){
			
			if($this->perfilmodel->deletar($perfil_codigo))
			{
				echo "<script>alert('Deletado com sucesso')</script>";
				$this->index();
			}

		}else{

			redirect('user');

		}
	}



}

/* End of file perfil.php */
/* Location: ./application/controllers/perfil.php */