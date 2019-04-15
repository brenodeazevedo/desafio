<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	//cadastra o usuário
	public function cadastraUsuario($data)
	{
		$this->db->insert('usuarios', $data);
	}
	//retorna todos os clientes não-admin
	public function getClientes()
	{

		$this->db->where('usuario_role', 0);
		$query = $this->db->get("usuarios");
		return $query->result();
	}


	//busca os clientes para paginação
	public function fetch_usuarios($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->where('usuario_role', 0);
		$this->db->order_by('usuario_id', 'desc');
		$query = $this->db->get("usuarios");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		} else {
			return false;
		}
	}
	//contador
	public function contador()
	{
		return $this->db->count_all("usuarios");
	}

	//exclui o cliente
	public function delete($id)
	{
		$this->db->where('usuario_id', $id);
		$this->db->delete('usuarios');
	}
	//edita o cliente
	public function edit($data, $id)
	{
		$this->db->update('usuarios', $data, array('usuario_id' => $id));
	}
	//busca um cliente especifico
	public function buscaUsuario($id)
	{
		if ($id) {
			$this->db->where('usuario_id', $id);
			$this->db->limit(1);
			$query = $this->db->get("usuarios");
			return $query->row();
		}
	}
}
