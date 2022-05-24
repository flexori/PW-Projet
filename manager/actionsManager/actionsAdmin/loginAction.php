<?php
if(session_id() == '') {
    session_start();
   }
   require('actionsManager/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['mail']) AND !empty($_POST['password'])){
        
        //Les données de l'user
        $user_mail = htmlspecialchars($_POST['mail']);
        $user_password = htmlspecialchars($_POST['password']);

        //Vérifier si l'utilisateur existe (si le pseudo est correct)
        $checkIfUserExists = $bdd->prepare('SELECT * FROM admins WHERE mail = ?');
        $checkIfUserExists->execute(array($user_mail));

        if($checkIfUserExists->rowCount() > 0){

            //Récupérer les données de l'utilisateur
            $usersInfos = $checkIfUserExists->fetch();

            //Vérifier si le mot de passe est correct
            if(password_verify($user_password, $usersInfos['password'])){
            
                //Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales sessions
                $_SESSION['ad'] = true;
                $_SESSION['idad'] = $usersInfos['id'];
                $_SESSION['prenomad'] = $usersInfos['prenom'];
                $_SESSION['nomad'] = $usersInfos['nom'];
                $_SESSION['mailad'] = $usersInfos['mail'];
                
                //Rediriger l'utilisateur vers la page d'accueil
                header('Location: index.php');
                exit;
            }else{
                $errorMsg = "Votre mot de passe est incorrect...";
            }

        }else{
            $errorMsg = "Utilisateur non trouvé.";
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}