<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	public function index($page=0)
	{
		$this->load->library('pagination');
		$this->load->model('cliente');

		$clientes = $this->cliente->getAllPaginate(6, $page);
		
		$this->pagination->initialize([
			'total_rows' => $this->db->count_all('usuarios'),
			'per_page' => 6,
			'base_url' => base_url().'/clientes/index',
			'first_link' => 'primeiro',
			'last_link' => 'ultimo'
		]);


		$this->load->view('admin/clientes/index', [
			'clientes' => $clientes 
		]);
	}



	public function formCadastro()
	{
		$this->load->library('form_validation');
		 
		$this->load->view('admin/clientes/form_cadastro');
	}

	public function cadastro()
	{	

		$usuario_logado_eh_admin = $this->session->userdata('usuario_logado')['admin'];

		//Verifica se a rota de excluir um cliente está sendo acessada por um 
		//usuário que tem permissão
		if(!$usuario_logado_eh_admin){
			redirect('home');
		}

		$this->load->library('form_validation');
		$this->load->database();


		$this->form_validation->set_rules('nome', 'Nome', 'required|max_length[40]|min_length[5]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[6]|is_unique[usuarios.email]');
		$this->form_validation->set_rules('cpf', 'CPF', 'required|is_unique[usuarios.cpf]|min_length[11]|max_length[11]');
		$this->form_validation->set_rules('sexo', 'Sexo', 'required|min_length[1]');
		$this->form_validation->set_rules('senha', 'Senha', 'required|min_length[6]');

	


		if ($this->form_validation->run() === false) {

			$this->load->view('admin/clientes/form_cadastro');
		}
		else {
			$this->load->model('cliente');

			$insert = $this->cliente->insert($this->input->post());
	
			if ($insert) {
				$this->session->set_flashdata('success', 'Cliente cadastrado');
				redirect('admin/clientes');
			}
			else {
				$this->session->set_flashdata('error', 'Erro ao cadastradar Cliente');
				redirect('admin/clientes');
				
			}
		}

		

	}


	/**
	 * Método responsável por exibir a view de edição com os devidos dados do
	 * usuario a ser editado
	 */
	public function formUpdate($id)
	{
		$this->load->library('form_validation');
		$this->load->model('cliente');

		$cliente = $this->cliente->get($id);

		if ($cliente) {
			$this->load->view('admin/clientes/form_update', ['cliente' => $cliente]);
		}
		else {
			redirect('home');
		}
	
		
	}

	public function update($id)
	{
		
		$this->load->model('cliente');
		$updated = $this->cliente->update($this->input->post(), $id);



		if ($updated) {
			$this->session->set_flashdata('success', 'Cliente Atualizado');
			redirect('admin/clientes');
		}
		else {
			$this->session->set_flashdata('error', 'Não foi possível atualizar o cliente');
			redirect('admin/clientes');
		}


		// print_r($this->input->post());  
		// exit;
	}

	public function destroy($id)
	{
		$usuario_logado_eh_admin = $this->session->userdata('usuario_logado')['admin'];

		//Verifica se a rota de excluir um cliente está sendo acessada por um 
		//usuário que tem permissão
		if(!$usuario_logado_eh_admin){
			redirect('home');
		}


		$this->load->model('cliente');
		
		$deleted = $this->cliente->delete($id);

		if ($deleted) {
			$this->session->set_flashdata('success', 'Cliente deletado');
			redirect('admin/clientes');
		}
		else {
			$this->session->set_flashdata('error', 'Erro ao deletar Cliente');
			redirect('admin/clientes');

		}
		
	}
}
