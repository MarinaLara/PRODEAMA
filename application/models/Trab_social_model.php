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