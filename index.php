<?php
include("inc/top.php");
include("actions/actionsAnnonce/selectAnnonce.php");
include("actions/actionsCategorie/allCategories.php");
include("actions/actionsUser/addFav.php");
?>

<!-- debut de la partie contenu -->
<div class="main">
<div class="sidebar">
<div class="s-main">
	<div class="s_hdr">
		<h2>Catégories</h2>
	</div>
	<div class="text1-nav">
		<ul>
			<?php 
                while($categorie = $getAllCategories->fetch()){
                    
                    ?>
					<li><a href="categories.php?id=<?= $categorie['id']; ?>"><?= $categorie['nom']; ?></a></li>
                    <?php
                }
    		?>
	    </ul>
	</div>
</div>


</div>

<div class="content">


	<div class="clear"></div>
	<div class="cnt-main">

		<?php 
          if(!isset($_SESSION['auth'])){
            ?>
            
            <div class="s_btn">
			<ul>
				<li><h2>Bienvenue !</h2></li>
				<li><h3><a href="login.php">Se connecter</a></h3></li>
				<li><h2>Nouveau visiteur ?</h2></li>
				<li><h4><a href="sinscrire.php">S'enregistrer</a></h4></li>
				<div class="clear"></div>
			</ul>
		</div>
            <?php
          }
        ?>

	<div class="grid">
	<div class="grid-img">
		<a href="annonce.php?id=<?= $annonce_id ?>"><img src="images/<?= $annonce_image ?>"  alt=""/></a>
	</div>
	<div class="grid-para">
		<h2>Nouveau sur le site</h2>
		<h3><?= $annonce_titre ?></h3>
		<p><?= $annonce_description ?></p>
		<div class="btn top">
		<a href="annonce.php?id=<?= $annonce_id ?>">Details&nbsp;<img src="images/marker2.png"></a>
		</div>
	</div>
	<div class="clear"></div>
	</div>
</div>
<div class="cnt-main btm">
	<div class="section group">
	<?php 
			$get6Annonces = $bdd->prepare('SELECT * FROM annonces WHERE id !=? ORDER BY RAND() LIMIT 6');
			$get6Annonces->execute(array($annonce_id));
			foreach($get6Annonces as $annonceSix ){
                    
                    ?>
					<div class="grid_1_of_3 images_1_of_3">
					 <a href="annonce.php?id=<?= $annonceSix['id'] ?>"><img src="images/<?= $annonceSix['image']; ?>" alt="" height="70%"/></a>
					 <a href="annonce.php"><h3><?= $annonceSix['titre']; ?></h3></a>
			
					<span class="price left"><sup><?= $annonceSix['prix']; ?>€</sup><sub></sub></span>
				    
					<?php
					$getFavs = $bdd->prepare('SELECT * FROM favoris WHERE id_annonce = ?'); 
					$getFavs->execute(array($annonceSix['id']));
					$getFavs = $getFavs->fetchAll();
					if(!$getFavs AND isset($_SESSION['auth'])){
						?>
						<form method="POST" > 
							 
							 <input type="submit" value="Ajouter aux favoris" name="fav" >
							 
						  
						 </form>
						
				    
					<?php
						}else{
						?>
						<div class="space">
							<br>
						</div>
						
					<?php
						}
						?>
					 
					
				</div>
                    <?php
						
                }
    ?>
	
	</div>
</div>
</div>

<div class="clear"></div>
</div>

<!-- fin de la partie contenu -->
<?php
include("inc/bottom.php");
?>
