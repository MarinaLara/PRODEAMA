<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Folios extends CI_Controller {
//-----------------------------------------------------------------
//		CONSTRUCTOR
//-----------------------------------------------------------------
	function __construct()
	{
		parent::__construct();
		$this->load->model('Folios_model');
	}


	//-----------------------------------------------------------------
	//-----------------------------------------------------------------
			//PRIMERA COSA QUE SE EJECUTA (INDEX)
			//VISTA PARA FOLIOS
	//-----------------------------------------------------------------
	//-----------------------------------------------------------------
	public function folio()
	{
		
		if($this->session->userdata('logueado') == TRUE)
		{
			$id_folio = $this->uri->segment(3);
			$data = array(			 	
			 	'datos_folios' => $this->Folios_model->verfolios($id_folio),
			 );
			$this->load->view('headers/header');
			$this->load->view('headers/navbar');
			$this->load->view('headers/logos_head1');
			$this->load->view('folios/folios_1', $data);
			$this->load->view('footers/footer');
			$this->load->view('footers/logos_foot1');

		}
		else
		{
			redirect(base_url());
		}

	}


//---------------------------------------------------------------------
			//FUNCIÓN PARA AGREGAR OTRO FOLIO AL ADULTO
//---------------------------------------------------------------------

	public function nuevo_folio(){


//CREA EL FOLIO CUANDO ES PRIMERA VEZ QUE SE REGISTRA AL ADULTO, OBTIENE EL ULTIMO FOLIO REGISTRADO
		$DATA_FOLIO = $this->Folios_model->get_folio();

		if($DATA_FOLIO != FALSE) //CONTADOR PARA GENERAR EL NUMERO DE FOLIO E IRSE INCREMENTANDO EJ, 2018-1, 2018-2... 
		{
			foreach ($DATA_FOLIO->result() as $row) {
				$Folio_adulto = $row->Folio_adulto + 1; //SI YA HAY UN RESULTADO VA AGREGANDO 1
			}
		}
		else
		{
			$Folio_adulto = 1; //SINO ASIGNA AL PRIMERO DEL AÑO
		}

		$DATA_A_REGISTRO = $this->Folios_model->get_a_max(); 
		//OBTIENE EL MAXIMO REGISTRO INSERTADO (AÑO)
		if($DATA_A_REGISTRO != FALSE)
		{
			foreach ($DATA_A_REGISTRO->result() as $row) {
				$A_max = $row->A_registro;
				

			}
		}

		if(date('Y') > $A_max)
		{
			$Folio_adulto = 1; //PARA CUANDO CAMBIE DE AÑO SE REINICIE EL CONTADOR
		}

// CREA EL FOLIO
		$id_adulto = $this->uri->segment(3);

		$data_folio = array (
			'A_registro' => date("Y"),
			'Folio_adulto' => $Folio_adulto,
			'id_adulto' => $id_adulto,
			'id_tipo_servicio' => $this->input->post('select_tipo_servicio', TRUE),
			'fecha_comienzo' => $this->input->post('fecha_registro',TRUE),
		);
		
		
		$this->Folios_model->set_folios($data_folio);
		echo "<script>alert('Datos InsertadosCorrectamente');window.location.href='".base_url()."index.php/Recepcion/info_adultos/".$id_adulto."';</script>";

	}


	public function realizarESE()
	{
		
		if($this->session->userdata('logueado') == TRUE)
		{
			$id_adulto = $this->uri->segment(3);
			$id_folio = $this->uri->segment(4);
			$data = array(			 	
			 	'datos_adultos' =>$this->Folios_model->get_adu($id_adulto),
			 	'datos_folios' =>$this->Folios_model->get_folioese($id_folio),
			 );
			$this->load->view('headers/header');
			$this->load->view('headers/navbar');
			$this->load->view('folios/ese', $data);
			$this->load->view('footers/footer_ese');

		}
		else
		{
			$id_adulto = $this->uri->segment(3);
			redirect(base_url());
		}

	}


//---------------------------------------------------------------------
			//FUNCIÓN PARA MODIFICAR ADULTOS
//---------------------------------------------------------------------

	public function modificar_adulto(){
		
		$id_adulto = $this->uri->segment(3);
		
		$data = array(
			'Nombre_Adulto' => $this->input->post('editNombre_Adulto',TRUE),
			'Sexo' => $this->input->post('editSexo',TRUE),
			'Telefono' => $this->input->post('editTelefono', TRUE),
			'Edad' => $this->input->post('editEdad', TRUE),
		);
		
		$this->Folios_model->update_adulto($id_adulto, $data);
		
		echo "<script>alert('Datos InsertadosCorrectamente');window.location.href='".base_url()."index.php/Recepcion/info_adultos/".$id_adulto."';</script>";

	}
}
?>