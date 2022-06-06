<?php

// SESIONES

defined('BASEPATH') OR exit('No direct script access allowed');

class Produccion extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("Produccion_m");
		$this->load->helper(array('form', 'url'));		
	}

	public function save(){
		$data =  $this->input->post();
		$tabla = $data['tabla'];
		unset($data['tabla']);
		$respuesta = $this->Produccion_m->guardar($data,$tabla);
		$this->json($respuesta);
	}


	function json($data){
		header("Content-type: application/json; charset-utf-8");
		echo json_encode($data);
	}
}
