<?php
if(session_id() == '') {
    session_start();
   }
require('actions/database.php');
//echo "test";

        if(isset($_GET['id']) AND !empty($_GET['id'])){

            //L'id de l'utilisateur
            $idOfAnnonce = $_GET['id'];
        
            //Vérifier si l'utilisateur existe
            $getOneAnnonce = $bdd->prepare('SELECT * FROM annonces WHERE id = ?');
            $getOneAnnonce->execute(array($idOfAnnonce));
        
            if($getOneAnnonce->rowCount() > 0){
                
                //Récupérer toutes les données de l'utilisateur
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