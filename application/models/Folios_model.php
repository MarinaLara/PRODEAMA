<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Folios_model extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

//----------------------------------------------------------------------   
    //VER FOLIOS POR ADULTO
//----------------------------------------------------------------------

    public function verfolios($id_folio)
    {

        $this->db->select('id_folio, df.A_registro, df.Folio_adulto, Nombre_Adulto, Nombre_servicio, fecha_comienzo, fecha_termino');
        $this->db->from('FOLIOS df');
        $this->db->join('CAT_TIPO_SERVICIO cts', 'df.id_tipo_servicio = cts.id_tipo_servicio');
        $this->db->join('CAT_ADULTOS ca', 'df.id_adulto = ca.id_adulto');
        $this->db->where('df.id_folio', $id_folio);

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

//----------------------------------------------------------------------   
    //RECUPERA EL ULTIMO FOLIO REGISTRADO ORDENADO POR AÑO-FOLIO
//----------------------------------------------------------------------
    public function get_folio()
    {
        $this->db->select('Folio_adulto');
        $this->db->from('FOLIOS');
        $this->db->order_by('A_registro,Folio_adulto', 'DESC');
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

//----------------------------------------------------------------------   
    //INSERTAR FOLIOS
//----------------------------------------------------------------------   

    public function set_folios($data)
    {
        $this->db->insert('FOLIOS', $data);

    }

//----------------------------------------------------------------------   
    //RECUPERA EL ULTIMO AÑO REGISTRADO
//---------------------------------------------------------------------- 
    public function get_a_max()
    {
        $this->db->select('A_registro');
        $this->db->from('FOLIOS');
        $this->db->order_by('A_registro', 'DESC');
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
    

//--------------------------------------------------------------------
    //OBTENER TODA LA INFORMACION DEL ADULTO
//--------------------------------------------------------------------

    public function get_adu($id_adulto)
    {
        $this->db->from('CAT_ADULTOS');
        $this->db->where('id_adulto', $id_adulto);


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


    public function get_folioese($id_folio)
    {
        $this->db->from('FOLIOS');
        $this->db->where('id_folio', $id_folio);


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

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        //EDITAR ADULTO
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------    

    public function update_adulto($id_adulto,$data)
    {
        $this->db->where('id_adulto', $id_adulto);
        $this->db->update('CAT_ADULTOS',$data);
    }
}

?>