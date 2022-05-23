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

    <?php include("actions/actionsUser/favorisUser.php");?>
    
	<div class="clear">	<div class="btn top"><a href="favoris_imprimer.php">Imprimer mes favoris</a></div></div>
	</div>
	
<div class="sidebar">
<div class="s-main">
	<div class="s_hdr">
		<h2>Categories</h2>
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
<div class="clear"></div>
</div>
<!-- fin de la partie contenu -->
<?php
include("inc/bottom.php");
?>

