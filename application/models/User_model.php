<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
    /***** Vérification du mot de l'utilisateur et du mot de passe ****/
	function validCredentials($username,$password){

		$password = crypt($password,'$1$tse$');
		$query = $this->db->get_where('user', array('username' => $username,'password' => $password));

		if($query->num_rows() > 0){
			  $r = $query->result();
			  $session_data = array('username' => $r[0]->username,'logged_in' => true);
			  $this->session->set_userdata($session_data);
			  return true;
		}
		else
			return false;
	}

	/***** Vérification si l'utilisateur est connecté ****/
	function isLoggedIn(){
    	if($this->session->userdata('logged_in'))
     		return true;
    	else
     		return false;
	}

	/***** Suppression de la session ****/
	function logout(){
    	$this->session->sess_destroy();
		return true;
	}

}
