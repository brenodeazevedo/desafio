<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()	{
		$dados['titulo'] = 'Login de Clientes';
		$this->load->view('login', $dados);
	}

	public function cadastro()	{
		$this->load->helper('form');
		$dados['titulo'] = 'Cadastro de Clientes';
		$this->load->view('cadastro', $dados);
	}

	public function sobre()	{
		$dados['titulo'] = 'Sobre o Criador';
		$this->load->view('sobre', $dados);
	}

	public function logar()	{
		$dados['titulo'] = 'Seja bem vindo';
		$this->load->view('logar', $dados);
	}

}
