<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// ------------------------------------------------------------------------

/**
 * Link
 *
 * Generates link to a script file
 *
 * @access	public
 * @param	mixed	stylesheet hrefs or an array
 * @param	string	rel
 * @param	string	type
 * @param	string	title
 * @param	string	media
 * @param	boolean	should index_page be added to the css path
 * @return	string
 */
if (!function_exists('select_estados')) {

    function select_estados($id = 0) {
        $CI = & get_instance();
        $CI->load->model('Common_model');
        $CI->common_model->get_estados($id);
    }

}

if (!function_exists('es_cirif')) {

    function es_cirif($cirif) {
        $patron = '/^[J|V|G|E](\d{9})$/';
        return preg_match($patron, $cirif) === 1;
    }

}

if (!function_exists('esta_cirif_disponible')) {

    function esta_cirif_disponible($cirif) {
        $CI = & get_instance();
        $CI->load->model('Contribuyentes_model');
        return $CI->Contribuyentes_model->esta_cirif_disponible($cirif);
    }

}

if (!function_exists('es_texto')) {

    function es_texto($txt) {
        $patron = "/^[ 0123456789abcdefghijklmnñopqrstuvwxyzABCDEFGHIJLKMNÑOPQRSTUVWXYZ-_.,ÁÉÍÓÚ'áéíóú]+$/";
        return preg_match($patron, $txt) === 1;
    }

}

/* End of file common_helper.php */
/* Location: ./application/helpers/common_helper.php */