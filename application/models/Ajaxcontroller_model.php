<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ajaxcontroller_model extends CI_Model{
	public function __construct(){
        $this->load->database();
    }
	//Ajouter des données dans une table
	public function ajouter($data,$table){
		return $this->db->insert($table,$data);
	}
}
