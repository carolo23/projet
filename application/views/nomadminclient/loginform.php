<?php
echo form_open('/Nomadminclient/login');
?>
Utilisateur : <input type="text" name="username" required>
Mot de passe : <input type="password" name="password" required>
    
<?php
echo form_submit('submit','Connexion');
echo form_close();
?>