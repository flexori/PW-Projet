<?php
if(session_id() == '') {
    session_start();
   }
require('actionsManager/database.php');


        if(isset($_GET['id']) AND !empty($_GET['id'])){


            $idOfCat = $_GET['id'];
        
       
            $getOneAnnonce = $bdd->prepare('DELETE FROM admins WHERE id = ?');
            $getOneAnnonce->execute(array($idOfCat));

            header('Location: ../manager/list_admins.php');

        }else{
            $errorMsg = "Aucun admin trouvé";
        }