<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galerias extends CI_Controller {

	
	public function index($page=0)
	{
		if (!$this->session->userdata('usuario_logado')) {
			redirect('login');
		}		

		$this->load->model('cliente');

		$id_usuario_logado = $this->session->userdata('usuario_logado')['data_user'][0]->id;

		$eventos = $this->cliente->eventos($id_usuario_logado);
	
		$this->load->view('galerias/index', [
			'eventos' => $eventos,
			'id_usuario_logado' => $id_usuario_logado
		]);
	}

	// Chama o formulário para cadastrar um novo Cliente
	public function formCadastro()
	{
		$this->load->view('galerias/form_cadastro');
	}

	public function upload(){

		$id_usuario_logado = $this->session->userdata('usuario_logado')['data_user'][0]->id;

		$nome_evento = $this->input->post('evento');
		$descricao_evento = $this->input->post('descricao');

		$nome_img = date('Y-m-d');
		$nome_img .= ' - '.$id_usuario_logado;

		

		$img = $_FILES['imagem'];

		//Cria a o diretório do usuário que está tentando adicionar um ovo evento 
		if (!is_dir('./public/uploads/'.$id_usuario_logado)) {
			mkdir('./public/uploads/'.$id_usuario_logado);
		}

	
		$configuracao = array(
			'upload_path'   => './public/uploads/'.$id_usuario_logado,
			'allowed_types' => 'jpeg|jpg|png',
			'max_size'      => '1000',
			'max_width'     => '1024',
			'max_height'    => '780',
			'encrypt_name'  => TRUE,
		);   

		$this->load->library('upload');
		$this->upload->initialize($configuracao);
	
		if ($this->upload->do_upload('imagem')){
			$this->load->database();

			$this->db->insert('eventos', [
				'usuario_id' =>  $id_usuario_logado,
				'nome_evento' => $nome_evento,
				'descricao_evento' => $descricao_evento,
				'path_img' => $this->upload->data()['file_name']
			]);

			
			$this->session->set_flashdata('success', 'Evento Adicionado');
			redirect('galeria');
		}
		
		else{
			$erros = $this->upload->display_errors();
			$this->session->set_flashdata('error', $erros);
			redirect('galeria/form_cadastro');
		}
		
		}

	}
