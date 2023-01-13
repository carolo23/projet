
<?php foreach($result as $result):?>
    <hr>	
        <h2><?= $result->nom ?></h2>
    <hr>
    <p>
        <?= $result->contenu ?>
    </p>
<?php endforeach; ?>
    
		