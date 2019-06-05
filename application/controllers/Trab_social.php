<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Trab_social extends CI_Controller {
//-----------------------------------------------------------------
//		CONSTRUCTOR
//-----------------------------------------------------------------
	function __construct()
	{
		parent::__construct();
		$this->load->model('Trab_social_model');
	}



		//-----------------------------------------------------------------
	//-----------------------------------------------------------------
			//PRIMERA COSA QUE SE EJECUTA (INDEX)
			//VISTA PARA FOLIOS
	//-----------------------------------------------------------------
	//-----------------------------------------------------------------
	public function index()
	{
		
		if($this->session->userdata('logueado') == TRUE)
		{
			
			$this->load->view('headers/header');
			$this->load->view('headers/navbar');
			//$this->load->view('trabsocial/recepcion_ts');
			$this->load->view('folios/ese2');
			$this->load->view('footers/footer_ese');

		}
		else
		{
			redirect(base_url());
		}

	}

	public function Turnos()
	{
		if($this->session->userdata('logueado') == TRUE)
		{
			$data = array(
				'datos_turno' => $this->Trab_social_model->verturnos(),
			);

			$this->load->view('headers/header');
			$this->load->view('headers/navbar');
			$this->load->view('headers/logos_head1');		
			
			$this->load->view('trabsocial/turnos', $data);			
			
			$this->load->view('footers/footer');
			$this->load->view('footers/logos_foot1');

		}
		else
		{
			redirect(base_url());
		}
	}

	public function update_estado()
	{
		$idadulto = trim($this->input->post('id_adulto'));
		$data = array(
			'estado' => trim($this->input->post('estado')),
			'id_adulto' => trim($this->input->post('id_adulto')),
		);

		$CONSULTA_IDTURNO = $this->Trab_social_model->get_IDT($idadulto);
		if($CONSULTA_IDTURNO != FALSE)
		{
			foreach ($CONSULTA_IDTURNO->result() as $row) {
				$ID = $row->id_turno;
			}
		}

		
		$this->Trab_social_model->up_estado($data, $ID);
		echo json_encode($data);
	}

	public function agregar_turno()
	{
		if($this->input->is_ajax_request())
		{

			$fecha_actual = trim($this->input->post('fecha_turno'));
			$CONSULTA_FECHA = $this->Trab_social_model->get_fecha();
			if($CONSULTA_FECHA != FALSE)
			{
				foreach ($CONSULTA_FECHA->result() as $row) {
					$FechaM = $row->fecha_turno;
				}
			}

			$CONSULTA_TURNO = $this->Trab_social_model->get_turno();
			if($CONSULTA_TURNO != FALSE)
			{
				foreach ($CONSULTA_TURNO->result() as $row) {
					$turnoM = $row->turno;
				}
			}
			if ($turnoM == 0 || $turnoM == NULL) 
			{
				$turnoM = 1;
			}
			else
			{
				if ($fecha_actual != $FechaM) 
				{
					$turnoM =1;
				}
				else if (($fecha_actual == $FechaM) && ($turnoM >= 1))
				{
					$turnoM= $turnoM+1;
				}
				else if (($fecha_actual == $FechaM) && ($turnoM == 100))
				{
					$turnoM=1;
				}
			}
						
			$data = array(
				'id_tipo_usuario' => trim($this->input->post('id_tipo_usuario')),
				'id_adulto' => trim($this->input->post('id_adulto')),
				'estado' => trim($this->input->post('estado')),
				'turno' => $turnoM,
				'fecha_turno' => $fecha_actual,
			);

			$this->Trab_social_model->insert_turnos($data);
			echo json_encode($data);
		}
		else
		{
            show_404();
        }
	}

}
?>