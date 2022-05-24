<?php
if(session_id() == '') {
    session_start();
}
require('actions/database.php');

$getOneAnnonce = $bdd->prepare('SELECT annonces.* FROM 
    ( SELECT * FROM annonces ORDER BY date DESC LIMIT 5 ) annonces
    ORDER BY RAND() DESC LIMIT 1');

    $getOneAnnonce->execute(array());
    
    if($getOneAnnonce->rowCount() > 0){
        
        $annonceInfos = $getOneAnnonce->fetch();
        
        $annonce_id = $annonceInfos['id'];
        $annonce_titre = $annonceInfos['titre'];
        $annonce_description = $annonceInfos['description'];
        $annonce_prix = $annonceInfos['prix'];
        $annonce_image = $annonceInfos['image'];
        $annonce_date = $annonceInfos['date'];
        
    }else{
        $errorMsg = "Aucune annonce trouvée";
    }
    
    