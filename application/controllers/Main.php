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
				$nombre = $row->nombre;
				$usuario = $row->usuario;
				$contraseña = $row->contraseña;
				$nivel_usuario = $row->nivel_usuario;
				$newdata = array(
					'user' => $usuario,
					'name' => $nombre,
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

	public function recordarContrasena()
	{
		$this->load->view('headers/header');
		$this->load->view('headers/logos_head1');
		$this->load->view('main/restablecer_contrasena');
		$this->load->view('footers/footer');
		$this->load->view('footers/logos_foot1');

	}

	public function enviarContrasena()
	{
		if(isset($_POST['email'])) {
		
			$email = $_POST['email'];
			$DATA_CORREO = $this->Main_model->get_password($email);

			if($DATA_CORREO != FALSE)
			{
				foreach ($DATA_CORREO->result() as $row) 
				{
					$password = $row->contraseña;
				}
				
				// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
				$email_to = $email;
				$email_subject = "RESTABLECER CONTRASEÑA";
				$email_from = "letrasylogos@pinguinosystems.com";
				// Aquí se deberían validar los datos ingresados por el usuario
				if(!isset($_POST['email'])) 
				{

					echo "<script>alert(\"Ocurrió un error y el formulario no ha sido enviado,Por favor, vuelva atrás y verifique la información ingresada\");</script>";
					
					die();
				}

				$email_message = "Su Contraseña es la siguiente:\n\n" . $password;


				// Ahora se envía el e-mail usando la función mail() de PHP
				$headers = 'From: '.$email_from."\r\n".
				'Reply-To: '.$email_from."\r\n" .
				'X-Mailer: PHP/' . phpversion();
				@mail($email_to, $email_subject, $email_message, $headers);


				print '<script type="text/javascript">alert("Su contraseña se ha enviado correctamente al correo de destino");</script>';
				
				//falta que muestre el mensaje swal

			}
			else
			{
				//CAMBIAR POR SWAL
				
				print '<script type="text/javascript">swal("No se encontro ningun usuario con el nombre ingresado por favor revise", "warning");</script>';
				
			}

			$this->index();	
		}
	}
}
