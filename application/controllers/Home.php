<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('authorization');
		$this->load->library('session');
		$this->load->view('base/header');
	}

	public function index()
	{
		if (isLogged()) {
			redirect('/users');
			return;
		}
		$login_Error = $this->input->get('login_Error');
		$this->load->view('home', ['login_Error' => $login_Error]);
		$this->load->view('base/footer');
	}
}
