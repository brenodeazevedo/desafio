<?php
class Arena extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model('usuarios_model');
	}

    public function index() {
        $this->load->view('login');
    }
	
	public function cadastrar() {

        if (! $this->session->has_userdata("usuario") ){
            redirect("arena");
        }
        $this->load->view('menu-admin');
		$this->load->view('cadastro');
	}

	public function admin() {

		if (! $this->session->has_userdata("usuario") ){
            redirect("arena");
        }

		$this->load->view('feed_admin');
	}

	public function clientes() {

		if (! $this->session->has_userdata("usuario") ){
            redirect("arena");
        }

        $dados['usuarios'] = $this->usuarios_model->recuperarUsers();
        $this->load->view('lista_clientes', $dados);
	}

	public function excluir($id_usuarios) {
        if (! $this->session->has_userdata("usuario") ){
            redirect("arena");
        }

        $dados['usuario'] = $this->usuarios_model->excluir($id_usuarios);
        redirect('arena/clientes');
    }

    public function busca() {

        if (! $this->session->has_userdata("usuario") ){
            redirect("arena");
        }
        $this->load->view('menu-admin');
    	$this->load->view('buscar_clientes');
    }

    public function consultar() {

		if (! $this->session->has_userdata("usuario")) {
            redirect("arena");
        }
        $busca = $_POST["busca"];
        $consulta = $this->usuarios_model->recuperarBusca($busca);

        if ($consulta == false) {
            $this->session->set_flashdata('mensagem', "O resultado da busca não foi encontrado");
            redirect('arena/busca');

        }
        else {
            $dados['busca'] = $this->usuarios_model->recuperarBusca($busca);
            $this->load->view('menu-admin', $dados);
            $this->load->view('resultado_busca', $dados);
        }
	}

	public function editar($id_usuarios) {

        if (! $this->session->has_userdata("usuario") ){
            redirect("arena");
        }

        $dados['usuario'] = $this->usuarios_model->recuperarInfo($id_usuarios);
        $this->load->view('menu-admin');
        $this->load->view('editar_cliente', $dados);
    }

    public function atualizar($id_usuarios) {

        if (! $this->session->has_userdata("usuario") ){
            redirect("arena");
        }

        $this->usuarios_model->id_usuarios = $id_usuarios;
        $this->usuarios_model->nome = $_POST['nome'];
        $this->usuarios_model->email = $_POST['email'];
        $this->usuarios_model->cpf = $_POST['cpf'];
        $this->usuarios_model->telefone = $_POST['telefone'];
        $this->usuarios_model->update();
        redirect('arena/clientes');
    }



}
?>