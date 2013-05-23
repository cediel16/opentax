<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Estados_model
 *
 * @author johel
 */
class Municipios_model extends MY_Model {

    //put your code here

    function select_municipios($estado_id) {
        $r = array('' => '');
        $this->db->where('estado_fkey', $estado_id);
        $rst = $this->db->get('municipios');
        if ($rst->num_rows > 0) {
            foreach ($rst->result() as $row) {
                $r[$row->id] = $row->municipio;
            }
            return $r;
        }
        return NULL;
    }

}

?>
