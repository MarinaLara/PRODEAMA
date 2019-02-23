<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function auntenticar($data)
    {
    	
    	$this->db->from('CAT_USUARIOS');
    	$this->db->where('usuario',$data['usuario']);
        $this->db->where('contraseña',$data['contraseña']);

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