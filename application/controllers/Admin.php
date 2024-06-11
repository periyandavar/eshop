<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
		parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Get_data', '', true);
        if (isset($_SESSION['login']) && isset($_SESSION['Type'])) {
            if ($_SESSION['login'] != true && $_SESSION['Type'] != "Apple") {
                redirect('Main/index');
            }
        } else {
            redirect('Main/index');
        }
    }
    public function index()
    {
        $this->load->view('/include/header');
        $this->load->view('dashboard');
        $this->load->view('/include/footer');
    }

    public function changePassword()
    {
        $this->load->view('/include/header');
        $this->load->view('pass');
        $this->load->view('/include/footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('login');
        $this->session->unset_userdata('mail');
        $this->session->unset_userdata('Type');
        redirect('Admin/index');
    }
}
