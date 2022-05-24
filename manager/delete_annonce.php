<?php
if(session_id() == '') {
    session_start();
   }
require('actionsManager/database.php');


        if(isset($_GET['id']) AND !empty($_GET['id'])){


            $idOfAnnonce = $_GET['id'];
        
       
            $getOneAnnonce = $bdd->prepare('DELETE FROM annonces WHERE id = ?');
            $getOneAnnonce->execute(array($idOfAnnonce));

            header('Location: ../manager/list_annonces.php');

        }else{
            $errorMsg = "Aucune categorie trouvée";
        }