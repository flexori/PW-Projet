<?php

require('actions/database.php');

//Récupérer les discussions par défaut sans recherche



if(isset($_GET['id']) AND !empty($_GET['id'])){
    $idOfCategorie = $_GET['id'];
    $getAllAnnonces = $bdd->prepare('SELECT * FROM annonces WHERE id_categorie=? ORDER BY id');
    $getAllAnnonces->execute(array($idOfCategorie));
}else{
    $getAllAnnonces = $bdd->query('SELECT * FROM annonces ORDER BY id');
    $getAllAnnonces->execute(array());
}

if(isset($_POST['val'] )){
    	$idOfCategorie = htmlspecialchars($_POST['id']);
    	$getAllAnnonces = $bdd->prepare('SELECT * FROM annonces WHERE nom=? ORDER BY id');
    	$getAllAnnonces->execute(array($idOfCategorie));

    	header('Location: ../categories.php?id='.$idOfCategorie);
		}
		