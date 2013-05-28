<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class contribuyentes extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['script'] = script_tag('assets/js/contribuyentes.js');
        $this->load->model('Contribuyentes_model');
    }

    public function index() {
        $this->data['resultado'] = '';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('buscar_por', 'Buscar por', 'trim|required');
        $this->form_validation->set_rules('criterio', 'Criterio', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
            $rst = $this->Contribuyentes_model->buscar_por($this->input->post());
            $this->data['resultado'].= '<table class="table table-condensed">';
            $this->data['resultado'].= '<thead>';
            $this->data['resultado'].= '<tr>';
            $this->data['resultado'].= '<th class="span1" style="text-align:center;">CI / RIF</th>';
            $this->data['resultado'].= '<th style="text-align:center;">Nombre / Dirección</th>';
            $this->data['resultado'].= '<th class="span1" style="text-align:center;">Status</th>';
            $this->data['resultado'].= '</tr>';
            $this->data['resultado'].= '</thead>';
            $this->data['resultado'].= '<tbody>';

            if (count($rst) > 0) {
                foreach ($rst as $k => $v) {
                    $this->data['resultado'].= '<tr>';
                    $this->data['resultado'].= '<td style="text-align:center;">' . anchor('contribuyentes/ver/' . $v->id, '<h5>' . $v->cirif . '</h5>', 'title="Ver información del contribuyente"') . '</td>';
                    $this->data['resultado'].= '<td><div>' . $v->nombre . '</div><div>' . $v->direccion . '</div></td>';
                    $this->data['resultado'].= '<td style="text-align:center;">' . status($v->status) . '</td>';
                    $this->data['resultado'].= '</tr>';
                }
            }
            $this->data['resultado'].= '</tbody>';
            $this->data['resultado'] .= '</table>';
        }
        $btn = anchor('contribuyentes/registro', '<i class="icon-plus-sign" data-toggle="tooltip" title="Registrar contribuyente" id="registrar_contribuyente"></i>');
        $this->data['title'] = 'Contribuyentes ' . $btn;
        $this->template->load('basic', 'contribuyentes/main', $this->data);
    }

    public function registro() {
        $this->load->helper('common');
        $this->load->library('form_validation');
        $this->load->model('Estados_model');
        $this->load->model('Municipios_model');
        $this->load->model('Parroquias_model');

        $this->form_validation->set_error_delimiters('<div class="alert alert-block">', '</div>');
        $this->form_validation->set_message('required', 'Campo obligatorio');
        $this->form_validation->set_message('valid_email', 'Correo electrónico inválido');
        $this->form_validation->set_rules('cirif', 'CI / RIF', 'trim|required|callback__es_cirif|callback__esta_cirif_disponible');
        $this->form_validation->set_rules('nombre', 'Nombre / Razón Social', 'trim|required|callback__es_texto');
        $this->form_validation->set_rules('direccion', 'Dirección de Habitación / Domicilio Fiscal', 'trim|required|callback__es_texto');
        $this->form_validation->set_rules('estado', 'Estado', 'trim|required');
        $this->form_validation->set_rules('municipio', 'Municipio', 'trim|required');
        $this->form_validation->set_rules('parroquia', 'Parroquia', 'trim|required');
        $this->form_validation->set_rules('email', 'Correo electrónico', 'trim|required|valid_email');
        $this->form_validation->set_rules('telefono1', 'Teléfono de contacto', 'trim|required|numeric|exact_length[11]');
        $this->form_validation->set_rules('telefono2', 'Teléfono alternativo', 'trim|required|numeric|exact_length[11]');
        if ($this->form_validation->run() == TRUE) {
            if ($this->Contribuyentes_model->insert($this->input->post())) {
                log_message('info', 'El usuario ha registrado un nuevo contribuyente');
                $this->session->set_flashdata('msj', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button><strong class="text-success">¡Éxito!</strong> El nuevo contribuyente se ha registrado.</div>');
                redirect('contribuyentes/registro');
            } else {
                log_message('error', 'Error al intentar registrar un nuevo contribuyente.');
                $this->session->set_flashdata('msj', '<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">×</button><strong class="text-success">¡Error!</strong> El nuevo contribuyente no se ha podido registrar.</div>');
            }
        }

        $this->data['title'] = 'Nuevo contribuyente';

        $this->data['options_estados'] = $this->Estados_model->select_estados();
        $this->data['options_municipios'] = (is_array($this->Municipios_model->select_municipios($this->input->post('estado')))) ? $this->Municipios_model->select_municipios($this->input->post('estado')) : array();
        $this->data['options_parroquias'] = (is_array($this->Parroquias_model->select_parroquias($this->input->post('municipio')))) ? $this->Parroquias_model->select_parroquias($this->input->post('municipio')) : array();

        $this->template->load('basic', 'contribuyentes/registro', $this->data);
    }

    public function editar() {

        $this->data['contribuyente'] = $this->Contribuyentes_model->get_contribuyente($this->uri->segment(3));
        if ($this->data['contribuyente'] == '') {
            redirect();
        }

        $this->load->helper('common');
        $this->load->library('form_validation');
        $this->load->model('Estados_model');
        $this->load->model('Municipios_model');
        $this->load->model('Parroquias_model');

        $this->form_validation->set_error_delimiters('<div class="alert alert-block">', '</div>');
        $this->form_validation->set_message('required', 'Campo obligatorio');
        $this->form_validation->set_message('valid_email', 'Correo electrónico inválido');
        $this->form_validation->set_rules('cirif', 'CI / RIF', 'trim|required|callback__es_cirif|callback__esta_cirif_disponible');
        $this->form_validation->set_rules('nombre', 'Nombre / Razón Social', 'trim|required|callback__es_texto');
        $this->form_validation->set_rules('direccion', 'Dirección de Habitación / Domicilio Fiscal', 'trim|required|callback__es_texto');
        $this->form_validation->set_rules('estado', 'Estado', 'trim|required');
        $this->form_validation->set_rules('municipio', 'Municipio', 'trim|required');
        $this->form_validation->set_rules('parroquia', 'Parroquia', 'trim|required');
        $this->form_validation->set_rules('email', 'Correo electrónico', 'trim|required|valid_email');
        $this->form_validation->set_rules('telefono1', 'Teléfono de contacto', 'trim|required|numeric|exact_length[11]');
        $this->form_validation->set_rules('telefono2', 'Teléfono alternativo', 'trim|required|numeric|exact_length[11]');
        if ($this->form_validation->run() == TRUE) {
            if ($this->Contribuyentes_model->insert($this->input->post())) {
                log_message('info', 'El usuario ha registrado un nuevo contribuyente');
                $this->session->set_flashdata('msj', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button><strong class="text-success">¡Éxito!</strong> El nuevo contribuyente se ha registrado.</div>');
                redirect('contribuyentes/registro');
            } else {
                log_message('error', 'Error al intentar registrar un nuevo contribuyente.');
                $this->session->set_flashdata('msj', '<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">×</button><strong class="text-success">¡Error!</strong> El nuevo contribuyente no se ha podido registrar.</div>');
            }
        }

        $this->data['title'] = 'Modificación del contribuyente';

        $this->data['options_estados'] = $this->Estados_model->select_estados();
        $this->data['options_municipios'] = (is_array($this->Municipios_model->select_municipios($this->input->post('estado')))) ? $this->Municipios_model->select_municipios($this->input->post('estado')) : array();
        $this->data['options_parroquias'] = (is_array($this->Parroquias_model->select_parroquias($this->input->post('municipio')))) ? $this->Parroquias_model->select_parroquias($this->input->post('municipio')) : array();

        $this->template->load('basic', 'contribuyentes/editar', $this->data);
    }

    public function ver() {

        $this->data['contribuyente'] = $this->Contribuyentes_model->get_contribuyente($this->uri->segment(3));
        if ($this->data['contribuyente'] == '') {
            redirect();
        }

        $this->load->helper('common');
        $this->load->library('form_validation');
        $this->load->model('Estados_model');
        $this->load->model('Municipios_model');
        $this->load->model('Parroquias_model');


        $this->data['title'] = 'Datos del contribuyente';

        $this->data['options_estados'] = $this->Estados_model->select_estados();
        $this->data['options_municipios'] = $this->Municipios_model->select_municipios($this->data['contribuyente']->estado_id);
        $this->data['options_parroquias'] = $this->Parroquias_model->select_parroquias($this->data['contribuyente']->municipio_id);

        $this->template->load('basic', 'contribuyentes/ver', $this->data);
    }

    public function eliminar() {
        $this->data['contribuyente'] = $this->Contribuyentes_model->get_contribuyente($this->uri->segment(3));
        if ($this->data['contribuyente'] == '') {
            redirect();
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-block">', '</div>');
        $this->form_validation->set_message('required', 'Campo obligatorio');
        $this->form_validation->set_rules('contribuyente_id', '', 'trim|required|numeric');
        $this->form_validation->set_rules('observacion', '', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
            if ($this->Contribuyentes_model->delete($this->input->post())) {
                log_message('info', 'El contribuyente ha cambiado su status a eliminado');
                $this->session->set_flashdata('msj', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button><strong class="text-success">¡Éxito!</strong> El contribuyente ha sido eliminado.</div>');
            } else {
                log_message('error', 'Error al intentar cambiar el status del contribuyente a eliminado.');
                $this->session->set_flashdata('msj', '<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">×</button><strong class="text-success">¡Error!</strong> Imposible eliminar el contribuyente.</div>');
            }
            redirect('contribuyentes');
        }


        $this->load->helper('common');
        $this->load->library('form_validation');
        $this->load->model('Estados_model');
        $this->load->model('Municipios_model');
        $this->load->model('Parroquias_model');
        $this->data['title'] = 'Eliminar contribuyente';

        $this->data['options_estados'] = $this->Estados_model->select_estados();
        $this->data['options_municipios'] = $this->Municipios_model->select_municipios($this->data['contribuyente']->estado_id);
        $this->data['options_parroquias'] = $this->Parroquias_model->select_parroquias($this->data['contribuyente']->municipio_id);

        $this->template->load('basic', 'contribuyentes/eliminar', $this->data);
    }

    public function activar() {
        $this->data['contribuyente'] = $this->Contribuyentes_model->get_contribuyente($this->uri->segment(3));
        if ($this->data['contribuyente'] == '') {
            redirect();
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('contribuyente_id', '', 'trim|required|numeric');
        if ($this->form_validation->run() == TRUE) {
            if ($this->Contribuyentes_model->active($this->input->post())) {
                log_message('info', 'El contribuyente ha cambiado su status a activo');
                $this->session->set_flashdata('msj', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button><strong class="text-success">¡Éxito!</strong> El contribuyente ha sido activado.</div>');
            } else {
                log_message('error', 'Error al intentar cambiar el status del contribuyente a activo.');
                $this->session->set_flashdata('msj', '<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">×</button><strong class="text-success">¡Error!</strong> Imposible activar el contribuyente.</div>');
            }
            redirect('contribuyentes');
        }


        $this->load->helper('common');
        $this->load->library('form_validation');
        $this->load->model('Estados_model');
        $this->load->model('Municipios_model');
        $this->load->model('Parroquias_model');
        $this->data['title'] = 'Activar contribuyente';

        $this->data['options_estados'] = $this->Estados_model->select_estados();
        $this->data['options_municipios'] = $this->Municipios_model->select_municipios($this->data['contribuyente']->estado_id);
        $this->data['options_parroquias'] = $this->Parroquias_model->select_parroquias($this->data['contribuyente']->municipio_id);

        $this->template->load('basic', 'contribuyentes/activar', $this->data);
    }

    public function suspender() {
        $this->data['contribuyente'] = $this->Contribuyentes_model->get_contribuyente($this->uri->segment(3));
        if ($this->data['contribuyente'] == '') {
            redirect();
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('contribuyente_id', '', 'trim|required|numeric');
        if ($this->form_validation->run() == TRUE) {
            if ($this->Contribuyentes_model->suspend($this->input->post())) {
                log_message('info', 'El contribuyente ha cambiado su status a suspendido');
                $this->session->set_flashdata('msj', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button><strong class="text-success">¡Éxito!</strong> El contribuyente ha sido suspendido.</div>');
            } else {
                log_message('error', 'Error al intentar cambiar el status del contribuyente a suspendido.');
                $this->session->set_flashdata('msj', '<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">×</button><strong class="text-success">¡Error!</strong> Imposible suspender el contribuyente.</div>');
            }
            redirect('contribuyentes');
        }


        $this->load->helper('common');
        $this->load->library('form_validation');
        $this->load->model('Estados_model');
        $this->load->model('Municipios_model');
        $this->load->model('Parroquias_model');
        $this->data['title'] = 'Activar contribuyente';

        $this->data['options_estados'] = $this->Estados_model->select_estados();
        $this->data['options_municipios'] = $this->Municipios_model->select_municipios($this->data['contribuyente']->estado_id);
        $this->data['options_parroquias'] = $this->Parroquias_model->select_parroquias($this->data['contribuyente']->municipio_id);

        $this->template->load('basic', 'contribuyentes/suspender', $this->data);
    }

    public function ajax() {
        $post = $this->input->post();
        switch ($post['band']) {
            case 'select_estado': {
                    $this->load->model('Municipios_model');
                    echo json_encode($this->Municipios_model->select_municipios($post['estado_id']));
                    break;
                }
            case 'select_municipio': {
                    $this->load->model('Parroquias_model');
                    echo json_encode($this->Parroquias_model->select_parroquias($post['municipio_id']));
                    break;
                }
        }
    }

    function _es_cirif($arg) {
        $this->form_validation->set_message('_es_cirif', 'CI / RIF inválido');
        return es_cirif($arg);
    }

    function _esta_cirif_disponible($arg) {
        $this->form_validation->set_message('_esta_cirif_disponible', 'CI / RIF no está disponible.');
        return esta_cirif_disponible($arg);
    }

    function _es_texto($arg) {
        $this->form_validation->set_message('_es_texto', 'Exiten caracteres inválidos.');
        return es_texto($arg);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */