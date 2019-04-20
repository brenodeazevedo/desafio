<?php

class Eventos extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('eventos_model');
	}

    public function upload() {

        $nome = $_POST['img'];
        $imagem    = $_FILES['imagem'];
        $configuracao = array(
        'upload_path'   => 'assets/imagens',
        'allowed_types' => 'gif|jpg|jpeg|png',
        'file_name'     => $nome,
        'max_size'      => '500'
        ); 

        $this->load->library('upload');
        $this->upload->initialize($configuracao);
        if ($this->upload->do_upload('imagem')) {
            $data = array('upload_data' => $this->upload->data());    
        }

        $this->load->model('eventos_model');
        $this->eventos_model->imagem = $_POST['img'];
        $this->eventos_model->salvar();
        $this->session->set_flashdata('msg2', "upload realizado sucesso");
        redirect('arena/admin');
    }

    public function cadastrarEvento() {
        if (! $this->session->has_userdata("usuario") ){
            redirect("testando");
        }
            $this->load->view('menu-admin');
            $this->load->view('inserir_imagem');
        
    }

    public function noticias() {
        $dados['eventos'] = $this->eventos_model->recuperarEventos();
        $this->load->view('menu', $dados);
        $this->load->view('feed_cliente', $dados);

    }
	
}

?>