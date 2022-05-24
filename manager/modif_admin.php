<?php
include("inc/top.php");
require('actionsManager/actionsModif/modif_admin.php');
?>

<div class="main">
     <div class="register">
	
				 <form method="POST"> 

				<?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>

                <br>
	
				<div class="register-top-grid">
					<h3>Modifier les informations de l'admin :</h3>
					 <div>
						<span>Nouveau prénom<label> :</label></span>
						<input type="text" name="prenom"> 
					 </div>
                     <div>
						<span>Nouveau nom<label> :</label></span>
						<input type="text" name="nom"> 
					 </div>
                     <div>
						<span>Nouveau mail<label> :</label></span>
						<input type="text" name="mail"> 
					 </div>
				</div>

				<div class="clear"> </div>
				<div class="register-but">
				   
					   <input type="submit" value="Enregistrer" name="valModifAdmin">
					   <div class="clear"> </div>
				
				</div>
				</form>

			
		   </div>
  <div class="clear"></div>
</div>
<?php
include("inc/bottom.php");
?>