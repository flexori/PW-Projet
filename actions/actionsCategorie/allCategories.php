<?php

require('actions/database.php');

//Récupérer les discussions par défaut sans recherche
$getAllCategories = $bdd->query('SELECT * FROM categories ORDER BY id');
$getAllCategories->execute(array());

if($getAllCategories->rowCount() > 0){
        
    //Récupérer toutes les données de l'utilisateur
    $categorieInfos = $getAllCategories->fetch();

    $categorie_id = $categorieInfos['id'];
    $categorie_nom = $categorieInfos['nom'];

}else{
    $errorMsg = "Aucune categorie trouvée";
}

