<?php
include("inc/top.php");
include("actions/actionsAnnonce/selectAnnonces.php");
?>
<!-- debut de la partie contenu -->
<div class="main">

<div>

<form method="POST">

    <span>Prix minimum<label> :</label></span><br><br>
    <input type="range" value="5000" min="1" max="10000" id="range" oninput="rangenumber.value=value" name="val"/>
    <input type="number" id="rangenumber" min="1" max="10000" value="5000" oninput="range.value=value">
    <br><br>
    <span>Prix maximum<label> :</label></span><br><br>
    <input type="range" value="5000" min="1" max="10000" id="range2" oninput="rangenumber2.value=value" name="val2"/>
    <input type="number" id="rangenumber2" min="1" max="10000" value="5000" oninput="range2.value=value">
    <br><br>
    <input type="text" name="searchMinMax" placeholder="Ecrire ici..." >
    <br><br>
    <input type="submit" value="Chercher" name="validateMinMax">
    
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>

<div class="clear"></div>
</div>
<!-- fin de la partie contenu -->
<?php
include("inc/bottom.php");
?>
