<?php
include("inc/top.php");

?>

<!-- debut de la partie contenu -->
<div class="main">
<form method="POST"> 

<?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
<br>
 <div class="register-top-grid">

    <h3>Publier votre annonce :</h3>
     <div>
        <span>Titre<label> :</label></span>
        <input type="text" name="prenom"> 
     </div>
     <div>
        <span>Description<label> :</label></span>
        <input type="text" name="nom"> 
     </div>
     <div>
         <span>Prix<label> :</label></span>
         <input type="text" name="mail"> 
     </div>

     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br><br>
     <br>
     <br>
     <br>
     <br><br>
     <br>
     <br>
     <br>
     <br><br>
     <br>
</form>
</div><!-- fin de la partie contenu -->

<?php
include("inc/bottom.php");
?>