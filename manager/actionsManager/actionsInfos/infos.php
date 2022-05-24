<?php

 require('actionsManager/database.php');

    $getAllCat = $bdd->prepare('SELECT * FROM categories ORDER BY id');
    $getAllCat->execute(array());

    $getAllAnnonces = $bdd->prepare('SELECT * FROM annonces ORDER BY id');
    $getAllAnnonces->execute(array());

    $getCountAnnonces = $bdd->prepare('SELECT DISTINCT count(*) as id FROM annonces');
    $getCountAnnonces->execute(array());

    $getCountUsers = $bdd->prepare('SELECT DISTINCT count(*) as id FROM users');
    $getCountUsers->execute(array());

    $getCountCat = $bdd->prepare('SELECT DISTINCT count(*) as id FROM categories');
    $getCountCat->execute(array());

    $getCountAdmin = $bdd->prepare('SELECT DISTINCT count(*) as id FROM admins');
    $getCountAdmin->execute(array());

