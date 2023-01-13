<!DOCTYPE html>
<html>
<head>
	<meta charset ="UTF-8">
	<meta http-equiv ="X-UA-Compatible" content ="IE=edge">
	<meta name="viewport" content ="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url('assets/site/css/bootstrap.min.css') ?>">
	<title>Site Client</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- Je fais des changements dans le header.php -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php 
      //Boucle du menu
      //Boucle du menu !!
      foreach($menu_p as $menu_p):
        $menu_s = $this->site_model->menu_s($menu_p->id);
          if(!empty($menu_s))
          {
            echo '<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            '.$menu_p->nom.'
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            ';	
            foreach($menu_s as $menu_s){ 
              echo"<a class='dropdown-item' href='". base_url()."index.php/site/index/". $menu_s->id."'>" . $menu_s->nom."</a>\n";
            }
            echo " </div>\n</li>";
          }
          else{?>
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo site_url('site/index/'.$menu_p->id); ?>"><?= $menu_p->nom ?></a>
            </li>
          <?php } ?>		
      <?php endforeach; ?>
    </ul>
  </div>
</nav>
<div class="container">
