<?php
require('actionsManager/actionsModif/modif_categorie.php');
?>

<div class="main">
     <div class="register">
	
				 <form method="POST"> 

				<?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>

                <br>
	
				<div class="register-top-grid">
					<h3>Modifier les informations de la catégorie :</h3>
					 <div>
						<span>Nouveau numéro<label> :</label></span>
						<input type="text" name="num"> 
					 </div>
					 <div>
						<span>Nouveau nom<label> :</label></span>
						<input type="text" name="nom"> 
					 </div>
				</div>

				<div class="clear"> </div>
				<div class="register-but">
				   
					   <input type="submit" value="Enregistrer" name="valModif">
					   <div class="clear"> </div>
				
				</div>
				</form>

			
		   </div>
  <div class="clear"></div>
</div>