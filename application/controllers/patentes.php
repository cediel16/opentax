<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class patentes extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['script'] = script_tag('assets/js/contribuyentes.js');
    }

    public function registro() {
        $this->data['title'] = 'Registro de nueva patente';
        $this->load->tpl('single', 'patentes/registro', $this->data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */