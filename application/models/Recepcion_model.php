<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recepcion_model extends CI_Model {
   
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



//---------------------------------------------------------------------
//---------------------------------------------------------------------
                //METODOS PARA RECEPCIÓN
//---------------------------------------------------------------------
//---------------------------------------------------------------------



//----------------------------------------------------------------------   
    //INSERTAR ADULTOS
//----------------------------------------------------------------------   

    public function set_adultos($data)
    {
        $this->db->insert('CAT_ADULTOS', $data);

    }
//----------------------------------------------------------------------   
    //INSERTAR FOLIOS
//----------------------------------------------------------------------   

    public function set_folios($data)
    {
        $this->db->insert('FOLIOS', $data);

    }

//--------------------------------------------------------------------
    // RECUPERAR EL ULTIMO ADULTO INGRESADO PARA INSERTAR EN LA TABLA DE FAMILIARES
//-------------------------------------------------------------------------
     public function recuperar_ultimo()
    {        
       
        $this->db->select('id_adulto');
        $this->db->from('CAT_ADULTOS');
        $this->db->order_by('id_adulto', 'DESC');
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

//----------------------------------------------------------------------   
    //INSERTAR FAMILIARES RECEPCION
//---------------------------------------------------------------------- 
    public function set_familiares($data)
    {
        $this->db->insert('CAT_REPRESENTANTES',$data);
    }

    public function get_archivos()
    {
        
        $this->db->from('archivos');
        $this->db->where('activo',1);
        
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



//---------------------------------------------------------------------
//---------------------------------------------------------------------
                //METODOS PARA CONSULTA ADULTOS
//---------------------------------------------------------------------
//---------------------------------------------------------------------



//----------------------------------------------------------------------   
    //VER ADULTOS REGISTRADOS
//----------------------------------------------------------------------      
    public function veradultos()
    {        
        $this->db->from('CAT_ADULTOS');
        $this->db->order_by('id_adulto', 'DESC');
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
    //VER FAMILIARES DEPENDIENDO DEL ID DEL ADULTO
//----------------------------------------------------------------------      
    public function verfamiliares()
    {        
        $query = $this->db->get('CAT_REPRESENTANTES');

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
    //RECUPERA DATOS DEL REPRESENTANTE PARA MODIFICAR
//----------------------------------------------------------------------  
    public function get_repre($id_representante)
    {
        $this->db->from('CAT_REPRESENTANTES');
        $this->db->where('id_representante', $id_representante);

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
    //VER CATEGORIAS REPRESENTANTES
//----------------------------------------------------------------------
    public function vercatrepres()
    {
        $query = $this->db->get('CATEGORIAS_REPRE');

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
    //VER FOLIOS POR ADULTO
//----------------------------------------------------------------------

    public function verfolios($id_adulto)
    {
        $this->db->select('id_folio, A_registro, Folio_adulto, id_adulto, Nombre_servicio, fecha_comienzo');
        $this->db->from('FOLIOS df');
        $this->db->join('CAT_TIPO_SERVICIO cts', 'df.id_tipo_servicio =cts.id_tipo_servicio');
        $this->db->where('id_adulto', $id_adulto);
        $this->db->order_by('df.id_adulto', 'DESC');

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
    //BUSQUEDA DE ADULTO
//----------------------------------------------------------------------
    public function buscar($Nombre_Adulto, $Edad)
    {
        $this->db->select('id_adulto,  Nombre_Adulto, Telefono, Direccion, Sexo, Edad');
        $this->db->from('CAT_ADULTOS');
        $this->db->like('Nombre_Adulto', $Nombre_Adulto);
        $this->db->like('Edad', $Edad);
        

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
    //OBTENER TODA LA INFORMACION PARA MODIFICAR UN TIPO
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


//----------------------------------------------------------------------   
    //OBTENER INFO REPRESENTANTES POR ADULTO
//----------------------------------------------------------------------
    public function get_fam($id_adulto)
    {
        $this->db->select('id_adulto, id_representante, Nombre_representante, Telefono_repre, Nombre_categoria');
        $this->db->from('CAT_REPRESENTANTES CR');
        $this->db->JOIN('CATEGORIAS_REPRE CAR', 'CR.id_categoria_repres = CAR.id_categoria_repres');
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

//-------------------------------------------------------------------------
    //FUNCIÓN PARA MODIFICAR UN REGISTRO DE USUARIO
//-------------------------------------------------------------------------

    public function update_repre($id_representante,$data)
    {
        $this->db->where('id_representante', $id_representante);
        $this->db->update('CAT_REPRESENTANTES',$data);
    }

    public function verdatosusuario ($id_usuario)
    {
        $this->db->where('id_usuario', $id_usuario);
        $this->db->from('CAT_USUARIOS');
        
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