<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sice extends CI_Controller {

	public $data;

	public function __construct()
	{
		parent::__construct();
		$this->data['title'] = "::.SICE.::";
	}

	public function index()
	{

		if($this->loginmodel->logado()){

			$this->template->load('template', 'sice/sobre', $this->data);

		}else{

			redirect('user');

		}

	}


	public function sobre()
	{
		if($this->loginmodel->logado()){

			$this->template->load('template', 'sice/sobre', $this->data);

		}else{

			redirect('user');

		}
	}

	public function configuracoes()
	{
		if($this->loginmodel->logado()){

			$this->template->load('template', 'sice/configuracoes', $this->data);

		}else{

			redirect('user');

		}
		
	}

}

/* End of file sice.php */
/* Location: ./application/controllers/sice.php */