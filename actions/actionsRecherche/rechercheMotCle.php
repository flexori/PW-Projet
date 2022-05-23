<?php

require('actions/database.php');

if(isset($_GET['search']) AND !empty($_GET['search'])){

    //La recherche
    $usersSearch = $_GET['search'];

    //Récupérer toutes les discussions qui correspondent à la recherche (en fonction du titre)
    $getAllAnnoncesFromSearch = $bdd->query('SELECT * FROM annonces WHERE titre LIKE "%'.$usersSearch.'%" ORDER BY id DESC');
    
}
if(isset($_GET['search']) AND !empty($_GET['search']) AND isset($_POST['val'] )){

    //La recherche
    $usersSearch = $_GET['search'];
    $idOfCategorie = htmlspecialchars($_POST['id']);
    //Récupérer toutes les discussions qui correspondent à la recherche (en fonction du titre)
    $getAllAnnoncesFromSearch = $bdd->query('SELECT * FROM annonces WHERE id_categorie='.$idOfCategorie.' AND titre LIKE "%'.$usersSearch.'%" ORDER BY id DESC');
    header('Location: ../categories.php?id='.$idOfCategorie);
}