<?php
if(session_id() == '') {
    session_start();
}
require('actions/database.php');

if(isset($_POST['valModif'])){
    
    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['password'])){
        
        if(isset($_GET['id']) AND !empty($_GET['id'])){
            $idOfUser = $_GET['id'];
            //Les données de l'user
            $user_prenom = htmlspecialchars($_POST['prenom']);
            $user_nom = htmlspecialchars($_POST['nom']);
            $user_mail = htmlspecialchars($_POST['mail']);
            $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            
            //Update l'utilisateur dans la bdd
            
            $req = $bdd->prepare('UPDATE users SET prenom = :nvprenom, nom = :nv_nom, mail= :nvmail, password = :nvpassword WHERE id = :idUser');
            $req->execute(array(
                
                'nvprenom' => $user_prenom,
                'nv_nom' => $user_nom,
                'nvmail' => $user_mail,
                'nvpassword' => $user_password,
                'idUser' => $idOfUser
                
            ));
            
            header('Location: ../moncompte.php?id='.$idOfUser);
            
        }else{
            $errorMsg = "Aucun utilisateur trouvé.";
        }
        
    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}
