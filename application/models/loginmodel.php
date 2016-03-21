<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loginmodel extends CI_Model {

	public function login()
	{

		$usuario = $this->input->post('usuario');

		$senha = md5($this->input->post('senha'));

		$this->db->where('pes_usuario', $usuario);

		$this->db->where('pes_senha', $senha);

		$r = $this->db->get('pessoa');

		if ($r->num_rows == 1) { 

            return true;       
              
        }

	}

	# VERIFICA SE O USUÁRIO ESTÁ LOGADO
    public function logado() {

        $logado = $this->session->userdata('logado');

        if (!isset($logado) || $logado != true) {
            
            return false;
        
        }else{

        	return true;

        }

    }


}

