<?php
include("inc/top.php");
include("actions/actionsAnnonce/publiAnnonce.php");
?>

<!-- debut de la partie contenu -->
<div class="main">
<div class="register">
		  	  <form method="POST" ENCTYPE="multipart/form-data"> 

				<?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
				<br>
				 <div class="register-top-grid">
					<h3>Publier une annonce</h3>
					 <div>
						<span>Titre<label> :</label></span>
						<input type="text" name="titre"> 
					 </div>
					 <div>
						<span>Description<label> :</label></span>
						<input type="text" name="description"> 
					 </div>
					 <div>
						 <span>Prix<label> (tapez seulement un chiffre):</label></span>
						 <input type="text" name="prix"> 
					 </div>
                <div>
						 <span>Image<label> :</label></span>
						 <input type="file" name="fichier" id="cfichier" />
					 </div>
					 <div class="clear"> </div>
					  
					 </div>
				   
				

				<div class="clear"> </div>
				<div class="register-but">
				   
					   <input type="submit" value="Publier" name="validate">
					   <div class="clear"> </div>
				
				</div>
				</form>
		   </div>
  <div class="clear"></div>
</div><!-- fin de la partie contenu -->

<?php
include("inc/bottom.php");
?>