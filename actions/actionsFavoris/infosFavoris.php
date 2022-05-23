<?php

require('actions/database.php');

if(isset($_SESSION['auth'])){
    $idOfUser = $_SESSION['auth'];

    //Vérifier si l'utilisateur existe
    $getCount = $bdd->prepare('SELECT DISTINCT count(*) as id FROM ( annonces
INNER JOIN favoris ON annonces.id = favoris.id_annonce )
WHERE annonces.id_user=?');
$getCount->execute(array($idOfUser));

}




          if(isset($_SESSION['auth'])){
            ?>
			<li><a href="favoris.php?id=<?= $_SESSION['id']; ?>">Favoris : <?php print_r($getCount->fetchColumn()) ; ?> enregistrés</a></li>
           
		<?php 
          if(!isset($_SESSION['auth'])){
            ?>
			<li><a href="login.php">Favoris :  enregistrés</a></li>
            <?php
          }}
        ?>