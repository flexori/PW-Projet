<?php
if(session_id() == '') {
    session_start();
   }
require('actions/database.php');

//Validation du formulaire

if(isset($_SESSION['auth'])){
if(isset($_POST['validate'])){

    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['userName']) AND !empty($_POST['userEmail']) AND !empty($_POST['userPhone']) AND !empty($_POST['userMsg'])){
        
        //Les données de l'user
        $user_nom = htmlspecialchars($_POST['userName']);
        $user_mail = htmlspecialchars($_POST['userEmail']);
        $user_phone = htmlspecialchars($_POST['userPhone']);
        $user_msg = htmlspecialchars($_POST['userMsg']);

        //Insérer la demande dans la bdd
        $insertDemandeDeContact = $bdd->prepare('INSERT INTO contact(nom, mail, telephone, message)VALUES(?, ?, ?, ?)');
        $insertDemandeDeContact->execute(array($user_nom, $user_mail, $user_phone, $user_msg));

        $errorMsg = "Votre demande a bien été envoyée.";

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}
}else{
    $errorMsg = "Veuillez vous connecter pour envoyer une demande de contact.";
}