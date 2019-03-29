<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function formLogin()
	{
		$this->load->library('form_validation');

		$this->load->view('login/index');
	}

	public function session()
	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('senha', 'Senha', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('login/index');	
		}
		else {
			$email = $this->input->post('email');
			$senha = $this->input->post('senha');

			$this->load->database();

			$usuario = $this->db->get_where('usuarios', array('email' => $email, 'senha' => $senha ), 1)->result();

			if ($usuario) {
				$this->session->set_userdata('usuario_logado', array('data_user' => $usuario, 'admin' => $usuario[0]->admin));
				redirect('home');
			}
			else {
				$this->session->set_flashdata('error', 'Credênciais Incorretas');
				
				redirect(base_url('login'));
			}
		}

		


	}

	public function logout() {
		$this->session->sess_destroy('usuario_logado');
		redirect('login');
	}

}
