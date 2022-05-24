<?php
include("inc/top.php");
require('actionsManager/actionsModif/modif_annonce.php');
?>

<div class="main">
     <div class="register">
	
				 <form method="POST"> 

				<?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>

                <br>
	
				<div class="register-top-grid">
					<h3>Modifier les informations de l'annonce :</h3>
					 <div>
						<span>Nouveau titre<label> :</label></span>
						<input type="text" name="titre"> 
					 </div>
					 <div>
						<span>Nouvelle description<label> :</label></span>
						<input type="text" name="description"> 
					 </div>
                     <div>
						<span>Nouveau prix<label> :</label></span>
						<input type="text" name="prix"> 
					 </div>
				</div>

				<div class="clear"> </div>
				<div class="register-but">
				   
					   <input type="submit" value="Enregistrer" name="valModifAnnonce">
					   <div class="clear"> </div>
				
				</div>
				</form>

			
		   </div>
  <div class="clear"></div>
</div>
<?php
include("inc/bottom.php");
?>