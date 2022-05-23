<?php

require('actions/database.php');

//Récupérer les discussions par défaut sans recherche



if(isset($_GET['val'] ) AND !empty($_GET['val']) ){
//selecteur + valide
    if(!empty($_GET['tag']) AND !empty($_GET['search'])){

    $idOfCategorie = $_GET['tag'];
    $usersSearch = $_GET['search'];
        
    header('Location: ../categories.php?id='.$idOfCategorie.'&v='.$usersSearch);

    }if(!empty($_GET['tag']) AND $_GET['search']==""){

    $idOfCategorie = $_GET['tag'];
    
    header('Location: ../categories.php?id='.$idOfCategorie);
    
    } if(!empty($_GET['search']) AND $_GET['tag']==""){

        $usersSearch = $_GET['search'];

        header('Location: ../categories.php?v='.$usersSearch);
    } 
//annonces par categorie
}if(isset($_GET['id']) AND !empty($_GET['id']) AND !isset($_GET['v']) AND empty($_GET['v'])){
    $idOfCategorie = $_GET['id'];
    $getAllAnnonces = $bdd->prepare('SELECT * FROM annonces WHERE id_categorie=? ORDER BY id');
    $getAllAnnonces->execute(array($idOfCategorie));
    if($getAllAnnonces->rowCount() > 0){
    
    }else{
        $error =  "Aucune annonce n'a été trouvée.";
    }

}if(isset($_GET['v']) AND !empty($_GET['v']) AND !isset($_GET['id']) AND empty($_GET['id'])){
    $usersSearch = $_GET['v'];
    $getAllAnnonces = $bdd->query('SELECT * FROM annonces WHERE titre LIKE "%'.$usersSearch.'%" ORDER BY id DESC');
    if($getAllAnnonces->rowCount() > 0){
    
    }else{
        $error =  "Aucune annonce n'a été trouvée.";
    }

//affiche toutes les annonces
}if(isset($_GET['v']) AND !empty($_GET['v']) AND isset($_GET['id']) AND !empty($_GET['id'])){
    $idOfCategorie = $_GET['id'];
    $usersSearch = $_GET['v'];
    $getAllAnnonces = $bdd->prepare('SELECT * FROM annonces WHERE id_categorie=? AND titre LIKE "%'.$usersSearch.'%" ORDER BY id DESC');
    $getAllAnnonces->execute(array($idOfCategorie));
    if($getAllAnnonces->rowCount() > 0){
    
    }else{
        $error =  "Aucune annonce n'a été trouvée.";
    }
}if(!isset($_GET['v']) AND empty($_GET['v']) AND !isset($_GET['id']) AND empty($_GET['id'])){
    $getAllAnnonces = $bdd->query('SELECT * FROM annonces ORDER BY id');
    if($getAllAnnonces->rowCount() > 0){
    
    }else{
        $error =  "Aucune annonce n'a été trouvée.";
    }
}
		