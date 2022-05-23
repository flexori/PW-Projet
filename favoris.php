<?php
include("inc/top.php");
include("actions/actionsCategorie/allCategories.php");

?>

<!-- debut de la partie contenu -->
<div class="main">
<div class="ser-main">
	<h4>Vos favoris</h4>
	<div class="ser-para">
	<p>Qsi turpis, pellentesque at ultrices in, dapibus in magna. Nunc easi diam risus, placerat ut scelerisque et,sus cipit eu ante. Nullam vitae dolor ullcper felises cursus gravida. Cras felis elit, pellentesqi amet. sus cipit eu ante. </p>
	</div>

    
	<div class="clear">	
	<?php include("actions/actionsUser/favorisUser.php");?>
    <?php 
          if(isset($_SESSION['auth'])){
            ?>
			<div class="btn top"><a href="impression.php?id=<?= $_SESSION['id']; ?>">Imprimer mes favoris</a></div></div>
			
			<div class="btn top"><a href="favorisMail.php?id=<?= $_SESSION['id']; ?>">M'envoyer mes favoris par mail</a></div></div>
            <?php
          }
        ?>
		
	
	
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
</div>
<!-- fin de la partie contenu -->
<?php
include("inc/bottom.php");
?>

