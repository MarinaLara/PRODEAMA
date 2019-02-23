<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model');
		
	}

	//PRIMERA COSA QUE SE EJECUTA
	public function index()
	{
		if($this->session->userdata('logueado') == TRUE)
		{
			$this->load->view('headers/header');
			$this->load->view('headers/navbar');
			$this->load->view('headers/logos_head1');		
			$this->load->view('main/bienvenida');			
			$this->load->view('footers/footer');
			$this->load->view('footers/logos_foot1');
		}
		else
		{
			redirect('main/log');
		}
	}

	public function log()
	{
		$this->load->view('headers/header');
		$this->load->view('headers/logos_head1');	
		$this->load->view('main/login');
		$this->load->view('footers/footer');
		$this->load->view('footers/logos_foot1');

	}

	public function login()
	{
		
		$data = array(
			'usuario' => $this->input->post('usuario',true), 
			'contraseña' => $this->input->post('contraseña',true),
		);
		$query = $this->Main_model->auntenticar($data);

		
		if($query == FALSE)
		{
			echo "<script>alert('Usuario o contraseña incorrectos');window.location.href='".base_url()."index.php/Main/log/';</script>";
		}
		else
		{
			foreach ($query->result() as $row) 
			{
				$id_usuario = $row->id_usuario;
				$usuario = $row->usuario;
				$contraseña = $row->contraseña;
				$nivel_usuario = $row->nivel_usuario;
				$newdata = array(
					'user' => $usuario,
					'logueado'=> TRUE,
					'nivel_usuario'=>$nivel_usuario,
					'id_usuario' => $id_usuario, 
				);
				$this->session->set_userdata($newdata);
				redirect('Main');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('main/log');
	}
}
