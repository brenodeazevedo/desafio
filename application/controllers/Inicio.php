<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()	{
		$dados['titulo'] = 'Login de Clientes';
		$this->load->view('index', $dados);
	}

	public function cadastro()	{
		$dados['titulo'] = 'Cadastro de Clientes';
		$this->load->view('cadastro');
	}
}
