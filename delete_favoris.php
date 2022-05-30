<?php
if(session_id() == '') {
    session_start();
   }
require('actions/database.php');


        if(isset($_GET['id']) AND !empty($_GET['id'])){


            $idOfFav = $_GET['id'];
        
       
            $getOneAnnonce = $bdd->prepare('DELETE FROM favoris WHERE id = ?');
            $getOneAnnonce->execute(array($idOfFav));

            $url = htmlspecialchars("favoris.php?id=".$_SESSION['id']);
            echo '<script>window.location = "'.$url.'";</script>';

        }else{
            $errorMsg = "Aucun favoris trouvé";
        }