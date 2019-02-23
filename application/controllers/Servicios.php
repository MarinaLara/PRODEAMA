<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Servicios_model');
		
	}

	//PRIMERA COSA QUE SE EJECUTA
	public function index()
	{
		if($this->session->userdata('logueado') == TRUE)
		{
			$data = array(			 	
			 	'tipos_servicios' =>$this->Servicios_model->vertiposservicios(),
			 );
			$this->load->view('headers/header');
			$this->load->view('headers/navbar');
			$this->load->view('headers/logos_head1');			
			$this->load->view('servicios/servicios', $data);			
			$this->load->view('footers/footer');
			$this->load->view('footers/logos_foot1');
		}
		else
		{
			redirect(base_url());
		}
	}

//---------------------------------------------------------------------
			//FUNCIÓN PARA AGREGAR TIPOS
//---------------------------------------------------------------------

	public function agregar_tipos(){
		$data = array(
			'Nombre_servicio' => $this->input->post('Nombre_servicio',TRUE),
			'Descripcion_servicio' => $this->input->post('Descripcion_servicio',TRUE),
		);
		$this->Servicios_model->set_tipos($data);
		redirect('Servicios');

	}
//-----------------------------------------------------------------
		//FUNCION ELIMINAR TIPOS
//-----------------------------------------------------------------
	public function eliminar_tipos()
	{
		$id_tipo_servicio = $this->uri->segment(3);
		echo $id_tipo_servicio;
		$this->Servicios_model->eliminar_tiposervicio($id_tipo_servicio);
		echo "<script>alert('Tipo Eliminado Correctamente');window.location.href='".base_url()."index.php/Servicios/';</script>";
	}

//-------------------------------------------------------------------
	//VISTA EDITAR TIPOS
//-------------------------------------------------------------------
	public function editar_tipos()
	{
		
		if($this->session->userdata('logueado') == TRUE)
		{
			$id_tipo_servicio = $this->uri->segment(3);
			$data = array(
				'DATA_TIPOS' => $this->Servicios_model->get_tipo($id_tipo_servicio),
			);
			$this->load->view('headers/header');
			$this->load->view('headers/navbar');
			$this->load->view('headers/logos_head1');
			$this->load->view('servicios/editar_servicios',$data);
			$this->load->view('footers/footer');
			$this->load->view('footers/logos_foot1');
		}
		else
		{
			redirect(base_url());
		}
	}

//-----------------------------------------------------------------
	//FUNCION EDITAR TIPOS USADA EN LA VISTA DE EDITAR_TIPOS
//-----------------------------------------------------------------

	public function fun_editar_tipos()
	{
		$id_tipo_servicio = $this->uri->segment(3);
		$data = array(
			
			'Nombre_servicio' => $this->input->post('Nombre_servicio',TRUE),
			'Descripcion_servicio' => $this->input->post('Descripcion_servicio', TRUE),
		);
		$this->Servicios_model->update_tipo($id_tipo_servicio,$data);
		echo "<script>alert('Tipo Modificado Correctamente');window.location.href='".base_url()."index.php/Servicios';</script>";
	}

}
