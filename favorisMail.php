<html>
<body onload="window.print()">
<h1>MES FAVORIS</h1>
<?php
include("actions/actionsCategorie/allCategories.php");
require('actions/database.php');

//Récupérer l'identifiant de l'utilisateur
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $idOfUser = $_GET['id'];



    //Vérifier si l'utilisateur existe
    $getMail = $bdd->prepare('SELECT mail FROM users WHERE id=?');
    $getMail->execute(array($idOfUser));
    while($m = $getMail->fetch()){

        $mail = $m['mail'];
            
    }
    

    $headers = "From:me\n";
    $headers .= "MIME-version: 1.0\n";
    $headers .= "Content-type: text/html; charset= UTF-8\n";

    $getAllFavoris = $bdd->prepare('
    SELECT DISTINCT annonces.id, favoris.id, titre, description, prix, image, date, id_categorie FROM ( annonces
    INNER JOIN favoris ON annonces.id = favoris.id_annonce )
    WHERE annonces.id_user=?
    GROUP BY annonces.id');
    $getAllFavoris->execute(array($idOfUser));
    $contenu = '<table>';
    if($getAllFavoris->rowCount() > 0){
        //Récupérer toutes les données de l'utilisateur
        	
                while($favoris = $getAllFavoris->fetch()){

                    $contenu .= '<tr><td>'.$favoris['titre'].'</td><td>'.$favoris['image'].'</td><td>'.$favoris['description'].'</td><td>'.$favoris['prix'].' €</td></tr>';
                        
                }
                $contenu .= '</table>';
    
                mail(''.$mail, 'Mes favoris', $contenu, $headers);

    }else{
        echo "Aucun favoris trouvé.";
    }

}
?>
</body>
</html>