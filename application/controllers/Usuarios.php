<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
//-----------------------------------------------------------------
//		CONSTRUCTOR
//-----------------------------------------------------------------
	function __construct()
	{
		parent::__construct();
		$this->load->model('Usuarios_model');
	}

	//-----------------------------------------------------------------
	//-----------------------------------------------------------------
			//PRIMERA COSA QUE SE EJECUTA (INDEX)
			//VISTA USUARIOS
	//-----------------------------------------------------------------
	//-----------------------------------------------------------------
	public function index()
	{
		
		if($this->session->userdata('logueado') == TRUE)
		{
			$data = array(
			 	'usuarios' =>$this->Usuarios_model->verdatos(),
			 	'tipos' =>$this->Usuarios_model->vertipos(),
			 );
			$this->load->view('headers/header');
			$this->load->view('headers/navbar');
			$this->load->view('headers/logos_head1');
			$this->load->view('usuarios/usuarios',$data);
			$this->load->view('footers/footer');
			$this->load->view('footers/logos_foot1');
		}
		else
		{
			redirect(base_url());
		}

	}


//---------------------------------------------------------------------
			//FUNCIÓN PARA AGREGAR USUARIOS
//---------------------------------------------------------------------

	public function agregar_usuarios(){
		$data = array(
			'usuario' => $this->input->post('usuario',TRUE),
			'nombre' => $this->input->post('nombre',TRUE),
			'contraseña' => $this->input->post('contraseña', TRUE),
			'nivel_usuario' => $this->input->post('nivel_usuario', TRUE),
			'activo' => '1'
		);
		$this->Usuarios_model->set_usuarios($data);
		redirect('Usuarios');

	}
//-----------------------------------------------------------------
		//FUNCION ELIMINAR USUARIOS
//-----------------------------------------------------------------
	public function eliminar_usuarios()
	{
		$id_usuario = $this->uri->segment(3);
		echo $id_usuario;
		$this->Usuarios_model->eliminar($id_usuario);
		echo "<script>alert('Usuario eliminado correctamente');window.location.href='".base_url()."index.php/usuarios/';</script>";
	}


//-----------------------------------------------------------------
		//VISTA EDITAR USUARIOS
//-----------------------------------------------------------------

	public function editar()
	{
		
		if($this->session->userdata('logueado') == TRUE)
		{
			$id_usuario = $this->uri->segment(3);
			$data = array(
				'DATA_USUARIO' => $this->Usuarios_model->get_usuario($id_usuario),
				'DATA_TIPOS' =>$this->Usuarios_model->vertipos(),
			);
			$this->load->view('headers/header');
			$this->load->view('headers/navbar');
			$this->load->view('headers/logos_head1');
			$this->load->view('usuarios/editar',$data);
			$this->load->view('footers/footer');
			$this->load->view('footers/logos_foot1');
		}
		else
		{
			redirect(base_url());
		}
	}

//-----------------------------------------------------------------
	//FUNCION EDITAR USUARIOS USADA EN LA VISTA DE EDITAR USUARIOS
//-----------------------------------------------------------------

	public function editar_usuario()
	{
		$id_usuario = $this->uri->segment(3);
		$data = array(
			'usuario' => $this->input->post('usuario',TRUE),
			'nombre' => $this->input->post('nombre',TRUE),
			'contraseña' => $this->input->post('contraseña', TRUE),
			'nivel_usuario' => $this->input->post('id_tipo_usuario', TRUE),
			'activo' => '1'
		);
		$this->Usuarios_model->update_usuario($id_usuario,$data);
		echo "<script>alert('Usuario Modificado Correctamente');window.location.href='".base_url()."index.php/usuarios/';</script>";
	}


//-----------------------------------------------------------------
//-----------------------------------------------------------------
//-----------------------------------------------------------------

		//TIPOS DE USUARIOS

//-----------------------------------------------------------------
//-----------------------------------------------------------------
//-----------------------------------------------------------------
	


//-----------------------------------------------------------------
	//VISTA TIPOS DE USUARIOS
//-----------------------------------------------------------------

	public function tipos_usuarios()
	{
		
		if($this->session->userdata('logueado') == TRUE)
		{
			$data = array(
			 	'usuarios' =>$this->Usuarios_model->vertipos()
			 );
			$this->load->view('headers/header');
			$this->load->view('headers/navbar');
			$this->load->view('headers/logos_head1');
			$this->load->view('usuarios/tipos_usuarios',$data);
			$this->load->view('footers/footer');
			$this->load->view('footers/logos_foot1');
		}
		else
		{
			redirect(base_url());
		}

	}

//-----------------------------------------------------------------
	//FUNCION ELIMINAR USUARIOS
//-----------------------------------------------------------------
	public function eliminar_tipos()
	{
		$id_tipo_usuario = $this->uri->segment(3);
		//echo $id_tipo_usuario;
		$this->Usuarios_model->eliminar_tipo($id_tipo_usuario);
		echo "<script>alert('Tipo Eliminado Correctamente');window.location.href='".base_url()."index.php/usuarios/tipos_usuarios';</script>";
	}

//-----------------------------------------------------------------
			//AGREGAR TIPOS
//-----------------------------------------------------------------

	public function agregar_tipo(){
		$data = array(
			'tipo_usuario' => $this->input->post('tipo_usuario',TRUE),
			'descripcion_tipo' => $this->input->post('descripcion_tipo',TRUE),	
			'nivel_usuario'	=> $this->input->post('Nivel_usuario', TRUE),
		);
		$this->Usuarios_model->set_tipos($data);
		redirect('Usuarios/tipos_usuarios');

	}

//-------------------------------------------------------------------
	//VISTA EDITAR TIPOS
//-------------------------------------------------------------------
	public function editar_tipos()
	{
		
		if($this->session->userdata('logueado') == TRUE)
		{
			$id_tipo_usuario = $this->uri->segment(3);
			$data = array(
				'DATA_TIPOS' => $this->Usuarios_model->get_tipo($id_tipo_usuario),
			);
			$this->load->view('headers/header');
			$this->load->view('headers/navbar');
			$this->load->view('headers/logos_head1');
			$this->load->view('usuarios/editar_tipos',$data);
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
		$id_tipo_usuario = $this->uri->segment(3);
		$data = array(
			
			'tipo_usuario' => $this->input->post('tipo_usuario',TRUE),
			'descripcion_tipo' => $this->input->post('descripcion_tipo', TRUE),
			'nivel_usuario'	=> $this->input->post('Nivel_usuario', TRUE),
		);
		$this->Usuarios_model->update_tipo($id_tipo_usuario,$data);
		echo "<script>alert('Tipo Modificado Correctamente');window.location.href='".base_url()."index.php/usuarios/tipos_usuarios';</script>";
	}

}