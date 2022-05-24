<?php
include("inc/top.php");
include("actionsManager/actionsAdmin/securite.php");
include("actionsManager/actionsInfos/infos.php");
include("actionsManager/actionsModif/ajouteCat.php");
include("actionsManager/actionsInfos/infosNbAnnonceOfCat.php");
?>


            
            <!--  debut contenu -->
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Catégories</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Catégories</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <?php 
                        if(isset($_SESSION['ad'])){
                            $getCountCat = $bdd->prepare('SELECT DISTINCT count(*) as id FROM categories');
                            $getCountCat->execute(array());}
                        ?>
                                Voici les <?php print_r($getCountCat->fetchColumn()) ; ?> catégories.
                                <?php if(isset($errorMsge)){ echo '<p>'.$errorMsge.'</p>'; } ?>
                            </div>
                            
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Catégories
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Numéro</th>
                                            <th>Nom</th>
                                            <th>Nombre d'annonce dans cette catégorie</th>
                                            <th>Modifier le nom</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Numéro</th>
                                            <th>Nom</th>
                                            <th>Nombre d'annonce dans cette catégorie</th>
                                            <th>Modifier</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        while($cat = $getAllCat->fetch()){
                                        ?>
                                            <tr>
                                                <td><?= $cat['id']; ?></td>
                                                <td><?= $cat['nom']; ?></td>
                                                <td><?php $getCountAnnonceOfCat->execute(array($cat['id']));
                                                    print_r($getCountAnnonceOfCat->fetchColumn()) ;
                                                ?></td>
                                                <td><a href="modif_categorie.php?id=<?= $cat['id']; ?>">Modifier</a></td>    
                                                <td><a href="delete_categorie.php?id=<?= $cat['id']; ?>">Supprimer</a></td>             
                                            </tr>
					
                                        <?php

                                        }?>
                                    </tbody>
                                </table>
                                <div class="card-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Nom :</th>
                                            <form method="POST">
                                            <th><input type="text" name="nameOfCat" /> </th>
                                            <th><input type="submit" name="ajoute" value="Ajouter cette catégorie"/></th>
                                            <form>
                                        </tr>
                                    </thead>
                                    
                                   
                                </table>
                                
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </main>

                                <!-- fin contenu -->
               
               
<?php
include("inc/bottom.php");
?>
