<?php
if(session_id() == '') {
    session_start();
   }
require('actionsManager/database.php');


        if(isset($_GET['id']) AND !empty($_GET['id'])){


            $idOfCat = $_GET['id'];
        
       
            $getOneAnnonce = $bdd->prepare('DELETE FROM users WHERE id = ?');
            $getOneAnnonce->execute(array($idOfCat));

            header('Location: ../manager/list_membres.php');

        }else{
            $errorMsg = "Aucun membre trouvé";
        }