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
        $this->db->from('TURNOS');
        


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