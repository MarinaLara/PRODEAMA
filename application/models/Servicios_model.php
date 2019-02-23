<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios_model extends CI_Model {
   
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    



//----------------------------------------------------------------------   
    //VER TIPOS DE SERVICIOS
//----------------------------------------------------------------------      
    public function vertiposservicios()
    {        
        $query = $this->db->get('CAT_TIPO_SERVICIO');

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
    //INSERTAR TIPOS
//----------------------------------------------------------------------   

    public function set_tipos($data)
    {
        $this->db->insert('CAT_TIPO_SERVICIO', $data);
    }

//----------------------------------------------------------------------
    //ELIMINAR TIPOS
//----------------------------------------------------------------------

    public function eliminar_tiposervicio($id_tipo_servicio)
    {
        $this->db->where('id_tipo_servicio', $id_tipo_servicio);
        $this->db->delete('CAT_TIPO_SERVICIO');
    }

//--------------------------------------------------------------------
    //OBTENER TODA LA INFORMACION PARA MODIFICAR UN TIPO
//--------------------------------------------------------------------

    public function get_tipo($id_tipo_servicio)
    {
        $this->db->from('CAT_TIPO_SERVICIO');
        $this->db->where('id_tipo_servicio', $id_tipo_servicio);


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

//-------------------------------------------------------------------------
    //FUNCIÓN PARA MODIFICAR UN REGISTRO DE USUARIO
//-------------------------------------------------------------------------

    public function update_tipo($id_tipo_servicio,$data)
    {
        $this->db->where('id_tipo_servicio', $id_tipo_servicio);
        $this->db->update('CAT_TIPO_SERVICIO',$data);
    }

}
?>