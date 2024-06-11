<?php
class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Get_data', '', true);
        $this->load->library('grocery_CRUD');
        $this->load->library('Grocery_CRUD_MultiSearch');
        if (isset($_SESSION['login']) &&isset($_SESSION['Type'])) {
            if ($_SESSION['login']!=true && $_SESSION['Type']!="Apple") {
                redirect('Main/index');
            }
        } else {
            redirect('Main/index');
        }
    }
    public function _example_output($output = null)
    {
        $this->load->view('example.php', (array)$output);
    }

    public function index()
    {
        $crud = new Grocery_CRUD_MultiSearch();
        // $crud->set_table('category');
        // $crud->set_subject('category');

        // $crud->required_fields('name', 'discription');

        // $output = $crud->render();


        $this->load->view('/include/header');
        $_SESSION['CustomTittle'] = "<h3>Orders<h3>";
        // $this->load->view('category');
        $this->load->view('/include/footer');
        // $this->_example_output($output);
    }
}