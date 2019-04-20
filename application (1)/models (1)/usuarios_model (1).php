<?php

class Usuarios_model extends CI_Model {

	public $id_usuarios;
	public $nome;
	public $email;
	public $senha;
	public $telefone;
	public $cpf;
	public $tipo;
	public $evento;

	public function __construct () {
		parent::__construct();
	}

	public function salvar() {
		$dados = array("nome"=>$this->nome, "email"=>$this->email, "senha"=>$this->senha, "telefone"=>$this->telefone, "cpf"=>$this->cpf, "tipo"=>$this->tipo);
		$this->db->insert('usuario', $dados);

	}

	public function recuperarUsers() {
		$this->db->where('tipo', '2');
        $query = $this->db->get("usuario");
        return $query->result();
    }

	public function recuperarDados($email, $senha) {
	    $this->db->where('email', $email);
	    $this->db->where('senha', $senha);
	    $query = $this->db->get('usuario');
	    return $query->row();
    }

    public function recuperarEmail($email) {
	    $this->db->where('email', $email);
	    $query = $this->db->get('usuario');
	    return $query->row();
   	}


	public function recuperarBusca($busca) {
		$this->db->where('tipo', '2');
    	$this->db->like('nome', $busca);
    	$this->db->or_like('cpf', $busca);
    	$query = $this->db->get('usuario');
        return $query->result();
    }

    public function recuperarInfo($id_usuarios) {
		$this->db->where("id_usuarios", $id_usuarios);
		$query = $this->db->get("usuario");
		return $query->row();
	}

    public function excluir($id_usuarios) {

		$this->db->where("id_usuarios", $id_usuarios);
		$this->db->delete("usuario");
	}

    public function update() {
		$this->db->set("nome", $this->nome);
		$this->db->set("email", $this->email);
		$this->db->set("cpf", $this->cpf);
		$this->db->set("telefone", $this->telefone);
		$this->db->where("id_usuarios", $this->id_usuarios);
		$this->db->update("usuario");
	}
}
