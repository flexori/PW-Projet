<?php
include("inc/top.php");
include("actions/actionsCategorie/allCategories.php");
?>

<!-- debut de la partie contenu -->
<div class="main">
<div class="about">
<div class="abt_para">
<a href="index.php"><h3>Notre site de petites annonces</h3></a>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore orem ipsum dolor sit amet, consectetur dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
<div class="btn top-right"><a href="#">En savoir plus</a></div>
</div>
<div class="abt_img">
<img src="images/favicon-32x32.png">
</div>
<div class="clear"></div>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore orem ipsum dolor sit amet, consectetur dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididuntLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore orem ipsum dolor sit amet, consectetur dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore orem ipsum dolor sit amet, consectetur dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore orem ipsum dolor sit amet, consectetur dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
<div class="btn top-right"><a href="#">En savoir plus</a></div>
</div>
<div class="sidebar">
<div class="s-main">
<div class="s_hdr">
<h2>Catégories</h2>
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