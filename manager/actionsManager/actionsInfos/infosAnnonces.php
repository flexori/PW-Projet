<?php

 require('actionsManager/database.php');

    $getAllAnnonces = $bdd->prepare('SELECT * FROM annonces ORDER BY id');
    $getAllAnnonces->execute(array());

    if($getAllAnnonces->rowCount() > 0){
				
                    while($annonce = $getAllAnnonces->fetch()){
                    ?>
                    <tr>
                        <td><?= $annonce['id']; ?></td>
                        <td><?= $annonce['titre']; ?></td>
                        <td><?= $annonce['description']; ?></td>
                        <td><?= $annonce['prix']; ?> €</td>
                        <td><a href="modif_annonce.php?id=<?= $annonce['id']; ?>">Modifier</a></td>
                        <td><a href="delete_annonce.php?id=<?= $annonce['id']; ?>">Supprimer</a></td>             
                    </tr>
					
                    <?php

                }
			
    
     

    }else{
        $errorMsge = "Aucune annonce trouvée.";
    }

