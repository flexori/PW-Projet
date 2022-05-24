<?php
require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){
    
    //L'id de l'utilisateur
    $idOfUser = $_GET['id'];
    
    //Vérifier si l'utilisateur existe
    $checkIfUserExists = $bdd->prepare('SELECT prenom, nom, mail FROM users WHERE id = ?');
    $checkIfUserExists->execute(array($idOfUser));
    
    if($checkIfUserExists->rowCount() > 0){
        
        //Récupérer toutes les données de l'utilisateur
        $usersInfos = $checkIfUserExists->fetch();
        
        $user_prenom = $usersInfos['prenom'];
        $user_nom = $usersInfos['nom'];
        $user_mail = $usersInfos['mail'];
        
    }else{
        $errorMsg = "Aucun utilisateur trouvé";
    }
    
}else{
    $errorMsg = "Aucun utilisateur trouvé";
}