<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Recepcion extends CI_Controller {
//-----------------------------------------------------------------
//		CONSTRUCTOR
//-----------------------------------------------------------------
	function __construct()
	{
		parent::__construct();
		$this->load->model('Recepcion_model');
	}

	//-----------------------------------------------------------------
	//-----------------------------------------------------------------
			//PRIMERA COSA QUE SE EJECUTA (INDEX)
			//VISTA RECEPCIÓN
	//-----------------------------------------------------------------
	//-----------------------------------------------------------------
	public function index()
	{
		
		if($this->session->userdata('logueado') == TRUE)
		{
			$id_usuario = $this->session->userdata('id_usuario');
			$data = array(			 	
			 	'tipos_servicios'   => $this->Recepcion_model->vertiposservicios(),
			 	'categorias_repres' => $this->Recepcion_model->vercatrepres(),
			 	'datos_usuario' => $this->Recepcion_model->verdatosusuario($id_usuario),
			 );
			$this->load->view('headers/header');
			$this->load->view('headers/navbar');
			$this->load->view('headers/logos_head1');
			$this->load->view('recepcion/recepcion_nuevo',$data);
			$this->load->view('footers/footer');
			$this->load->view('footers/logos_foot1');
		}
		else
		{
			redirect(base_url());
		}

	}


//---------------------------------------------------------------------
			//VISTA PARA CONSULTAR ADULTOS
//---------------------------------------------------------------------

	public function Vconsulta_adultos()
	{
		
		if($this->session->userdata('logueado') == TRUE)
		{
			$data = array(			 	
			 	'datos_adultos' =>$this->Recepcion_model->veradultos(),
			 );
			$this->load->view('headers/header');
			$this->load->view('headers/navbar');
			$this->load->view('headers/logos_head1');
			$this->load->view('recepcion/consulta_adultos', $data);
			$this->load->view('footers/footer');
			$this->load->view('footers/logos_foot1');
		}
		else
		{
			redirect(base_url());
		}

	}

//---------------------------------------------------------------------
			//VISTA PARA CARGAR PANTALLA PRESENCIAL
//---------------------------------------------------------------------

	public function presencial()
	{
		
		if($this->session->userdata('logueado') == TRUE)
		{
			$id_usuario = $this->session->userdata('id_usuario');

			$data = array(			 	
			 	'tipos_servicios'   => $this->Recepcion_model->vertiposservicios(),
			 	'categorias_repres' => $this->Recepcion_model->vercatrepres(),
			 	'datos_usuario' => $this->Recepcion_model->verdatosusuario($id_usuario),
			 );
			$this->load->view('headers/header');
			$this->load->view('headers/navbar');
			$this->load->view('headers/logos_head1');
			$this->load->view('recepcion/recepcion_presencial', $data);
			$this->load->view('footers/footer');
			$this->load->view('footers/logos_foot1');
		}
		else
		{
			redirect(base_url());
		}

	}

	public function busqueda_existente()
	{
		$Nombre_Adulto = $this->uri->segment(3);
		$Edad = $this->uri->segment(4);

		$datos_adultos = $this->Recepcion_model->buscar($Nombre_Adulto,$Edad);
		
		?>
			<table id="Consulta_adU" name="Consulta_adU" class="display table table-striped">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Teléfono</th>
						<th>Edad</th>
						<th>Dirección</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if($datos_adultos  != FALSE)
						{
							foreach ($datos_adultos->result() as $row) {
								echo '<tr>';
									echo "<td>";
										echo $row->Nombre_Adulto;
									echo '</td>';
									echo "<td>";
										echo $row->Telefono;
									echo '</td>';
									echo "<td>";
										echo $row->Edad;
									echo '</td>';
									echo "<td>";
										echo $row->Direccion;
									echo "</td>";
									echo '<td>';
										echo '<input type="radio" id="radiobusqueda" onchange="showdiv()" value="'.$row->id_adulto.'" name="radiobusqueda">';
										
										//echo '<a href="'.base_url().'index.php/Recepcion/info_adultos/'.$row->id_adulto.'" title="Ver más información del Adulto" name="VerDetalles">Seleccionar</a>';
									echo '</td>';
								echo '</tr>';
							}
						}
					?>
				</tbody>
			</table>
		<?php
	}

//---------------------------------------------------------------------
			//VISTA PARA CONSULTAR DATOS ADULTOS
//---------------------------------------------------------------------

	public function info_adultos()
	{
		
		if($this->session->userdata('logueado') == TRUE)
		{
			$id_adulto = $this->uri->segment(3);
			$data = array(			 	
			 	'datos_adultos' =>$this->Recepcion_model->get_adu($id_adulto),
			 	'datos_archivos'=>$this->Recepcion_model->get_archivos($id_adulto),

			 	'datos_familia' =>$this->Recepcion_model->get_fam($id_adulto),
			 	'categorias_repres' => $this->Recepcion_model->vercatrepres(),
			 	'datos_folios' => $this->Recepcion_model->verfolios($id_adulto),
			 	'tipos_servicios'   => $this->Recepcion_model->vertiposservicios(),
			 );
			$this->load->view('headers/header');
			$this->load->view('headers/navbar');
			$this->load->view('headers/logos_head1');
			$this->load->view('adultos/adultos', $data);
			$this->load->view('footers/footer');
			$this->load->view('footers/logos_foot1');
		}
		else
		{
			redirect(base_url());
		}

	}

//---------------------------------------------------------------------
			//VISTA PARA MODIFICAR REPRESENTANTE DEL ADULTO
//---------------------------------------------------------------------
	public function modificar_repre()
	{
		if($this->session->userdata('logueado') == TRUE)
		{
			$id_representante = $this->uri->segment(3);
			$data = array(			 	
			 	'datos_repre' =>$this->Recepcion_model->get_repre($id_representante),
			 	'categorias_repres' => $this->Recepcion_model->vercatrepres(),
			 );
			$this->load->view('headers/header');
			$this->load->view('headers/navbar');
			$this->load->view('adultos/modif_repre', $data);
			$this->load->view('footers/footer');
		}
		else
		{
			redirect(base_url());
		}
	}


//------------------------------------------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------------------------------------
							//FUNCIONES
//------------------------------------------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------------------------------------



//---------------------------------------------------------------------
			//FUNCIÓN PARA AGREGAR ADULTOS CON UNO O 2 FAMILIARES Y FOLIO
//---------------------------------------------------------------------

	public function agregar_adulto(){
		
//CREA EL FOLIO CUANDO ES PRIMERA VEZ QUE SE REGISTRA AL ADULTO, OBTIENE EL ULTIMO FOLIO REGISTRADO
		$DATA_FOLIO = $this->Recepcion_model->get_folio();

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

		$DATA_A_REGISTRO = $this->Recepcion_model->get_a_max(); 
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

//OBTIENE LOS DATOS DE LA VISTA PARA INSERTARLOS EN LA TABLA DE CAT_ADULTOS
		$data = array(			
			'fecha_registro' => $this->input->post('fecha_registro',TRUE),
			'Nombre_Adulto' => $this->input->post('Nombre_Adulto', TRUE),
			'Telefono' => $this->input->post('Telefono', TRUE),
			'Edad' => $this->input->post('Edad', TRUE),
			'Sexo' => $this->input->post('customRadioInline1', TRUE),
		);
		
		$this->Recepcion_model->set_adultos($data); //INSERTA AL ADULTO

		$DATA_ULTIMOID = $this->Recepcion_model->recuperar_ultimo(); //RECUPERA EL ULTIMO ID INSERTADO

		if($DATA_ULTIMOID != FALSE)
		{
			foreach ($DATA_ULTIMOID->result() as $row) {
				$I_max = $row->id_adulto;
				//SE GUARDA EN UNA VARIABLE EL ULTIMO ADULTO REGISTRADO PARA PODER INSERTAR SUS RESPECTIVOS REPRESENTANTES
			}
		}

		// CREA EL FOLIO
		$data_folio = array (
			'A_registro' => date("Y"),
			'Folio_adulto' => $Folio_adulto,
			'id_adulto' => $I_max,
			//'id_tipo_servicio' => $this->input->post('select_tipo_servicio', TRUE),
			'fecha_comienzo' => $this->input->post('fecha_registro',TRUE),
		);
		$this->Recepcion_model->set_folios($data_folio);

//DATOS DE REPRESENTANTAS
		//GUARDA EL DATO QUE TRAE DESDE LA VISTA PARA QUE SI ES NULO NO LO INSERTE
		$Nombre_representante = $this->input->post('Nombre_representante',TRUE);

		//OBTIENE LOS DATOS DE LA VISTA PARA INSERTARLOS EN LA TABLA DE REPRESENTANTES
		$data2 = array(
			'id_adulto' => $I_max,
			'Nombre_representante' => $this->input->post('Nombre_representante',TRUE),
			'Telefono_repre' => $this->input->post('Telefono_repre', TRUE),
			'id_categoria_repres' => $this->input->post('select_tipo_representante', TRUE),
		);

		//GUARDA EL DATO QUE TRAE DESDE LA VISTA PARA QUE SI ES NULO NO LO INSERTE
		$Nombre_repre2 = $this->input->post('Nombre_repre2',TRUE);
		
		//OBTIENE LOS DATOS DE LA VISTA PARA INSERTARLOS EN LA TABLA DE REPRESENTANTES
		$data3 = array(
			'id_adulto' => $I_max,			
			'Nombre_representante' => $this->input->post('Nombre_repre2',TRUE),
			'Telefono_repre' => $this->input->post('Telefono_repre2', TRUE),
			'id_categoria_repres' => $this->input->post('select_tipo_representante2', TRUE),
			//COMO ESTA EN LA BS => COMO ES EL ID DE LA VISTA QUE LO TRAE
		);
		
//INSERTAR DATOS DE REPRESENTANTES EN CASO DE QUE NO ESTEN VACIOS
		if ($Nombre_representante != '') {
			$this->Recepcion_model->set_familiares($data2);
			if ($Nombre_repre2 != '') {
				$this->Recepcion_model->set_familiares($data3);
			}
		}
		
		//AQUI TURNOS

		$e1 = trim($this->input->post('select_dequetipo'));
		$vartipoTEL;
		if ($e1 == "Tel") 
		{
			$vartipoTEL = 2;
			//0 = POR ATENDER, PRESENCIAL
			//1 = ATENDIDO
			//2 = TELEFONICO, PRIORIDAD, POR ATENDER
		}else
		{
			$vartipoTEL = 0;
		}

		$fecha_actual = trim($this->input->post('fecha_turno'));
			$CONSULTA_FECHA = $this->Recepcion_model->get_fecha2();
			if($CONSULTA_FECHA != FALSE)
			{
				foreach ($CONSULTA_FECHA->result() as $row) {
					$FechaM = $row->fecha_turno;
				}
			}

			$CONSULTA_TURNO = $this->Recepcion_model->get_turno2();
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
			

			$data_turno = array(
				'id_tipo_usuario' => 2, //manda directo al ts
				'id_adulto' => $I_max,
				'estado' => $vartipoTEL,
				'turno' => $turnoM,
				'fecha_turno' => $fecha_actual,
			);

			$this->Recepcion_model->insert_turnos2($data_turno);
			echo json_encode($data_turno);

		//ALERT Y REDIRECT
		echo "<script>alert('Datos Insertados Correctamente');window.location.href='".base_url()."';</script>";

	}


//---------------------------------------------------------------------
			//FUNCIÓN PARA AGREGAR NUEVO REPRESENTANTE
//---------------------------------------------------------------------
	public function fun_nuevo_repre()
	{
		$id_adulto = $this->uri->segment(3);

		$Nombre_representante = $this->input->post('Nombre_representante',TRUE);
				
		$data = array(
			'id_adulto' => $id_adulto,
			'Nombre_representante' => $this->input->post('Nombre_representante',TRUE),
			'Telefono_repre' => $this->input->post('Telefono_repre', TRUE),
			'id_categoria_repres' => $this->input->post('select_tipo_representante', TRUE),
		);

		if ($Nombre_representante != '') {
			$this->Recepcion_model->set_familiares($data);
		}
		
		echo "<script>alert('Datos InsertadosCorrectamente');window.location.href='".base_url()."index.php/Recepcion/info_adultos/".$id_adulto."';</script>";
	}

//---------------------------------------------------------------------
			//FUNCIÓN PARA ACTUALIZAR CONTACTOS
//---------------------------------------------------------------------
	public function update_repre()
	{
		$id_representante = $this->uri->segment(3);
		$id_adulto = $this->input->post('id_adulto',TRUE);

		$data = array(
			'Nombre_representante' => $this->input->post('Nombre_representante',TRUE),
			'Telefono_repre' => $this->input->post('Telefono_repre', TRUE),
			'id_categoria_repres' => $this->input->post('select_tipo_representante', TRUE),
		);

		$this->Recepcion_model->update_repre($id_representante, $data);
		
		echo "<script>alert('Datos InsertadosCorrectamente');window.location.href='".base_url()."index.php/Recepcion/info_adultos/".$id_adulto."';</script>";
	}


}
?>