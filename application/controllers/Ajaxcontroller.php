<?php
    
class Ajaxcontroller extends CI_Controller {
       
    public function __construct() {
       parent::__construct();
       $this->load->model('ajaxcontroller_model');
    }
        
    public function upload_croppie($table){
        @$data = $_POST['image'];
        //Ramassage du nom d'image sans extention
        @$nomImage = explode(".",basename($_POST['file']));
        //Formatage du nom de l'image
        //Solution #1
        /*$nomImageFormater = mb_strtolower($nomImage[0], 'UTF-8');
        $nomImageFormater = str_replace(
        array('à','â','ä','á','ã','å','î','ï','ì','í','ô','ö','ò','ó','õ','ø','ù','û','ü','ú','é','è','ê','ë','ç','ÿ','ñ', ),
        array('a','a','a','a','a','a','i','i','i','i','o','o','o','o','o','o','u','u','u','u','e','e','e','e','c','y','n', ),
        $nomImageFormater);
        $nomImageFormater = preg_replace('/([^.a-z0-9]+)/i', '-', $nomImageFormater);
        $imageName = $nomImageFormater.'.png';
        */

        //Formatage du nom de l'image
        //Solution #2
        $imageName = 'img-'.time().'.png';
        
        @list($type, $data) = explode(';', $data);
        @list(, $data)      = explode(',', $data);
     
        $data = base64_decode($data);
        
        //Téléversement image
        file_put_contents('assets/admin/images/'.$table.'/'.$imageName, $data);  
        //Préparation des champs à envoyer dans la BD
        unset($_POST["image"]);
        $_POST["file"]=$imageName;
        //Envoi à la BD
        if($this->ajaxcontroller_model->ajouter($_POST,$table))
		    echo "Bravo!";
        else
            echo "Erreur!";
    }
}