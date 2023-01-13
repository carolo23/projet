
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
		<th scope='col'>TITRE</th>
		<th scope='col'>COURRIEL</th>
		<th scope='col'>MESSAGE</th>
    </tr>
  </thead>
  <tbody>
<?php
foreach ($infos_table as $row){
	echo "<tr>";
        echo "<td>".$row->id."</td>";
        echo "<td>".$row->titre."</td>";
        echo "<td>".$row->courriel."</td>";
        echo "<td>".$row->message."</td>";
    echo "</tr>";
}
?>
</tbody>
</table>
    
		