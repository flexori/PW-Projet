<?php

// 1ere requete

 require('actionsManager/database.php');
 $getIdOfCat = $bdd->prepare('SELECT id_categorie FROM annonces GROUP BY id_categorie ORDER BY COUNT(id_categorie) DESC LIMIT 1');
 $getIdOfCat->execute(array());
 
 foreach( $getIdOfCat as $lo){
     $id = $lo['id_categorie'];
 }
 $getCat = $bdd->prepare('SELECT nom FROM categories WHERE id=?');
 $getCat->execute(array($id));

 foreach( $getCat as $o){
     $name = $o['nom'];
 }


// 2eme requete

$getIdOfCatMin = $bdd->prepare('SELECT id_categorie FROM annonces GROUP BY id_categorie ORDER BY COUNT(id_categorie) LIMIT 1');
$getIdOfCatMin->execute(array());
 
 foreach( $getIdOfCatMin as $lo){
     $idMin = $lo['id_categorie'];
 }
 $getCatMin = $bdd->prepare('SELECT nom FROM categories WHERE id=?');
 $getCatMin->execute(array($idMin));

 foreach( $getCatMin as $o){
     $nameMin = $o['nom'];
 }

 // 3eme requete

$getAnnonceAncienne = $bdd->prepare('SELECT MIN(date), id, titre FROM annonces');
$getAnnonceAncienne->execute(array());

foreach( $getAnnonceAncienne as $lo){
    $idAnn = $lo['id'];
    $nameAnn = $lo['titre'];
}