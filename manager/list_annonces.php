<?php
include("inc/top.php");
include("actionsManager/actionsAdmin/securite.php");
include("actionsManager/actionsInfos/infos.php");
include("actionsManager/actionsModif/ajouteAnnonce.php");
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
                            $getCountAnnonce = $bdd->prepare('SELECT DISTINCT count(*) as id FROM annonces');
                            $getCountAnnonce->execute(array());}
                        ?>
                                Voici les <?php print_r($getCountAnnonce->fetchColumn()) ; ?> annonces.
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
                                            <th>Modifier</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Numéro</th>
                                            <th>Nom</th>
                                            <th>Modifier</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
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

                                        }?>
                                    </tbody>
                                </table>
                                <div class="card-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <form method="POST" ENCTYPE="multipart/form-data"> 

		
		<br>
		<div class="register-top-grid">

			<h3>Publier une annonce</h3>

			<div>
				<span>Titre<label> :</label></span>
				<input type="text" name="titre"> 
			</div>
            <br>
			<div>
				<span>Description<label> :</label></span>
				<input type="text" name="description"> 
			</div>
            <br>
			<div>
				<span>Prix<label> (tapez seulement un chiffre):</label></span>
				<input type="text" name="prix"> 
			</div>
            <br>
        	<div>
				<span>Image<label> :</label></span>
				<input type="file" name="fichier" id="cfichier" />
			</div>
            <br>
			<div class="clear"> </div>
					  
		</div>
        <br>   
		<div class="drp">

			<select class="custom-select" id="select-5" name="id">
			<option value="">Catégorie</option>
			<?php 
			$getAllCategories = $bdd->query('SELECT * FROM categories ORDER BY id');
			$getAllCategories->execute(array());
				foreach($getAllCategories as $categorie ){
                    
                    ?>
					<option value=<?= $categorie['id']; ?>><?= $categorie['nom']; ?></option>
                    <?php
                }
    		?>
			</select>

		</div>
        <br>
		<div class="clear"> </div>
		<div class="register-but">
				   
			<input type="submit" value="Publier" name="validate">
			<div class="clear"> </div>
				
		</div>
	</form>
    <br>
    <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
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
