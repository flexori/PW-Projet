<?php
if(session_id() == '') {
    session_start();
   }
require('actionsManager/database.php');

if(isset($_POST['valModif'])){

    if(!empty($_POST['nom'])){
        
        $idOfCat = $_GET['id'];
        //Les données de l'user
        $user_nom = htmlspecialchars($_POST['nom']);
            
            //Insérer l'utilisateur dans la bdd

            $req = $bdd->prepare('UPDATE categories SET nom = :nv_nom WHERE id = :idCat');
            $req->execute(array(

                'nv_nom' => $user_nom,
                'idCat' => $idOfCat
         
                ));

            //$bdd->exec('UPDATE users SET prenom='.$user_prenom.', nom='.$user_nom.', mail='.$user_mail.', password='.$user_password.' WHERE id='.$idOfUser);
        
            $url = htmlspecialchars("list_categories.php");
            echo '<script>window.location = "'.$url.'";</script>';

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}
?>