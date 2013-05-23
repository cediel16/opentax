<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends MY_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['title'] = 'asd';
        $this->data['content'] = 'template';
        $this->template->load('basic', 'main/inicio', $this->data);
    }

    public function login() {
        $this->load->view('main/login');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */