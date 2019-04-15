<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database('default');
		$this->load->helper('url');
		$this->load->model('Usuario_model');
		$this->load->library('pagination');
	}

	public function index($page = 1)
	{
		$config = array();
		$config["base_url"] = base_url() . "arena/lista";
		$config["total_rows"] = $this->Usuario_model->contador();
		$config["per_page"] = 3;
		$config["uri_segment"] = 3;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["result"] = $this->Usuario_model->fetch_usuarios($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		//sem paginação
		$data['data'] = $this->Usuario_model->getClientes();

		$this->load->view("admin/lista_clientes", $data);

	}
	public function cadastro()
	{
		$this->load->view('admin/cadastro_page');
		//redirect(base_url('arena/admin/clientes/cadastro'));
	}

	public function cadastrar()
	{
		if ($this->input->post('usuario_id') !== null) {
			$data = array(
				'nome' => $this->input->post('nome'),
				'usuario' => $this->input->post('usuario'),
				'senha' => md5($this->input->post('senha')),
				'cpf' => $this->input->post('usuario')
			);
			$usuario = new Usuario_model();
			$usuario->edit($data, $this->input->post('usuario_id'));
		} else {
			$data = array(
				'usuario_id' =>  null,
				'nome' => $this->input->post('nome'),
				'usuario' => $this->input->post('usuario'),
				'senha' => md5($this->input->post('senha')),
				'cpf' => $this->input->post('cpf')
			);
			$usuario = new Usuario_model();
			$usuario->cadastraUsuario($data);
		}
		// $usuario->edit($data, $this->input->post('usuario_id'));

		redirect(base_url('arena/admin/clientes/cadastro'));
	}

	public function excluir($id)
	{
		if ($id) {
			$this->Usuario_model->delete($id);
		}
		//redirect(base_url('arena/admin/clientes'));
		//$this->load->view('admin/cadastro_page');
	}


	public function editar($id)
	{
		$query = $this->Usuario_model->buscaUsuario($id);
		$data['usuario'] = $query;
		$this->load->view('admin/edit_page', $data);
	}
}
