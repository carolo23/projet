
<?php foreach($result as $result):?>
    <hr>	
        <h2><?= $result->nom ?></h2>
    <hr>
    <p>
        <?php
        if($result->contenu)
            echo $result->contenu;
        ?>
    </p>
<?php endforeach; ?>
<table class="table">
  <thead>
    <tr>
    <th scope='col'>ID</th>
		<th scope='col'>NOM</th>
		<th scope='col'>PRENOM</th>
		<th scope='col'>AGE</th>
		<th scope='col'>SEXE</th>
    </tr>
  </thead>
  <tbody>
<?php
foreach ($infos_table as $row){
	echo "<tr>";
    echo "<td>".$row->id."</td>";
    echo "<td>".$row->nom."</td>";
    echo "<td>".$row->prenom."</td>";
    echo "<td>".$row->age."</td>";
    echo "<td>".$row->sexe."</td>";
    echo "</tr>\n";
}
?>
</tbody>
</table>
    
		