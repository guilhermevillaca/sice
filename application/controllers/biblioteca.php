<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Biblioteca extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->data['title'] = "::.SICE.::";

		$this->load->model('bibliotecamodel');
	}

	public function index()
	{
		
	}




	/*Categoria*/
	public function categoria()
	{

		if($this->loginmodel->logado()){

			$this->template->load('template', 'biblioteca/categoria_home', $this->data);

		}else{

			redirect('user');

		}

	}

	public function categoria_listar()
	{

		if($this->loginmodel->logado()){

			$this->data['categorias'] = $this->bibliotecamodel->list_categorias();

			$this->template->load('template', 'biblioteca/categoria_list', $this->data);

		}else{

			redirect('user');

		}


	}

	public function categoria_novo()
	{

		if($this->loginmodel->logado()){

			$this->data['descricao'] = array(
				'placeholder' => 'Descrição',
				'id'          => 'descricao',
				'name'        => 'descricao'
				);

			$this->data['observacao'] = array(
				'placeholder' => 'Observação',
				'id'          => 'observacao',
				'name'        => 'observacao'
				);

			$this->data['enviar'] = array(
				'id' => 'enviar',
				'value' => 'Enviar',
				'class' => 'button small right'
				);

			$this->template->load('template', 'biblioteca/categoria_cad', $this->data);

		}else{

			redirect('user');

		}

		

	}


	public function categoria_cad(){

		if($this->loginmodel->logado()){

			if($this->bibliotecamodel->add_categoria())
			{
				echo "<script>alert('Cadastrado com sucesso')</script>";
				$this->categoria();
			}

		}else{

			redirect('user');

		}

	}


	public function categoria_editar($cat_codigo)
	{

		if($this->loginmodel->logado()){

			$c = $this->bibliotecamodel->list_categorias_edit($cat_codigo);

			$this->data['descricao'] = array(
				'value' => $c[0]->cat_descricao,
				'id'          => 'descricao',
				'name'        => 'descricao'
				);

			$this->data['observacao'] = array(
				'value' => $c[0]->cat_observacao,
				'id'          => 'observacao',
				'name'        => 'observacao'
				);

			$this->data['cat_codigo'] = array(
				'cat_codigo' => $c[0]->cat_codigo);

			$this->data['enviar'] = array(
				'id' => 'enviar',
				'value' => 'Enviar',
				'class' => 'button small right'
				);

			$this->template->load('template', 'biblioteca/categoria_edit', $this->data);

		}else{

			redirect('user');

		}

	}

	public function categoria_edit_confirm(){

		if($this->loginmodel->logado()){

			if($this->bibliotecamodel->edit_categoria($this->input->post('cat_codigo'))){

				echo "<script>alert('Alterado com sucesso')</script>";
				$this->categoria_listar();

			}

		}else{

			redirect('user');

		}

	}

	public function categoria_deletar($cat_codigo)
	{

		if($this->loginmodel->logado()){

			if($this->bibliotecamodel->del_categoria($cat_codigo)){

				echo "<script>alert('Deletado com sucesso')</script>";
				$this->categoria_listar();

			}else{
				echo "<script>alert('Erro. Essa categoria possui livros cadastrados')</script>";
				$this->categoria_listar();
			}

		}else{

			redirect('user');

		}

	}


	/*Acervo */

	public function acervo(){

		if($this->loginmodel->logado()){

			$this->template->load('template', 'biblioteca/acervo_home', $this->data);

		}else{

			redirect('user');

		}

	}

	public function acervo_listar()
	{

		if($this->loginmodel->logado()){

			$this->data['acervo'] = $this->bibliotecamodel->acervo_list();

			$this->template->load('template', 'biblioteca/acervo_list', $this->data);

		}else{

			redirect('user');

		}

	}

	public function acervo_novo()
	{


		if($this->loginmodel->logado()){

			$this->data['nome_livro'] = array(
				'placeholder' => 'Nome do Livro',
				'id'          => 'nome_livro',
				'name'        => 'nome_livro'
				);

			$this->data['edicao'] = array(
				'placeholder' => 'Edição',
				'id'          => 'edicao',
				'name'        => 'edicao'
				);

			$this->data['editora'] = array(
				'placeholder' => 'Editora',
				'id'          => 'editora',
				'name'        => 'editora'
				);

			$this->data['autor'] = array(
				'placeholder' => 'Autor',
				'id'          => 'autor',
				'name'        => 'autor'
				);

			$this->data['resumo'] = array(
				'placeholder' => 'Resumo',
				'id'          => 'resumo',
				'name'        => 'resumo'
				);

			$this->data['ano'] = array(
				'placeholder' => 'Ano',
				'id'          => 'ano',
				'name'        => 'ano'
				);
			
			$categorias = $this->bibliotecamodel->list_categorias();
			$cat = array();
			foreach ($categorias as $c) {
				$cat[$c->cat_codigo] = $c->cat_descricao;
			}

			$this->data['categorias'] = $cat;

			$this->data['enviar'] = array(
				'id' => 'enviar',
				'value' => 'Enviar',
				'class' => 'button small right'
				);

			$this->template->load('template', 'biblioteca/acervo_cad', $this->data);	

		}else{

			redirect('user');

		}

	}

	public function acervo_cad()
	{


		if($this->loginmodel->logado()){

			if($this->bibliotecamodel->acervo_cad())
			{
				echo "<script>alert('Cadastrado com sucesso')</script>";
				redirect('biblioteca/acervo-listar');
			}

		}else{

			redirect('user');

		}

	}

	public function acervo_deletar($acer_codigo)
	{


		if($this->loginmodel->logado()){

			if($this->bibliotecamodel->acervo_del($acer_codigo))
			{
				echo "<script>alert('Deletado com sucesso')</script>";
				redirect('biblioteca/acervo-listar');
			}

		}else{

			redirect('user');

		}

	}

	public function acervo_editar($acer_codigo)
	{

		if($this->loginmodel->logado()){

			$acer = $this->bibliotecamodel->acervo_edit($acer_codigo);

			$this->data['nome_livro'] = array(
				'value' => $acer[0]->acer_nome_livro,
				'id'          => 'nome_livro',
				'name'        => 'nome_livro'
				);

			$this->data['edicao'] = array(
				'value' => $acer[0]->acer_edicao,
				'id'          => 'edicao',
				'name'        => 'edicao'
				);

			$this->data['editora'] = array(
				'value' => $acer[0]->acer_editora,
				'id'          => 'editora',
				'name'        => 'editora'
				);

			$this->data['autor'] = array(
				'value' => $acer[0]->acer_autor,
				'id'          => 'autor',
				'name'        => 'autor'
				);

			$this->data['resumo'] = array(
				'value' => $acer[0]->acer_resumo,
				'id'          => 'resumo',
				'name'        => 'resumo'
				);

			$this->data['ano'] = array(
				'value' => $acer[0]->acer_ano,
				'id'          => 'ano',
				'name'        => 'ano'
				);

			$this->data['acer_codigo'] = array(
				'acer_codigo' => $acer[0]->acer_codigo);
			
			$categorias = $this->bibliotecamodel->list_categorias();
			$cat = array();
			foreach ($categorias as $c) {
				$cat[$c->cat_codigo] = $c->cat_descricao;
			}

			$this->data['cat_sel'] = $acer[0]->categoria_cat_codigo;

			$this->data['categorias'] = $cat;

			$this->data['enviar'] = array(
				'id' => 'enviar',
				'value' => 'Enviar',
				'class' => 'button small right'
				);


			$this->template->load('template', 'biblioteca/acervo_edit', $this->data);

		}else{

			redirect('user');

		}

	}

	public function acervo_edit_confirm()
	{

		if($this->loginmodel->logado()){

			if($this->bibliotecamodel->acervo_update($acer_codigo))
			{
				echo "<script>alert('Alterado com sucesso')</script>";
				redirect('biblioteca/acervo-listar');
			}

		}else{

			redirect('user');

		}
	}

	public function consulta()
	{

		if($this->loginmodel->logado()){

			$this->data['consulta'] = array(
				'placeholder' => 'Digite sua busca',
				'name' => 'busca',
				'id' => 'busca'
				);

			$this->data['enviar'] = array(
				'id' => 'enviar',
				'value' => 'Enviar',
				'class' => 'button small right'
				);

			$this->template->load('template', 'biblioteca/consulta', $this->data);

		}else{

			redirect('user');

		}

	}

	public function consulta_acervo()
	{

		if($this->loginmodel->logado()){

			$this->data['acervo'] = $this->bibliotecamodel->consulta_acervo();

			$this->template->load('template', 'biblioteca/consulta_resultado', $this->data);

		}else{

			redirect('user');

		}

	}

	public function consulta_reserva($acer_codigo)
	{

		if($this->loginmodel->logado()){

			$this->data['dt_reserva'] = array(
				'placeholder' => 'Data da Reserva',
				'name'        => 'dt_reserva',
				'id'          => 'dt_reserva'
				);

			$this->data['dt_devolucao'] = array(
				'placeholder' => 'Data da Devolução',
				'name'        => 'dt_devolucao',
				'id'          => 'dt_devolucao'
				);

			$this->data['requerente'] = array(
				'placeholder' => 'Requerente',
				'name'        => 'requerente',
				'id'          => 'requerente'
				);

			$this->data['enviar'] = array(
				'id' => 'enviar',
				'value' => 'Enviar',
				'class' => 'button small right'
				);

			$this->data['acer_codigo'] = array('acer_codigo' => $acer_codigo);

			$this->template->load('template', 'biblioteca/consulta_reserva', $this->data);

		}else{

			redirect('user');

		}

	}

	public function reservar()
	{

		if($this->loginmodel->logado()){

			if($this->bibliotecamodel->reservar()){
				echo "<script>alert('Reservado com sucesso')</script>";
			}
			redirect('biblioteca/consulta-acervo');

		}else{

			redirect('user');

		}
	}

	public function reservas()
	{

		if($this->loginmodel->logado()){

			$this->data['reservas'] = $this->bibliotecamodel->reservas();

			$this->template->load('template', 'biblioteca/reservas', $this->data);

		}else{

			redirect('user');

		}


	}

	public function emprestimo()
	{

		if($this->loginmodel->logado()){

			/*$this->data['buscar'] = array(
				'placeholder' => 'Código do Livro',
				'name'        => 'buscar',
				'id'          => 'buscar'
				);

			$this->data['enviar'] = array(
				'id' => 'enviar',
				'value' => 'Enviar',
				'class' => 'button small right'
				);

			$this->template->load('template', 'biblioteca/emprestimo', $this->data);*/

			$this->emprestimo_listar();

		}else{

			redirect('user');

		}

	}

	public function emprestimo_reserva($acer_codigo, $res_codigo)
	{


		if($this->loginmodel->logado()){
			
			$acer_nome = $this->bibliotecamodel->acervo_nome($acer_codigo);

			$reserva = $this->bibliotecamodel->reserva_dados($res_codigo);

			$this->data['acervo'] = array(
				'placeholder' => 'Cód Livro: ' .$acer_codigo,
				'name'        => 'acer_codigo',
				'id'          => 'acer_codigo',
				'readonly'    => 'readonly'
				);

			$this->data['acervo_nome'] = array(
				'placeholder' => $acer_nome[0]->acer_nome_livro,
				'name'        => 'acer_nome',
				'id'          => 'acer_nome',
				'readonly'    => 'readonly'
				);

			$this->data['dt_reserva'] = array(
				'placeholder' => 'Data Empréstimo',
				'name'        => 'dt_emprestimo',
				'id'          => 'dt_emprestimo'
				);

			$this->data['dt_devolucao'] = array(
				'placeholder' => 'Data da Devolução',
				'name'        => 'dt_devolucao',
				'id'          => 'dt_devolucao'
				);

			$this->data['requerente_nome'] = array(
				'placeholder' => 'Requerente: ' . $reserva[0]->pes_nome,
				'name'        => 'requerente',
				'id'          => 'requerente',
				'readonly'    => 'readonly'
				);

			$this->data['hidden'] = array(
				'requerente' => $reserva[0]->reserva_pes_codigo,
				'reserva'        => $reserva[0]->reserva_res_codigo				
				);			

			$this->data['enviar'] = array(
				'id' => 'enviar',
				'value' => 'Enviar',
				'class' => 'button small right'
				);

			$this->template->load('template', 'biblioteca/emprestimo_reserva', $this->data);

		}else{

			redirect('user');

		}

	}

		public function emprestimo_reserva_confirmar()
		{
			if($this->loginmodel->logado()){

				if($this->bibliotecamodel->emprestimo_res_confirmar()){
					$this->emprestimo_listar();
				}

			}else{

				redirect('user');

			}
		}

		

	public function emprestimo_listar()
	{

		if($this->loginmodel->logado()){

			$this->data['emprestimos'] = $this->bibliotecamodel->emprestimo_listar();

			$this->template->load('template', 'biblioteca/emprestimo_listar', $this->data);

		}else{

			redirect('user');

		}

	}

	public function devolucao($emp_codigo)
	{


		if($this->loginmodel->logado()){

			$this->bibliotecamodel->devolver($emp_codigo);

			redirect('biblioteca/emprestimo');

		}else{

			redirect('user');

		}


	}


	
}


/* End of file biblioteca.php */
/* Location: ./application/controllers/biblioteca.php */	