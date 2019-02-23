<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {
   
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
//----------------------------------------------------------------------   
//----------------------------------------------------------------------   
                //USUARIOS
//----------------------------------------------------------------------   
//----------------------------------------------------------------------  

//----------------------------------------------------------------------   
    //VER USUARIOS
//----------------------------------------------------------------------      
    public function verdatos()
    {        
        $this->db->select('id_usuario, usuario, nombre, contraseña, tipo_usuario');
        $this->db->from('CAT_USUARIOS cu');
        $this->db->join('CAT_TIPOS_USUARIOS ctu', 'ctu.id_tipo_usuario = cu.nivel_usuario');

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
    //INSERTAR USUARIOS
//----------------------------------------------------------------------   

    public function set_usuarios($data)
    {
        $this->db->insert('CAT_USUARIOS', $data);
    }

//----------------------------------------------------------------------
    //ELIMINAR USUARIO
//----------------------------------------------------------------------

    public function eliminar($id_usuario)
    {
        $this->db->where('id_usuario', $id_usuario);
        $this->db->delete('CAT_USUARIOS');
    }

//--------------------------------------------------------------------
    //OBTENER TODA LA INFORMACION PARA MODIFICAR UN USUARIO
//--------------------------------------------------------------------

    public function get_usuario($id_usuario)
    {
        $this->db->from('CAT_USUARIOS');
        $this->db->where('id_usuario', $id_usuario);


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

    public function update_usuario($id_usuario,$data)
    {
        $this->db->where('id_usuario', $id_usuario);
        $this->db->update('CAT_USUARIOS',$data);
    }

//--------------------------------------------------------------------
    //OBTENER TODA LA INFORMACION PARA MODIFICAR UN NIVEL DE USUARIO
//--------------------------------------------------------------------

    public function vertipos()
    {
        $query = $this->db->get('CAT_TIPOS_USUARIOS');

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
//----------------------------------------------------------------------   
            //TIPOS DE USUARIOS
//----------------------------------------------------------------------   
//----------------------------------------------------------------------

//----------------------------------------------------------------------   
    //VER TIPOS DE USUARIOS
//----------------------------------------------------------------------    
    public function verdatostipos()
    {        
        $query = $this->db->get('CAT_TIPOS_USUARIOS');

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
        $this->db->insert('CAT_TIPOS_USUARIOS', $data);
    }

//----------------------------------------------------------------------
    //ELIMINAR TIPO DE USUARIO
//----------------------------------------------------------------------

    public function eliminar_tipo($id_tipo_usuario)
    {        
        $this->db->where('id_tipo_usuario', $id_tipo_usuario);
        $this->db->delete('CAT_TIPOS_USUARIOS');
    }


//--------------------------------------------------------------------
    //OBTENER TODA LA INFORMACION PARA MODIFICAR UN TIPO
//--------------------------------------------------------------------

    public function get_tipo($id_tipo_usuario)
    {
        $this->db->from('CAT_TIPOS_USUARIOS');
        $this->db->where('id_tipo_usuario', $id_tipo_usuario);


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
    //FUNCION PARA MODIFICAR UN REGISTRO DE TIPO
//-------------------------------------------------------------------------

    public function update_tipo($id_tipo_usuario,$data)
    {
        $this->db->where('id_tipo_usuario', $id_tipo_usuario);
        $this->db->update('CAT_TIPOS_USUARIOS',$data);
    }
    


}

?>