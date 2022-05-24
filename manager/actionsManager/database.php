<?php
try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=pw;charset=utf8;', 'root', '');
}catch(Exception $e){
    die('Une erreur a été trouvée : ' . $e->getMessage());
}
