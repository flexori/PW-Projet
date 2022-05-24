<?php
include("inc/top.php");
include("actionsManager/actionsAdmin/securite.php");
include("actionsManager/actionsInfos/infos.php");
include("actionsManager/actionsModif/ajouteAdmin.php");
?>

<!--  debut contenu -->
<main>
<div class="container-fluid px-4">
<h1 class="mt-4">Membres</h1>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
<li class="breadcrumb-item active">Membres</li>
</ol>
<div class="card mb-4">
<div class="card-body">
Voici les <?php print_r($getCountAdmin->fetchColumn()) ; ?> membres.
<?php if(isset($errorMsge)){ echo '<p>'.$errorMsge.'</p>'; } ?>
</div>
</div>
<div class="card mb-4">
<div class="card-header">
<i class="fas fa-table me-1"></i>
Membres
</div>
<div class="card-body">
<table id="datatablesSimple">
<thead>
<tr>
<th>Numéro</th>
<th>Prénom</th>
<th>Nom</th>
<th>E-mail</th>
<th>Modifier</th>
<th>Supprimer</th>
</tr>
</thead>
<tfoot>
<tr>
<th>Numéro</th>
<th>Prénom</th>
<th>Nom</th>
<th>E-mail</th>
<th>Modifier</th>
<th>Supprimer</th>
</tr>
</tfoot>
<tbody>
<?php
while($admin = $getAllAdmins->fetch()){
    ?>
    <tr>
    <td><?= $admin['id']; ?></td>
    <td><?= $admin['prenom']; ?></td>
    <td><?= $admin['nom']; ?></td>
    <td><?= $admin['mail']; ?></td>
    <td><a href="modif_admin.php?id=<?= $admin['id']; ?>">Modifier</a></td>
    <td><a href="delete_admin.php?id=<?= $admin['id']; ?>">Supprimer</a></td>             
    </tr>
    
    <?php
    
}?>
</tbody>
</table>
<div class="card-body">
<form method="POST">
<div class="register-top-grid">

<h3>Ajouter un admin</h3>

<div>
<span>Prénom<label> :</label></span>
<input type="text" name="prenom"> 
</div>
<br>
<div>
<span>Nom<label> :</label></span>
<input type="text" name="nom"> 
</div>
<br>
<div>
<span>E-mail<label> :</label></span>
<input type="text" name="mail"> 
</div>
<br>
<div>
<span>Password<label> :</label></span>
<input type="text" name="password"/>
</div>
<br>
<div>
<span>Retapez votre password<label> :</label></span>
<input type="text" name="passwordtwo"/>
</div>
<br>
<div class="clear"> </div>
<input type="submit" value="Ajouter" name="validate">
<div class="clear"> </div>		
<br>  
</div>
</form>
<br>
<?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>

</div>
</div>
</div>
</div>
</main>

<!-- fin contenu -->


<?php
include("inc/bottom.php");
?>
