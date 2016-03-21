<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public $data;

	public function __construct()
	{
		parent::__construct();
		$this->data['title'] = "::.SICE.::";

		$this->data['usuario'] = array(
			'placeholder' => 'Usuário',
			'name'        => 'usuario',
			'id'          => 'usuario'
			);

		$this->data['senha'] = array(
			'placeholder' => 'Senha',
			'name'        => 'senha',
			'id'          => 'senha'
			);

		$this->data['enviar'] = array(
			'value' => 'Enviar',
			'class' => 'button small right',
			'id'    => 'enviar'
			);	
	}


	public function index()
	{
		
		$this->template->load('template_login', 'user/login', $this->data);

	}

	public function login()
	{
		
		$this->load->library('form_validation');
        $this->form_validation->set_rules('usuario', 'Usuário', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->template->load('template_login', 'user/login', $this->data);

        }else{
        	
        	$r = $this->loginmodel->login();

        	if ($r) { 
                $data = array(
                    'usuario' => $this->input->post('usuario'),
                    'logado' => true
                );
                $this->session->set_userdata($data);
                redirect('home');
            } else {
                redirect($this->index());
            }


        }


	}

	public function logout()
	{

		$this->session->unset_userdata('usuario');
		$this->session->unset_userdata('logado');
		$this->session->sess_destroy();

		redirect('user');

	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */