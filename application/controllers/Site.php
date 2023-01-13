<?php
class Site extends CI_Controller{

	public function __construct(){
		parent::__construct();
		//Chargement des helpers
		$this->load->helper(array('url','form'));
		// Chargement du modèle
		$this->load->model('site_model');
	}

	/**********************Méthode index ************************************/
	public function index($id="1"){
		// Chargement du header
		$data["menu_p"]=$this->site_model->menu_p();
		$this->load->view('site/header',$data);
		if($id==1){
			//Chargement de tous les données pour constuire l'accueil dans plusieurs $data[""]
			$data["info"] = "Tout les infos. de la BD nécessaires pour produire l'accueil";
			//Chargement de la vue
			$this->load->view('site/home',$data);
		}
		else{
			//Chargement des informations de la page régulière (titre, contenu)
			$data["result"] = $this->site_model->voir_element("menu",$id);
			if(empty($data["result"][0]->personnalise))
				//Chargement de la vue standard
				$this->load->view('site/page_standard',$data);
			else{
				//Chargement de la vue personnalise
				$data["infos_table"] =  $this->site_model->voir($data["result"][0]->personnalise);
				$this->load->view('site/page_custom_'.$data["result"][0]->personnalise,$data);
			}
		}
		$this->load->view('site/footer');
	}

}
