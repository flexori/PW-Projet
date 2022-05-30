<?php
include("inc/top.php");
if(session_id() == '') {
    session_start();
}
require('actionsManager/database.php');
require('actionsManager/actionsInfos/infosStat.php');
?>   
<!--  debut contenu -->
<main>
<?php 
if(isset($_SESSION['ad'])){
    
    ?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Statistiques</h1>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Statistiques</li>
    </ol>
    <div class="row">

    <div class="col-xl-3 col-md-6">
    <div class="card bg-primary text-white mb-4">
    <div class="card-body">Catégorie ayant le nombre d'annonces maximum :</div>
    <div class="card-body"><?php echo $name;?></div>
    <div class="card-footer d-flex align-items-center justify-content-between">
    </div>
    </div>
    </div>
    <div class="col-xl-3 col-md-6">
    <div class="card bg-warning text-white mb-4">
    <div class="card-body">Catégorie ayant le nombre d'annonces minimum :</div>
    <div class="card-body"><?php echo $nameMin;?></div>
    <div class="card-footer d-flex align-items-center justify-content-between">
    </div>
    </div>
    </div>
    <div class="col-xl-3 col-md-6">
    <div class="card bg-success text-white mb-4">
    <div class="card-body">Annonce la plus ancienne :</div>
    <div class="card-body">Numéro : <?php echo $idAnn;?></div>
    <div class="card-body">Titre : <?php echo $nameAnn;?></div>
    <div class="card-footer d-flex align-items-center justify-content-between">
    </div>
    </div>
    </div>

    </div>

    <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Catégories avec le nombre d'annonces sur le mois par ordre croissant
                                </div>
                                <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                            </div>
                        </div>
    <?php
}
?>
<?php 
if(!isset($_SESSION['ad'])){
    ?>
    <br>
    <?php 
    echo "Vous devez être connecté pour pouvoir avoir accès aux statistiques du panel d'admin.";
}
?>

<div class="row">

</div>

</div>
</main>

<!-- fin contenu -->

<?php
include("inc/bottom.php");
?>
