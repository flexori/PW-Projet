<?php
require('actions/database.php');

$getAllCategories = $bdd->query('SELECT * FROM categories ORDER BY id');
$getAllCategories->execute(array());

if($getAllCategories->rowCount() > 0){
    
    $categorieInfos = $getAllCategories->fetch();
    
    $categorie_id = $categorieInfos['id'];
    $categorie_nom = $categorieInfos['nom'];
    
}else{
    $errorMsg = "Aucune categorie trouvée";
}

