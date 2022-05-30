<?php

require('actions/database.php');

if(isset($_GET['val'] ) AND !empty($_GET['val']) ){

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
    }if(!empty($_GET['tag']) AND !empty($_GET['search'])){
        $idOfCategorie = $_GET['tag'];
        $usersSearch = $_GET['search'];
        
        header('Location: ../categories.php?id='.$idOfCategorie.'&v='.$usersSearch);
        
    }if(!empty($_GET['tag']) AND $_GET['search']=="" ){

        $idOfCategorie = $_GET['tag'];
        
        header('Location: ../categories.php?id='.$idOfCategorie);
        
    } if(!empty($_GET['search']) AND $_GET['tag']=="" ){

        $usersSearch = $_GET['search'];
        
        header('Location: ../categories.php?v='.$usersSearch);
    }
    //---------------------------------------------------------- MIN MAX
}if(isset($_POST['validateMinMax'])){

    if(!empty($_POST['val']) AND !empty($_POST['val2']) AND empty($_POST['searchMinMax'])){
        $min = $_POST['val'];
        $max = $_POST['val2'];
        
        header('Location: ../categories.php?min='.$min.'&max='.$max);
        
    }if(!empty($_POST['val']) AND !empty($_POST['val2']) AND !empty($_POST['searchMinMax'])){
        $min = $_POST['val'];
        $max = $_POST['val2'];
        $search = $_POST['searchMinMax'];

        header('Location: ../categories.php?min='.$min.'&max='.$max.'&v2='.$search);
        
    }

}



//recherhce par categorie

if(isset($_GET['id']) AND !empty($_GET['id']) AND !isset($_GET['v']) AND empty($_GET['v'])){
    $idOfCategorie = $_GET['id'];
    $getAllAnnonces = $bdd->prepare('SELECT * FROM annonces WHERE id_categorie=? ORDER BY id');
    $getAllAnnonces->execute(array($idOfCategorie));
    if($getAllAnnonces->rowCount() > 0){
        
    }else{
        $error =  "Aucune annonce n'a été trouvée.";
    }
    //recherhce par mot clé
}if(isset($_GET['v']) AND !empty($_GET['v']) AND !isset($_GET['id']) AND empty($_GET['id'])){
    $usersSearch = $_GET['v'];
    $getAllAnnonces = $bdd->query('SELECT * FROM annonces WHERE titre LIKE "%'.$usersSearch.'%" ORDER BY id DESC');
    if($getAllAnnonces->rowCount() > 0){
        
    }else{
        $error =  "Aucune annonce n'a été trouvée.";
    }
    
    //recherhce par mot clé plus categorie
}if(isset($_GET['v']) AND !empty($_GET['v']) AND isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfCategorie = $_GET['id'];
    $usersSearch = $_GET['v'];
    $getAllAnnonces = $bdd->prepare('SELECT * FROM annonces WHERE id_categorie=? AND titre LIKE "%'.$usersSearch.'%" ORDER BY id DESC');
    $getAllAnnonces->execute(array($idOfCategorie));
    if($getAllAnnonces->rowCount() > 0){
        
    }else{
        $error =  "Aucune annonce n'a été trouvée.";
    }
    //affiche toutes les annonces sans recherche
}if(!isset($_GET['v']) AND empty($_GET['v']) AND !isset($_GET['id']) AND empty($_GET['id'])){

    $getAllAnnonces = $bdd->query('SELECT * FROM annonces ORDER BY id');
    if($getAllAnnonces->rowCount() > 0){
        
    }else{
        $error =  "Aucune annonce n'a été trouvée.";
    }
    //recherche min et max sans mot clé
}if(isset($_GET['min']) AND !empty($_GET['min']) AND isset($_GET['max']) AND !empty($_GET['max']) AND !isset($_GET['v2']) AND empty($_GET['v2'])){

    $getAllAnnonces = $bdd->prepare('SELECT * FROM annonces WHERE prix >= ? AND prix <= ? ORDER BY id');
    $getAllAnnonces->execute(array($_GET['min'], $_GET['max']));
    if($getAllAnnonces->rowCount() > 0){
        
    }else{
        $error =  "Aucune annonce n'a été trouvée.";
    }
    //recherche min et max avec mot clé
}if(isset($_GET['min']) AND !empty($_GET['min']) AND isset($_GET['max']) AND !empty($_GET['max']) AND isset($_GET['v2']) AND !empty($_GET['v2'])){
    
    $getAllAnnonces = $bdd->prepare('SELECT * FROM annonces WHERE prix >= ? AND prix <= ? AND titre LIKE "%'.$_GET['v2'].'%" ORDER BY id DESC');
    $getAllAnnonces->execute(array($_GET['min'], $_GET['max']));
    if($getAllAnnonces->rowCount() > 0){
        
    }else{
        $error =  "Aucune annonce n'a été trouvée.";
    }
}

