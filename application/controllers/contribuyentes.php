<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class contribuyentes extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['script'] = script_tag('assets/js/contribuyentes.js');
    }

    public function index() {
        $btn = anchor('contribuyentes/registro', '<i class="icon-plus-sign" data-toggle="tooltip" title="Registrar contribuyente" id="registrar_contribuyente"></i>');
        $this->data['title'] = 'Contribuyentes ' . $btn;
        $this->load->tpl('single', 'contribuyentes/main', $this->data);
    }

    public function registro() {
        $this->data['title'] = 'Registro de nuevo contribuyente';
        $this->template->load('basic', 'contribuyentes/registro', $this->data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */