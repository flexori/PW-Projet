<?php

 require('actionsManager/database.php');

    $getAllCat = $bdd->prepare('SELECT * FROM categories ORDER BY id');
    $getAllCat->execute(array());
    $errorMsgf = "Aucun e trouvé";

    if($getAllCat->rowCount() > 0){
				
                    while($cat = $getAllCat->fetch()){
                    ?>
                    <tr>
                        <td><?= $cat['id']; ?></td>
                        <td><?= $cat['nom']; ?></td>
                        <td><a href="modif_categorie.php?id=<?= $cat['id']; ?>">Modifier</a></td>
                        <td><a href="delete_categorie.php?id=<?= $cat['id']; ?>">Supprimer</a></td>             
                    </tr>
					
                    <?php

                }
			
    
     

    }else{
        $errorMsge = "Aucune catégorie trouvée.";
    }

