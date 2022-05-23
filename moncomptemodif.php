<?php
include("inc/top.php");
include("actions/actionsUser/securite.php");
include("actions/actionsUser/modifInfosUser.php");

?>

<!-- debut de la partie contenu -->

<div class="main">
     <div class="register">
	
				 <form method="POST"> 

				<?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>

                <br>
	
				<div class="register-top-grid">
					<h3>Changez vos informations</h3>
					 <div>
						<span>Nouveau Prénom<label>*</label></span>
						<input type="text" name="prenom"> 
					 </div>
					 <div>
						<span>Nouveau Nom<label>*</label></span>
						<input type="text" name="nom"> 
					 </div>
					 <div>
						 <span>Nouveau Email<label>*</label></span>
						 <input type="text" name="mail"> 
					 </div>
                     <div>
						 <span>Nouveau Mot de passe<label>*</label></span>
						 <input type="text" name="password"> 
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
<!-- fin de la partie contenu -->
<?php
include("inc/bottom.php");
?>