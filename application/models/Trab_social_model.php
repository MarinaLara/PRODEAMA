<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trab_social_model extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //----------------------------------------------------------------------   
    //VER FOLIOS POR ADULTO
//----------------------------------------------------------------------

    public function verturnos()
    {
        $this->db->select('turnos.turno, turnos.id_adulto, cat_adultos.Nombre_adulto, turnos.fecha_turno, turnos.id_tipo_usuario, turnos.Estado');
        $this->db->from('TURNOS');
        $this->db->join('cat_adultos', 'turnos.id_adulto = cat_adultos.id_adulto');
        $this->db->like('Estado', 0);
        $this->db->or_like('Estado', 2);
        $this->db->order_by('turnos.Estado','DESC');

        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query;
        }
        else
        {
            return FALSE;
        }
    }

    public function up_estado($data, $ID)
    {
        $this->db->where('id_turno',$ID);
        $this->db->update('turnos',$data);
    }

    public function get_IDT($idadulto)
    {
        $sql = 'SELECT id_turno
        FROM turnos 
        WHERE Estado != 1 AND id_adulto = '.$idadulto;
        $query = $this->db->query($sql);

        if($query->num_rows() > 0)
        {
            return $query;
        }
        else
        {
            return FALSE;
        }
    }

    public function insert_turnos($data)
    {
        $this->db->insert('turnos',$data);
    }

    public function get_turno()
    {
        $this->db->select('turno');
        $this->db->from('TURNOS');
        $this->db->order_by('id_turno', 'DESC');
        $this->db->LIMIT('1');

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query;
        }
        else
        {
            return FALSE;
        } 
    }

    public function get_fecha()
    {
        $this->db->select('fecha_turno');
        $this->db->from('TURNOS');
        $this->db->order_by('id_turno', 'DESC');
        $this->db->LIMIT('1');

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query;
        }
        else
        {
            return FALSE;
        } 
    }
}

?>