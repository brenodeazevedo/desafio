<?php


class Cliente extends CI_Model
{

	private $table = 'usuarios';

	public function  __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Acessa um único usuário do banco
	 */
	public function get($id)
	{
		$cliente = $this->db->get_where($this->table, ['id'=> $id]);
		return $cliente->custom_row_object(0, 'Cliente');
	}

	/**
	 * Pega todos os usuário do banco, com paginação
	 * - $per_page: Quantos clientes serão buscados por página
	 * - $page: Página atual
	 */
	public function getAllPaginate($per_page, $page)
    {
        return $this->db->get($this->table, $per_page, $page)->result();
    }


	public function delete($id)
	{
		return $this->db->delete($this->table, ['id'=> $id]);
	}

	public function insert(array $data)
	{
		return $this->db->insert($this->table, $data);
	}


	public function update(array $data, $id)
	{
		return $this->db->update($this->table, $data, ['id'=> $id]);
	}


	public function eventos($id_usuario) {

		// $this->db->select('*');
		// $this->db->from('eventos');
		// $this->db->join('usuarios', "$id_usuario = eventos.usuario_id");
		// $eventos = $this->db->get();
		// return $eventos->result();

		$eventos = $this->db->query("SELECT DISTINCT eventos.id, eventos.nome_evento, eventos.path_img FROM eventos INNER JOIN usuarios ON $id_usuario = eventos.usuario_id");
        return $eventos->result();
	}
	
}
