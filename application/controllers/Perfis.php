<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfis extends CI_Controller {

	
	public function perfil()
	{
		$this->load->library('form_validation');


		$this->load->view('clientes/perfil');
	}

	public function alterarSenha()
	{

		$this->load->library('form_validation');
		$this->load->database();

		$this->form_validation->set_rules('senha-antiga', 'Senha antiga', 'required');
		$this->form_validation->set_rules('nova-senha1', 'Nova senha', 'required');
		$this->form_validation->set_rules('nova-senha2', 'Repetir senha', 'required');

		//Verificando se os dados foram enviados
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('clientes/perfil');
		}

		// Pegando os dados enviados do formulário
		$senha_antiga = $this->input->post('senha-antiga');
		$nova_senha1 = $this->input->post('nova-senha1');
		$nova_senha2 = $this->input->post('nova-senha2');

		//Pegando a senha do usuário logado
		$usuario = $this->session->userdata('usuario_logado')['data_user'][0];
		$senha_session = $usuario->senha;

		//Se os dados do formulário estiverem ok e a seguinte condição for satisfeira
		// a senha será altera
		if ($senha_session === $senha_antiga && $nova_senha1 === $nova_senha2 ) {
			$this->db->set('senha', $nova_senha1);
			$this->db->where('id', $usuario->id);
			$this->db->update('usuarios');
			

			//Atualizando os dados da sessão
			$usuario = $this->db->get_where('usuarios', array('email' => $usuario->email, 'senha' => $nova_senha1 ), 1)->result();
			$this->session->set_userdata('usuario_logado', array('data_user' => $usuario, 'admin' => $usuario[0]->admin));


			$this->session->set_flashdata('success', 'Senha Alterada com sucesso');
			redirect('clientes/perfil');
		}
		else {
			$this->session->set_flashdata('error', 'Dados Incorretos');

			redirect('clientes/perfil');
		}

		//$this->db->get_where('usuarios', array(), 1);

		
	}

}
