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

}
?>