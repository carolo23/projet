<?php defined('BASEPATH') OR exit('No direct script access allowed');

class site_model extends CI_Model{  
		/********** Méthode va chercher le contenu d'une table *************/
        public function voir($table){
			$this->db->order_by('id');
			return $this->db->get($table)->result();
        }
        /********** Méthode va chercher l'élément d'une table selon id *************/
        public function voir_element($table,$id){
            $this->db->where('id',$id);
            return $this->db->get($table)->result();
        }
        /********** Méthode va chercher les éléments du menu pricipal *************/
        public function menu_p(){
            $this->db->select('id, nom, personnalise');
            $this->db->where('parent',0);
            $this->db->order_by('ordre');
            return $this->db->get("menu")->result();
        }
        /********** Méthode va chercher les éléments d'un sous-menu *************/
        public function menu_s($id){
            $this->db->select('id, nom, personnalise');
            $this->db->where('parent',$id);
            $this->db->order_by('ordre');
            return $this->db->get("menu")->result();
        }
}

?>