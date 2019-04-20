<?php

class Usuario extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('usuarios_model');
	}
	
	public function cadastrar() {

		$email = $_POST['email'];
        $user = $this->usuarios_model->recuperarEmail($email);
        if (! $user) {
        	$this->usuarios_model->nome = $_POST['nome'];
			$this->usuarios_model->email = $_POST['email'];
			$this->usuarios_model->senha = $_POST['senha'];
			$this->usuarios_model->telefone = $_POST['telefone'];
			$this->usuarios_model->cpf = $_POST['cpf'];
			$this->usuarios_model->tipo = $_POST['tipo'];
			$this->usuarios_model->salvar();
			$this->session->set_flashdata('msg', "Cadastro realizado com sucesso");
			redirect('arena/admin');
        }

        else {
        	$this->session->set_flashdata('mensagem2', "O login informado já existe, tente novamente!");
            redirect('arena/cadastrar');
        }
	}

	public function autenticar() {

		$email = $_POST["email"];
        $senha = $_POST["senha"];
        
        $usuario = $this->usuarios_model->recuperarDados($email, $senha);


        if ($usuario){
            $this->session->set_userdata("usuario", $usuario);
            $user = $this->session->userdata("usuario");
            if ($user->tipo == 1) {
            	redirect("arena/admin");
            }

            else {
            	redirect("eventos/noticias");	
            }
        }

        else {
            $this->session->set_flashdata('mensagem', "Dados inválidos!");
            redirect('arena');
        }
    }

    public function logoff(){

    	if (! $this->session->has_userdata("usuario") ){
            redirect("usuario");
        }
        $this->session->unset_userdata('usuario');
        redirect('arena');
    }
}

?>