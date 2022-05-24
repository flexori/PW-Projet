<?php
if(session_id() == '') {
    session_start();
   }
   require('actionsManager/database.php');

if(isset($_POST['valModifAnnonce'])){

    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['titre']) AND !empty($_POST['description']) AND !empty($_POST['prix'])){
        
        if(isset($_GET['id']) AND !empty($_GET['id'])){
        $idOfAnnonce = $_GET['id'];

        $annonce_titre = htmlspecialchars($_POST['titre']);
        $annonce_description = htmlspecialchars($_POST['description']);
        $annonce_prix = htmlspecialchars($_POST['prix']);

            $req = $bdd->prepare('UPDATE annonces SET titre = :nvnum, description = :nv_nom, prix = :nv_prix WHERE id = :idCat');
            $req->execute(array(

                'nvnum' => $annonce_titre,
                'nv_nom' => $annonce_description,
                'nv_prix' => $annonce_prix,
                'idCat' => $idOfAnnonce
         
                ));
        
            $url = htmlspecialchars("list_annonces.php");
            echo '<script>window.location = "'.$url.'";</script>';


        }else{
            $errorMsg = "Aucune annonce trouvée.";
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}
