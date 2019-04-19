<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('authorization');
        $this->load->library('session');
        $this->load->view('base/header');
        $this->load->model('User_model');
    }

    public function index()
    {
        ensureIsAdmin();
        $page = $this->input->get('page');
        $pageSize = $this->input->get('pageSize');
        $users = $this->User_model->getAll($page, $pageSize);
        $this->load->view('base/menuAdmin');
        $this->load->view('user/list', ['users' => $users]);
        $this->load->view('base/footer');
    }

    public function create()
    {
        ensureIsAdmin();
        $this->load->view('base/menuAdmin');
        $this->load->view('user/create');
        $this->load->view('base/footer');
    }

    public function createConfirm() {
        ensureIsAdmin();
        
    }

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
