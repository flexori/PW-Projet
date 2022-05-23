<?php
if(session_id() == '') {
    session_start();
   }
require('actions/database.php');
//echo "test";

//Validation du formulaire
if(isset($_POST['validate'])){

    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['titre']) AND !empty($_POST['description']) AND !empty($_POST['prix']) AND !empty($_FILES['fichier'])){
        
        
        //Les données de l'user
        $annonce_titre = htmlspecialchars($_POST['titre']);
        $annonce_description = htmlspecialchars($_POST['description']);
        $annonce_prix = htmlspecialchars($_POST['prix']);
        $annonce_fichier = htmlspecialchars($_FILES['fichier']);

        $tmp_fichier = $_FILES['fichier'][$annonce_fichier];
        $nom_destination = "./images/$annonce_fichier";
        move_uploaded_file($tmp_fichier,$nom_destination);
            
            //Insérer l'utilisateur dans la bdd
            $insertAnnonceOnWebsite = $bdd->prepare('INSERT INTO annonces(titre, description, prix, image)VALUES(?, ?, ?, ?)');
            $insertAnnonceOnWebsite->execute(array($annonce_titre, $annonce_description, $annonce_prix, $annonce_fichier));

            //Récupérer les informations de l'utilisateur
            $getInfosOfThisAnnonceReq = $bdd->prepare('SELECT id FROM annonces WHERE titre = ?');
            $getInfosOfThisAnnonceReq->execute(array($annonce_titre));

            $annonceInfos = $getInfosOfThisAnnonceReq->fetch();

            $_SESSION['id'] = $annonceInfos['id'];

            header('Location: ../annonce.php?id='.$_SESSION['id']);
            $errorMsg = "Votre annonce a bien été publiée.";

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}