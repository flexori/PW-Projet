<?php
if(session_id() == '') {
    session_start();
   }
   require('actionsManager/database.php');

//echo "test";
if(isset($_POST['ajoute'])){

    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['nameOfCat'])){
        
        $catNew = htmlspecialchars($_POST['nameOfCat']);
        //Les données de l'user
        $checkIfCatAlreadyExists = $bdd->prepare('SELECT nom FROM categories WHERE nom = ?');
        $checkIfCatAlreadyExists->execute(array($catNew));

        if($checkIfCatAlreadyExists->rowCount() == 0){
            
            //Insérer l'utilisateur dans la bdd
            $insertCatOnWebsite = $bdd->prepare('INSERT INTO categories(nom)VALUES(?)');
            $insertCatOnWebsite->execute(array($catNew));

            header('Location: ../manager/list_categories.php');
        }else{
            $errorMsg = "Cette catégorie existe déjà sur le site";
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}
