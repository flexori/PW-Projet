<?php

require('actionsManager/database.php');

    $getCountAnnonceOfCat = $bdd->prepare('SELECT DISTINCT count(*) as id FROM annonces WHERE id_categorie = ?');

