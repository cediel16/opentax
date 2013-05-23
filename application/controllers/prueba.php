<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prueba extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->model('prueba_model');
        echo '<pre>';
        print_r($this);
        echo '</pre>';

        $this->prueba_model->get();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */