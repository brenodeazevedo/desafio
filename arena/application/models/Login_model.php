<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function autenticaUsuario($data)
	{

		$this->db->where('usuario', $data['usuario']);
		$this->db->where('senha', $data['senha']);
		$usuario = $this->db->get('usuarios')->row_array();

		return $usuario;
	}
}
