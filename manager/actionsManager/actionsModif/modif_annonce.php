<?php
if(session_id() == '') {
    session_start();
   }
   require('actionsManager/database.php');

//echo "test";
if(isset($_POST['valModifAnnonce'])){

    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['titre']) AND !empty($_POST['description']) AND !empty($_POST['prix'])){
        
        if(isset($_GET['id']) AND !empty($_GET['id'])){
        $idOfAnnonce = $_GET['id'];
        //Les données de l'user
        $annonce_titre = htmlspecialchars($_POST['titre']);
        $annonce_description = htmlspecialchars($_POST['description']);
        $annonce_prix = htmlspecialchars($_POST['prix']);
            
            //Insérer l'utilisateur dans la bdd

            $req = $bdd->prepare('UPDATE annonces SET titre = :nvnum, description = :nv_nom, prix = :nv_prix WHERE id = :idCat');
            $req->execute(array(

                'nvnum' => $annonce_titre,
                'nv_nom' => $annonce_description,
                'nv_prix' => $annonce_prix,
                'idCat' => $idOfAnnonce
         
                ));

            //$bdd->exec('UPDATE users SET prenom='.$user_prenom.', nom='.$user_nom.', mail='.$user_mail.', password='.$user_password.' WHERE id='.$idOfUser);
        
            $url = htmlspecialchars("list_annonces.php");
            echo '<script>window.location = "'.$url.'";</script>';


        }else{
            $errorMsg = "Aucune annonce trouvée.";
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}
