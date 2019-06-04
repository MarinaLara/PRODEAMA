<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivos extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Archivos_model');
	} 

	public function index()
	{
		
		
	}

	public function add_archivo()
	{
		if($this->session->userdata('logueado') == TRUE)
		{
			$this->load->view('headers/librerias');
			$this->load->view('headers/menu');
			$this->load->view('archivos/add_archivos');
			$this->load->view('footers/librerias');
		}else
		{
			$script = '';
			$this->load->view('inicio/login',$script);
		}
		
	}

	public function crear_archivo()
	{
		$id_usuario = $this->session->userdata('id_usuario');

		//OBTENERE EL ID DE ARCHIVO 
		$nombre_archivo = $this->input->post('nombre_archivo');
		$data = array(
			'nombre_archivo' => $nombre_archivo,
			'id_usuario' => $id_usuario,
			'id_adulto' => $id_adulto,
			'fecha' =>  $this->input->post('fecha_subida', TRUE),
			'id_adulto' => $this->input->post('id_adulto', TRUE),
			'id_tipo_servicio' => $this->input->post('select_tipo_servicio', TRUE),
			'activo' => 1,	
		);
		$this->Archivos_model->insert_archivos($data);	
		$DATA_ID = $this->Archivos_model->get_last_id();
		if($DATA_ID != FALSE)
		{
			foreach ($DATA_ID->result() as $row) 
			{
				$id_archivo = $row->id_archivo;
			}
		}



		$config['upload_path'] = './files/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 2000;
        //$config['max_width'] = 1500;
        //$config['max_height'] = 1500;
        $config['file_name'] = $id_archivo;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('archivo')) {
            $path = '/files/'.$this->upload->data('file_name');
            $data = array(
            	'path'=> $path,
            );
            var_dump($data);
            $this->Archivos_model->update_path($id_archivo,$data);
            
        } 
        else 
        {
            echo  $this->upload->display_errors();
        }
        redirect(base_url());
	}
}
