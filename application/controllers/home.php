<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	protected $data;

	public function __construct()
	{
		parent::__construct();
		
		$this->data['title'] = "::.SICE.::";
	}

	public function index()
	{
		if($this->loginmodel->logado()){

			$this->template->load('template', 'home', $this->data);			

		}else{

			redirect('user');
			
		}
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */