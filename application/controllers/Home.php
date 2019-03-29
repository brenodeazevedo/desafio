<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$this->load->database();
		$this->db->order_by('id', 'DESC');
		$eventos = $this->db->get('eventos', 6)->result();
		

		$this->load->view('home', ['eventos' => $eventos]);
	}

	// public function migration()
	// {
	// 	$this->load->library('migration');

	// 	if ($this->migration->current() === TRUE) {
	// 		echo 'Rodou';
	// 	}
	// 	else {
	// 		show_error($this->migration->error_string());
	// 	}
	// }
}
