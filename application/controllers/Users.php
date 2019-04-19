<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Controller usado para fazer operações em geral, relacionadas ao usuário.
 */
class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('authorization');
        $this->load->library('session');
        $this->load->model('User_model');
    }
    /**
     * /users
     * Lista de usuários
     */
    public function index()
    {
        ensureIsAdmin();
        $page = $this->input->get('page') ?? 1;
        $pageSize = $this->input->get('pageSize') ?? 2;
        $totalUsers = $this->User_model->count();
        $numPages = ceil($totalUsers / $pageSize);
        $users = $this->User_model->getAll($page, $pageSize);
        $this->load->view('user/list', [
            'users' => $users,
            'actualPage' => $page,
            'pages' => range(1, $numPages)
        ]);
    }
    /**
     * /users/remove/:id
     * Remove um usuário por id
     */
    public function remove()
    {
        ensureIsAdmin();
        $id = $this->uri->segment(3);
        if (!$this->User_model->exists($id)) {
            show_404();
        }
        $result = $this->User_model->delete($id);
        $this->load->view('message', [
            'message' => $result ? 'Usuário deletado com sucesso' : 'Ocorreu um erro ao deletar o usuário',
            'type' => $result ? 'info' : 'danger'
        ]);
    }
    /**
     * /users/create/
     * Formulário para criação de usuários.
     */
    public function create()
    {
        ensureIsAdmin();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Senha', 'required|min_length[6]');
        $this->form_validation->set_rules('firstName', 'Nome', 'trim|required');
        $this->form_validation->set_rules('lastName', 'Sobrenome', 'trim|required');
        $this->form_validation->set_rules('birthdate', 'Data de nascimento', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('passwordconf', 'Confirme a senha', 'required|matches[password]');
        if ($this->form_validation->run() === false) {
            $this->load->view('user/create', [
                'data' => [
                    'firstName' => set_value('firstName'),
                    'lastName' => set_value('lastName'),
                    'birthdate' => set_value('birthdate'),
                    'password' => set_value('password'),
                    'email' => set_value('email')
                ]
            ]);
        } else {
            $result = $this->User_model->insert([
                'email' => $this->input->post('email'),
                'firstName' => $this->input->post('firstName'),
                'birthdate' => date_format(date_create($this->input->post('birthdate')), "Y/m/d"),
                'lastName' => $this->input->post('lastName'),
                'password' => $this->input->post('password')
            ]);
            $this->load->view('message', [
                'type' => $result ? 'info' : 'danger',
                'message' => $result ? 'Usuário criado com sucesso' : 'Ocorreu um erro ao criar o usuário. 
                Verifique os dados e tente novamente.'
            ]);
        }
    }
    /**
     * /users/edit/:id
     * Formulário para edição de usuários.
     */
    public function edit()
    {
        ensureIsAdmin();
        $id = $this->uri->segment(3);
        $user = $this->User_model->getOne($id);
        if (!$user) {
            show_404();
        }
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Senha', 'trim|min_length[6]');
        $this->form_validation->set_rules('firstName', 'Nome', 'trim|required');
        $this->form_validation->set_rules('birthdate', 'Data de nascimento', 'trim|required');
        $this->form_validation->set_rules('lastName', 'Sobrenome', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('passwordconf', 'Confirme a senha', 'matches[password]');
        if ($this->form_validation->run() === false) {
            $this->load->view('user/create', [
                'data' => json_decode(json_encode($user), true),
                'edit' => true,
                'idEditing' => $id
            ]);
        } else {
            $data = [
                'email' => $this->input->post('email'),
                'firstName' => $this->input->post('firstName'),
                'birthdate' => date_format(date_create($this->input->post('birthdate')), "Y/m/d"),
                'lastName' => $this->input->post('lastName')
            ];
            if (!empty($this->input->post('password'))) {
                $data['password'] = $this->input->post('password');
            }
            $result = $this->User_model->update($id, $data);
            $this->load->view('message', [
                'type' => $result ? 'info' : 'danger',
                'message' => $result ? 'Usuário editado com sucesso' : 'Ocorreu um erro ao editar o usuário. 
                Verifique os dados e tente novamente.'
            ]);
        }
    }
    /**
     * /users/login/
     * Formulário para logar os usuários.
     */
    public function login()
    {
        $result = $this->User_model->login($this->input->post('email'), $this->input->post('password'));
        if (!$result) {
            redirect('/?login_Error=1');
            return;
        }
        $roles = $this->User_model->getRoles($result);
        $this->session->set_userdata([
            'logged' => 1,
            'roles' => $roles
        ]);
        redirect('/users');
    }
    /**
     * /users/logout/
     * Desloga o usuário da sessão.
     */
    public function logout()
    {
        ensureIsLogged();
        $this->session->set_userdata([
            'logged' => 0,
            'roles' => []
        ]);
        redirect('/');
    }
}
