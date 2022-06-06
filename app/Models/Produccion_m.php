<?php if (! defined('BASEPATH')) exit('No direct scripts access allowed');

class Produccion_m extends CI_Model
{

	function guardar($data,$tabla){
	    $success = $this->db->insert($tabla,$data);
		return ["status"=>$success];
	}
	
}