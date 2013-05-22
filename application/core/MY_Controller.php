<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $data;

    public function __construct() {
        parent::__construct();
        $this->data = Array(
            'title' => '',
            'content' => ''
        );
    }

}

// END MY_Controller class

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */