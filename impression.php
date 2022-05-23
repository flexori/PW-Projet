<html>
<body onload="window.print()">
<h1>MES FAVORIS</h1>
<?php
include("actions/actionsCategorie/allCategories.php");
require('actions/database.php');

//Récupérer l'identifiant de l'utilisateur


if(isset($_GET['id']) AND !empty($_GET['id'])){
    $idOfUser = $_GET['id'];

    //Vérifier si l'utilisateur existe
    $getAllFavoris = $bdd->prepare('
    SELECT DISTINCT annonces.id, favoris.id, titre, description, prix, image, date, id_categorie FROM ( annonces
    INNER JOIN favoris ON annonces.id = favoris.id_annonce )
    WHERE annonces.id_user=?
    GROUP BY annonces.id');
    $getAllFavoris->execute(array($idOfUser));
    $errorMsgf = "Aucun e trouvé";
    if($getAllFavoris->rowCount() > 0){
        $errorMsgf = "d e trouvé";
        //Récupérer toutes les données de l'utilisateur
        
                
				
				
                    while($favoris = $getAllFavoris->fetch()){
                    ?>
					
					<h5><?= $favoris['titre']; ?></h5>
					<img src="images/<?= $favoris['image']; ?>" alt="" height="150" width="260">
					<p><?= $favoris['description']; ?></p>
                    <p><?= $favoris['prix']; ?> €</p>
					</div>
                    <?php

                }
			
    
     

    }else{
        echo "Aucun favoris trouvé.";
    }

}
?>
</body>
</html>