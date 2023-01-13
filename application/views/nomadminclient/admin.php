<h1> module ADMIN</h1>
<p><em>Bienvenue <strong><?= $this->session->username ?></strong></em></p>
<hr>
<h2>Gestion des pages</h2>
<a href="#">Ajouter une page</a><br />
<a href="#">Modifier ou supprimer une page</a><br />
<a href="#">Renommer un menu principale</a><br />
<a href="#">Changer l'ordre de vos menus principaux</a><br />
<a href="#">Changer l'ordre de vos sous-menus</a><br />
<hr>
<h2>Gestion d'une page custom (exemple: Gestion des membres)</h2>
<a href="<?php echo site_url('Nomadminclient/index/crop_form'); ?>">Ajouter un membre</a><br />
<a href="#">Modifier ou supprimer un membre</a><br />
<hr>
<a href="<?php echo site_url('Nomadminclient/logout'); ?>">Déconnexion</a>
