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

    function select_estados($id=0) {
        $CI = & get_instance();
        $CI->load->model('Common_model');
        $CI->common_model->get_estados($id);
    }

}


/* End of file common_helper.php */
/* Location: ./application/helpers/common_helper.php */