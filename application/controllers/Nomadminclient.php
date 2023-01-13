<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Nomadminclient extends CI_Controller {

	//constructeur de la classe
	function __construct() {
		parent:: __construct();
		$this->load->model('user_model');
		$this->load->model('nomAdminClient_model');
		$this->load->helper(array('url','form'));
		$this->load->library('session');
		if(!$this->user_model->isLoggedIn())
			$this->load->view('nomadminclient/loginform');
		else
		$this->load->view('nomadminclient/header');
	}

	//Redirige vers le panel admin si session existe
	function index($page="admin"){
		//Vous devez ajouter ce if à toutes les nouvelles méthodes que vous ajoutez
		//dans voutre controlleur pour sécuriser votre administration
		if($this->user_model->isLoggedIn()){
			$this->load->view('nomadminclient/'.$page);
			$this->load->view('nomadminclient/footer');
		}
	}

	//Traitement du formulaire de login
	function login(){
		if($this->user_model->validCredentials($this->input->post('username'),$this->input->post('password')))
			redirect(site_url()."/nomadminclient");
		else
			redirect(site_url()."/nomadminclient");
	}

	//Déconnexion de l'administrateur
	function logout(){
		$this->user_model->logout();
		redirect(site_url()."/nomadminclient");
	}//

}
