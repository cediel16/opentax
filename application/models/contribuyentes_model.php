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
        $qry = "select * from contribuyentes order by cirif";
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

    function delete($data) {
        $this->db->trans_begin();
        $this->db->insert('status_contribuyentes', array('contribuyente_fkey'=>$data['contribuyente_id'],'status' => 'eliminado', 'observacion' => $data['observacion'], 'timestamp' => time(), 'usuario_fkey' => 0));
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        }

        $this->db->where('id', $data['contribuyente_id']);
        $this->db->update('contribuyentes', array('status' => 'eliminado'));

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        }
        $this->db->trans_commit();
        return TRUE;
    }

    function active($data) {
        $this->db->trans_begin();
        $this->db->insert('status_contribuyentes', array('contribuyente_fkey'=>$data['contribuyente_id'],'status' => 'activo', 'observacion' => $data['observacion'], 'timestamp' => time(), 'usuario_fkey' => 0));
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        }

        $this->db->where('id', $data['contribuyente_id']);
        $this->db->update('contribuyentes', array('status' => 'activo'));

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        }
        $this->db->trans_commit();
        return TRUE;
    }

        function suspend($data) {
        $this->db->trans_begin();
        $this->db->insert('status_contribuyentes', array('contribuyente_fkey'=>$data['contribuyente_id'],'status' => 'suspendido', 'observacion' => $data['observacion'], 'timestamp' => time(), 'usuario_fkey' => 0));
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        }

        $this->db->where('id', $data['contribuyente_id']);
        $this->db->update('contribuyentes', array('status' => 'suspendido'));

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        }
        $this->db->trans_commit();
        return TRUE;
    }

    function esta_cirif_disponible($cirif) {
        $this->db->where('cirif', $cirif);
        $rst = $this->db->get('contribuyentes');
        return $rst->num_rows() == 0;
    }

    function get_contribuyente($id) {
        if (!is_numeric($id)) {
            return NULL;
        }
        $qry = "SELECT 
            a.*,
            b.id as parroquia_id,
            b.parroquia, 
            c.id as municipio_id,
            c.municipio, 
            d.id as estado_id,
            d.estado 
            FROM contribuyentes a 
            INNER JOIN parroquias b on b.id=a.parroquia_fkey 
            INNER JOIN municipios c on c.id=b.municipio_fkey 
            INNER JOIN estados d on d.id=c.estado_fkey 
            AND a.id = ?
            order by cirif";
        $rst = $this->db->query($qry, $id);
        if ($rst->num_rows() == 1) {
            $r = $rst->result();
            return $r[0];
        }
        return NULL;
    }

}

?>
