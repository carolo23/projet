<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Nomadminclient_model extends CI_Model {
	//Votre code ici pour gérer votre panneau d'administration
	public function __construct(){
        $this->load->database();
    }
	//Ajouter des données dans une table
	public function ajouter($data,$table){
		return $this->db->insert($table,$data);
	}
	//Méthode qui va chercher l'élément d'une table à modifier
	public function modifier($table, $id){
		$this->db->where('id', $id);
		return $this->db->get($table)->result();
	}
	//Modifier les informations d'un élément d'une table
	public function modifier_bd($data,$table,$id){
		$this->db->where('id', $id);
		return $this->db->update($table, $data);
	}
	//Supprimer un élément d'une table
	public function supprimer($table, $id){
		return $this->db->delete($table, array('id' => $id));
	}
	//Va chercher le contenu d'un table
	public function voir($table){
		$this->db->order_by('id');
		return $this->db->get($table)->result();
	}
	//Va cherche un élément d'une table pae son ID
	public function get($id){
		return $this->db->get_where($this->table,array('id'=>$id))->result();
	}
}