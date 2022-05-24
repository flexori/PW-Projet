<?php
if(session_id() == '') {
    session_start();
   }
require('actionsManager/database.php');


if(isset($_POST['ajoute'])){

    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['nameOfCat'])){
        
        $catNew = htmlspecialchars($_POST['nameOfCat']);

        $checkIfCatAlreadyExists = $bdd->prepare('SELECT nom FROM categories WHERE nom = ?');
        $checkIfCatAlreadyExists->execute(array($catNew));

        if($checkIfCatAlreadyExists->rowCount() == 0){
            

            $insertCatOnWebsite = $bdd->prepare('INSERT INTO categories(nom)VALUES(?)');
            $insertCatOnWebsite->execute(array($catNew));

            $url = htmlspecialchars("list_categories.php");
            echo '<script>window.location = "'.$url.'";</script>';

        }else{
            $errorMsg = "Cette catégorie existe déjà sur le site";
        }
            
        
    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}
