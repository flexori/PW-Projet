<?php
include("inc/top.php");
include("actions/actionsAnnonce/selectAnnonces.php");
include("actions/actionsCategorie/allCategories.php");
?>

<!-- debut de la partie contenu -->
<div class="main">
<div class="ser-main">
<h4>Nos annonces</h4>
<div class="ser-para">
<p>Voici la liste de toutes les annonces du site ou celles triées par catégorie.</p>
</div>
<?php if(isset($error)){ echo '<p>'.$error.'</p>'; } ?>
<?php 
while($annonce = $getAllAnnonces->fetch()){
	
	?>
	<div class="ser-grid-list">
	<h5><?= $annonce['titre']; ?></h5>
	<img src="images/<?= $annonce['image']; ?>" alt="" height="150" width="260">
	<p><?= $annonce['description']; ?></p>
	<div class="btn top"><a href="annonce.php?id=<?= $annonce['id']; ?>">En savoir plus</a></div>
	</div>
	<?php
}
?>


<div class="clear"></div>
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
</div>
<!-- fin de la partie contenu -->
<?php
include("inc/bottom.php");
?>

