<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Get_data', '', true);
        // $this->load->library('encrypt');
    }

    public function index()
    {
        $user_name = $this->input->post('email', null);
        if ($user_name == null) {
            $this->load->view('login');
            return;
        }
        $password = $this->input->post('pass');
        if ($this->Get_data->authenticate($user_name, $password)) {
            $_SESSION['login'] = true;
            $_SESSION['Type'] = "Apple";
            $_SESSION['mail'] = $user_name;
            redirect('Admin/index');
        }
        $data['msg'] = "Login Failed Invalid Mail Id or Password";
        $this->load->view('login', $data);
    }
}
