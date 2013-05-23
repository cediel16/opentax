<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Estados_model
 *
 * @author johel
 */
class Estados_model extends MY_Model {

    //put your code here

    function select_estados() {
        $r = array(''=>'');
        $rst = $this->db->get('estados');
        if ($rst->num_rows > 0) {
            foreach ($rst->result() as $row) {
                $r[$row->id] = $row->estado;
            }
            return $r;
        }
        return NULL;
    }

}

?>
