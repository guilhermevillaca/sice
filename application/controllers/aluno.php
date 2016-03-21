<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aluno extends CI_Controller {

	protected $data;

	public function __construct()
	{
		parent::__construct();

		$this->data['title'] = "::.SICE.::";

		$this->data['tipo'] = "aluno";

		$this->data['form_destino'] = 'aluno/cadastrar';

		$this->data['nome'] = array(
			'name'        => 'nome',
			'id'          => 'nome',
			'placeholder' => 'Nome'
			);		

		$this->data['cpf'] = array(
			'name'        => 'cpf',
			'id'          => 'cpf',
			'placeholder' => 'CPF',
			'size'        => '20'
			);		

		$this->data['rg'] = array(
			'name'        => 'rg',
			'id'          => 'rg',
			'placeholder' => 'RG'
			);	

		
		$this->data['sexo'] = array(
                  'm'  => 'M',
                  'f'  => 'F',
                );

		$this->data['cep'] = array(
			'name'        => 'cep',
			'id'          => 'cep',
			'placeholder' => 'CEP'
			);	

		$this->data['logradouro'] = array(
			'name'        => 'logradouro',
			'id'          => 'logradouro',
			'placeholder' => 'Logradouro'
			);	

		$this->data['numero'] = array(
			'name'        => 'numero',
			'id'          => 'numero',
			'placeholder' => 'Número'
			);	

		$this->data['complemento'] = array(
			'name'        => 'complemento',
			'id'          => 'complemento',
			'placeholder' => 'Complemento'
			);	

		$this->data['bairro'] = array(
			'name'        => 'bairro',
			'id'          => 'bairro',
			'placeholder' => 'Bairro'
			);	

		$this->data['cidade'] = array(
			'name'        => 'cidade',
			'id'          => 'cidade',
			'placeholder' => 'Cidade'
			);	

		$this->data['estado'] = array(
			'name'        => 'estado',
			'id'          => 'estado',
			'placeholder' => 'UF'
			);	

		$this->data['email'] = array(
			'name'        => 'email',
			'id'          => 'email',
			'placeholder' => 'E-mail'
			);	

		$this->data['fone'] = array(
			'name'        => 'fone',
			'id'          => 'fone',
			'placeholder' => 'Telefone'
			);	

		$this->data['nascimento'] = array(
			'name'        => 'nascimento',
			'id'          => 'nascimento',
			'placeholder' => 'Data de Nascimento'
			);	

		$this->data['usuario'] = array(
			'name'        => 'usuario',
			'id'          => 'usuario',
			'placeholder' => 'Usuário'
			);	

		$this->data['senha'] = array(
			'name'        => 'senha',
			'id'          => 'senha',
			'placeholder' => 'Senha'
			);
		$this->data['confirmaSenha'] = array(
			'name'        => 'confirmaSenha',
			'id'          => 'confirmaSenha',
			'placeholder' => 'Confirmar Senha'
			);

		$this->data['enviar'] = array(
			'value' => 'Enviar',
			'class' => 'button small right',
			'id'    => 'enviar'
			);	
		

		$this->load->model('alunomodel');
	}

	public function index()
	{
	
		if($this->loginmodel->logado()){

			$this->template->load('template', 'pessoa/aluno', $this->data);

		}else{

			redirect('user');

		}
		
	}

	public function novo()
	{	

		if($this->loginmodel->logado()){

			$this->template->load('template', 'pessoa/pessoa', $this->data);

		}else{

			redirect('user');
			
		}
		
		
	}

	public function listar()
	{

		if($this->loginmodel->logado()){

			$this->data['lista'] = $this->alunomodel->listar();

			$this->template->load('template', 'pessoa/listar', $this->data);

		}else{

			redirect('user');
			
		}
		

	}

	public function editar($pes_codigo)
	{

		if($this->loginmodel->logado()){
			
			$aluno = $this->alunomodel->busca_editar($pes_codigo);

			$this->data['form_aluno'] = 'aluno/confirmar_edit';

			$this->data['nome'] = array(
				'name'        => 'nome',
				'id'          => 'nome',
				'placeholder' => 'Nome',
				'value'       => $aluno[0]->pes_nome
				);		

			$this->data['cpf'] = array(
				'name'        => 'cpf',
				'id'          => 'cpf',
				'placeholder' => 'CPF',
				'size'        => '20',
				'value'       => $aluno[0]->pes_cpf
				);		

			$this->data['rg'] = array(
				'name'        => 'rg',
				'id'          => 'rg',
				'placeholder' => 'RG',
				'value'       => $aluno[0]->pes_rg
				);	

			
			$this->data['sexo'] = array(
	                  'm'  => 'M',
	                  'f'  => 'F',
	                );

			$this->data['cep'] = array(
				'name'        => 'cep',
				'id'          => 'cep',
				'placeholder' => 'CEP',
				'value'       => $aluno[0]->pes_cep
				);	

			$this->data['logradouro'] = array(
				'name'        => 'logradouro',
				'id'          => 'logradouro',
				'placeholder' => 'Logradouro',
				'value'       => $aluno[0]->pes_logradouro
				);	

			$this->data['numero'] = array(
				'name'        => 'numero',
				'id'          => 'numero',
				'placeholder' => 'Número',
				'value'       => $aluno[0]->pes_numero
				);	

			$this->data['complemento'] = array(
				'name'        => 'complemento',
				'id'          => 'complemento',
				'placeholder' => 'Complemento',
				'value'       => $aluno[0]->pes_complemento
				);	

			$this->data['bairro'] = array(
				'name'        => 'bairro',
				'id'          => 'bairro',
				'placeholder' => 'Bairro',
				'value'       => $aluno[0]->pes_bairro
				);	

			$this->data['cidade'] = array(
				'name'        => 'cidade',
				'id'          => 'cidade',
				'placeholder' => 'Cidade',
				'value'       => $aluno[0]->pes_cidade
				);	

			$this->data['estado'] = array(
				'name'        => 'estado',
				'id'          => 'estado',
				'placeholder' => 'Estado',
				'value'       => $aluno[0]->pes_estado
				);	

			$this->data['email'] = array(
				'name'        => 'email',
				'id'          => 'email',
				'placeholder' => 'E-mail',
				'value'       => $aluno[0]->pes_email
				);	

			$this->data['fone'] = array(
				'name'        => 'fone1',
				'id'          => 'fone1',
				'placeholder' => 'Telefone',
				'value'       => $aluno[0]->pes_fone
				);

			$this->data['nascimento'] = array(
				'name'        => 'nascimento',
				'id'          => 'nascimento',
				'placeholder' => 'Data de Nascimento',
				'value'       => date('d/m/Y', strtotime($aluno[0]->pes_data_nasc))
				);	

			$this->data['usuario'] = array(
				'name'        => 'usuario',
				'id'          => 'usuario',
				'placeholder' => 'Usuário',
				'value'       => $aluno[0]->pes_usuario
				);	

			$this->data['senha'] = array(
				'name'        => 'senha',
				'id'          => 'senha',
				'placeholder' => 'Senha'
				);

			$this->data['enviar'] = array(
				'value' => 'Enviar',
				'class' => 'button small right',
				'id'    => 'enviar'
				);	

			$this->data['hidden'] = array('pes_codigo' => $pes_codigo);

			$this->template->load('template', 'pessoa/edit', $this->data);

		}else{

			redirect('user');
			
		}


	}

	public function cadastrar()
	{

		if($this->loginmodel->logado()){

			if($this->alunomodel->cadastrar())
			{
				echo "<script>alert('Cadastrado com sucesso')</script>";
				$this->index();
			}			

		}else{

			redirect('user');
			
		}
	}

	public function confirmar_edit()
	{

		if($this->loginmodel->logado()){

			if($this->alunomodel->editar())
			{
				echo "<script>alert('Alterado com sucesso')</script>";
				$this->index();	
			}			

		}else{

			redirect('user');
			
		}

		
		
	}

	public function deletar($pes_codigo)
	{

		if($this->loginmodel->logado()){
			
			if($this->alunomodel->deletar($pes_codigo)){
				echo "<script>alert('Deletado com sucesso')</script>";
				$this->listar();	
			}else{
				echo "<script>alert('Aluno não pode ser excluido')</script>";
				$this->listar();	
			}

		}else{

			redirect('user');
			
		}
		
	}

}

/* End of file pessoa.php */
/* Location: ./application/controllers/pessoa.php */