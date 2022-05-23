<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>BreizhCoinCoin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='//fonts.googleapis.com/css?family=Cabin+Condensed' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
include("actions/actionsUser/loginAction.php");
include("actions/actionsCategorie/allCategories.php");
include("actions/actionsAnnonce/selectAnnonces.php");
?>
<div class="wrap">
<div class="header">
	<div class="logo">
		<a href="index.php"><img src="images/logo.png" alt=""> </a>
	</div>
	<div class="header-right">
	<div class="contact-info">
		<ul>
		<?php include("actions/actionsFavoris/infosFavoris.php"); ?>
		</ul>
	</div>
	<div class="menu">
	 	 <ul class="nav">
        <li class="active"><a href="index.php" title="Home">Accueil</a></li>
  		<li><a href="apropos.php">Notre concept</a></li>
  	     <li><a href="categories.php">Annonces</a></li>
  		<li><a href="contact.php">Contact</a></li>
		  <?php 
          if(isset($_SESSION['auth'])){
            ?>
			<li><a href="publiannonce.php">Publier une annonce</a></li>
            <li><a href="moncompte.php?id=<?= $_SESSION['id']; ?>">Mon compte</a></li>
            <?php
          }
        ?>
		<?php 
          if(!isset($_SESSION['auth'])){
            ?>
            <li><a href="sinscrire.php">S'enregistrer</a></li>
            <li><a href="moncompte.php">Mon compte</a></li>
            <?php
          }
        ?>
	    
  		<div class="clear"></div>
      </ul>
	 </div>
	 </div>
	<div class="clear"></div>
</div>
<div class="hdr-btm pad-w3l">
<div class="hdr-btm-bg"></div>
<div class="hdr-btm-left">

	
	<div class="drp-dwn">
		
	<form method="GET">

	<div class="search">
	  
		<input type="text" name="search" placeholder="Ecrire ici..." >

	 
	

		<select class="custom-select" id="select-1" name="tag">
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
		
			<input type="submit" value="Chercher" class="pad-w3l-search" name="val">
		</div>
	  </form>
	</div>
	<div class="txt-right">
		<h3><a href="formTranche.php">Recherche avancée</a></h3>
	</div>
	<div class="clear"></div>
</div>
</div>