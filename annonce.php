<?php
include("inc/top.php");
include("actions/actionsAnnonce/oneAnnonce.php");
include("actions/actionsCategorie/allCategories.php");
include("actions/actionsUser/addFav.php");
include("actions/actionsAnnonce/selectAnnonces.php");
?>

<!-- debut de la partie contenu -->
<div class="main">
<div class="details">
				  <div class="product-details">				
					<div class="images_3_of_2">
						<div id="container">
						   <div id="products_example">
							<div id="products">
								<div class="slides_container">
									<a href="annonce.php?id=<?= $annonce_id ?>" target="_blank"><img src="images/<?= $annonce_image ?>" alt=" " height="150" width="260"/></a>
								
								</div>
								<ul class="pagination">
									<!-- <li><a href="annonce.php?id=<?= $annonce_id ?>"><img src="" alt=" " /></a></li> -->
								
                                
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="desc span_3_of_2">
					<h2><?= $annonce_titre ?></h2>
					<p><?= $annonce_description ?></p>					
					<div class="price">
						<p>Prix: <span><?= $annonce_prix ?> €</span></p>
					</div>
				
            
            
				<div class="wish-list">
				<?php
				$getFav = $bdd->prepare('SELECT id FROM favoris WHERE id_annonce = ?'); 
				$getFav->execute(array($_GET['id']));
				$getFav = $getFav->fetchAll();
				if(!$getFav AND isset($_SESSION['auth'])){
				?>
				<form method="POST"> 
				 	
					 <input type="submit" value="Ajouter aux favoris" name="fav">
					 <div class="clear"> </div>
				  
				 </form>
				<?php
				}
				?>
				

				</div>
			</div>
			<div class="clear"></div>
		  </div>

	   
       		
   <div class="content_bottom">
   	<div class="text-h1 top1 btm">
			<h2>Annonces qui pourraient vous intéresser</h2>
	  	</div>
 <div class="div2">
        <div id="mcts1">

		<?php 
			$get3AnnoncesOfSameCategorie = $bdd->prepare('SELECT * FROM annonces WHERE id_categorie=? AND id !=? ORDER BY RAND() LIMIT 3');
    		$get3AnnoncesOfSameCategorie->execute(array($annonce_categorie, $annonce_id));
                while($annonceOneOfTree = $get3AnnoncesOfSameCategorie->fetch()){
                    
                    ?>
					<div class="w3l-img">
					<a href="annonce.php?id=<?= $annonceOneOfTree['id'] ?>"><img src="images/<?= $annonceOneOfTree['image']; ?>" alt="" height="150" width="260"/></a>
					</div>
                    <?php
                }
    	?>
			
			<div class="clear"></div>	
        </div>
   		</div>

    	</div>

        </div>
<div class="sidebar">
<div class="s-main">
	<div class="s_hdr">
		<h2>Categories</h2>
	</div>
	<div class="text1-nav">
		<ul>
			<?php 
			$getAllCategories = $bdd->query('SELECT * FROM categories ORDER BY id');
			$getAllCategories->execute(array());
			foreach($getAllCategories as $categorie ){
                    
                    ?>
					<li><a href="categories.php?id=<?= $categorie['id']; ?>"><?= $categorie['nom']; ?></a></li>
                    <?php
                }
    		?>
	    </ul>
	</div>
</div>
</div>
<div class="clear"></div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

</div>
<!-- fin de la partie contenu -->
<?php
include("inc/bottom.php");
?>