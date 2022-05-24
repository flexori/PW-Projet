<?php
if(session_id() == '') {
    session_start();
   }
require('actions/database.php');


        if(isset($_GET['id']) AND !empty($_GET['id'])){


            $idOfAnnonce = $_GET['id'];
        
       
            $getOneAnnonce = $bdd->prepare('SELECT * FROM annonces WHERE id = ?');
            $getOneAnnonce->execute(array($idOfAnnonce));
        
            if($getOneAnnonce->rowCount() > 0){
                
             
                $annonceInfos = $getOneAnnonce->fetch();
        
                $annonce_id = $annonceInfos['id'];
                $annonce_titre = $annonceInfos['titre'];
                $annonce_description = $annonceInfos['description'];
                $annonce_prix = $annonceInfos['prix'];
                $annonce_image = $annonceInfos['image'];
                $annonce_date = $annonceInfos['date'];
                $annonce_categorie = $annonceInfos['id_categorie'];
        
            }else{
                $errorMsg = "Aucune annonce trouvée";
            }
        
        }else{
            $errorMsg = "Aucune annonce trouvée";
        }