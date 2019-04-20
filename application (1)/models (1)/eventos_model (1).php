<?php

class Eventos_model extends CI_Model {

	public $id_evento;
	public $imagem;

	public function __construct () {
		parent::__construct();
	}

	public function salvar() {
		$dados = array("imagem"=>$this->imagem);
		$this->db->insert('eventos', $dados);

	}

	public function recuperarEventos() {
	    $query = $this->db->get("eventos");
        return $query->result();
    }

    public function excluir($id_evento) {

		$this->db->where("id_evento", $id_evento);
		$this->db->delete("eventos");
	}

    public function update() {
		$this->db->set("imagem", $this->imagem);
		$this->db->where("id_evento", $this->id_evento);
		$this->db->update("eventos");
	}
}
