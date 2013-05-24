<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Estados_model
 *
 * @author johel
 */
class Contribuyentes_model extends MY_Model {

    //put your code here

    function buscar_por($data) {
        $qry = "select contribuyentes.*, '5' as patentes, '3' as RIC, '4' as inmuebles, '7' as vehiculos from contribuyentes";
        return $this->db->query($qry)->result();
    }

    function insert($data) {
        $d = array(
            'cirif' => $data['cirif'],
            'nombre' => $data['nombre'],
            'direccion' => $data['direccion'],
            'parroquia_fkey' => $data['parroquia'],
            'email' => $data['email'],
            'telefono1' => $data['telefono1'],
            'telefono2' => $data['telefono2']
        );
        return $this->db->insert('contribuyentes', $d);
    }

    function esta_cirif_disponible($cirif) {
        $this->db->where('cirif', $cirif);
        $rst = $this->db->get('contribuyentes');
        return $rst->num_rows() == 0;
    }

    function get_contribuyente($id) {
        $this->db->where('id', $id);
        $rst = $this->db->get('contribuyentes');
        if ($rst->num_rows() == 1) {
            $r=$rst->result();
            return $r[0];
        }
        return NULL;
    }

}

?>
