<?php
if(session_id() == '') {
	session_start();
}
require('actions/database.php');

if(isset($_POST['fav'])){

	$idOfAnnonce = $annonceSix['id'];
	$insertFavOfUser = $bdd->prepare('INSERT INTO favoris(id_user, id_annonce)VALUES(?, ?)');
	$insertFavOfUser->execute(array($_SESSION['id'], $idOfAnnonce));
	
	header('Location: ../favoris.php?id='.$_SESSION['auth']);
}