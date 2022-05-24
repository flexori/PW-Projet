<?php
if(session_id() == '') {
    session_start();
   }
require('actionsManager/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['password']) AND !empty($_POST['passwordtwo'])){
        
        $user_prenom = htmlspecialchars($_POST['prenom']);
        $user_nom = htmlspecialchars($_POST['nom']);
        $user_mail = htmlspecialchars($_POST['mail']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $checkIfUserAlreadyExists = $bdd->prepare('SELECT nom FROM admins WHERE nom = ?');
        $checkIfUserAlreadyExists->execute(array($user_nom));

        if($checkIfUserAlreadyExists->rowCount() == 0){
            
            //Insérer l'utilisateur dans la bdd
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO admins(prenom, nom, mail, password)VALUES(?, ?, ?, ?)');
            $insertUserOnWebsite->execute(array($user_prenom, $user_nom, $user_mail, $user_password));

            $url = htmlspecialchars("list_admins.php");
            echo '<script>window.location = "'.$url.'";</script>';
        }else{
            $errorMsg = "L'admin existe déjà sur le site";
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}