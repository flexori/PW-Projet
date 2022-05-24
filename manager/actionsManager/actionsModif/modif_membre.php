<?php
if(session_id() == '') {
    session_start();
   }
require('actionsManager/database.php');

if(isset($_POST['valModifMembre'])){

    if(!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['mail'])){
        
        $idOfCat = $_GET['id'];
        //Les données de l'user
        $user_prenom = htmlspecialchars($_POST['prenom']);
        $user_nom = htmlspecialchars($_POST['nom']);
        $user_mail = htmlspecialchars($_POST['mail']);
            
            //Insérer l'utilisateur dans la bdd

            $req = $bdd->prepare('UPDATE users SET prenom = :nv_prenom, nom = :nv_nom, mail = :nv_mail WHERE id = :idCat');
            $req->execute(array(

                'nv_prenom' => $user_prenom,
                'nv_nom' => $user_nom,
                'nv_mail' => $user_mail,
                'idCat' => $idOfCat
         
                ));

            //$bdd->exec('UPDATE users SET prenom='.$user_prenom.', nom='.$user_nom.', mail='.$user_mail.', password='.$user_password.' WHERE id='.$idOfUser);
        
            $url = htmlspecialchars("list_membres.php");
            echo '<script>window.location = "'.$url.'";</script>';

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}
?>