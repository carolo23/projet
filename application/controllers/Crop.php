<?php
    
class crop extends CI_Controller {
       
    public function __construct() {
       parent::__construct();
	   $this->load->helper(array('url','form'));
    }
     
    public function index(){
        $this->load->view('crop/crop_form');
    } 
    
}