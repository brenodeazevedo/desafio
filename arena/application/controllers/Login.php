<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database('default');
		$this->load->helper('url');
		$this->load->model('Login_model');
	}

	public function admin()
	{
		$this->load->view('admin/admin_page');
	}

	public function cliente()
	{
		$this->load->view('cliente/cliente_page');
	}

	public function index()
	{
		$this->load->view('login_page');
	}


	public function auth()
	{
		$data = array(
			'usuario' => $this->input->post('usuario'),
			'senha' => md5($this->input->post('senha'))
		);

		//$usuario = new Usuario_model();
		$usuario = $this->Login_model->autenticaUsuario($data);
		if ($usuario) {
			$this->session->set_userdata('usuario_logado', $usuario);
			// $this->session->set_flashdata('success','Logado com sucesso');
			//redirect('/login/home', 'refresh');
			//$this->load->view('home_page');
			$this->verificaUsuario($usuario);
		} else {
			$this->session->set_flashdata('error', 'Usuário ou senha inválidos');
			$this->load->view('login_page');
		}
	}


	public function verificaUsuario($usuario)
	{
		if ($usuario['usuario_role'] == 1) {
			redirect(base_url('arena/admin/home'));
		} else {
			redirect(base_url('arena/cliente/home'));
		}
	}



	public function cadastro()
	{
		$this->load->view('cadastro_page');
	}
	public function sair()
	{
		$this->session->sess_destroy('usuario_logado');
		// redirect('/login/index','refresh');
		redirect();
	}
}
