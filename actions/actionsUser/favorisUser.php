<?php

require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){
    
    $idOfUser = $_GET['id'];
    
    $getAllFavoris = $bdd->prepare('SELECT DISTINCT annonces.id, favoris.id, titre, description, prix, image, date, id_categorie FROM ( annonces
    INNER JOIN favoris ON annonces.id = favoris.id_annonce )
    WHERE favoris.id_user=?
    GROUP BY annonces.id');

    $getAllFavoris->execute(array($idOfUser));

    if($getAllFavoris->rowCount() > 0){
   
        while($favoris = $getAllFavoris->fetch()){
            ?>
            <div class="ser-grid-list">
            <h5><?= $favoris['titre']; ?></h5>
            <img src="images/<?= $favoris['image']; ?>" alt="" height="150" width="260">
            <p><?= $favoris['description']; ?></p>
            <div class="btn top"><a href="annonce.php">Supprimer de mes favoris</a></div>
            </div>
            <?php
            
        }

    }else{
        $errorMsgf = "Aucun favoris trouvé";
    }
    
}