<?php
include("inc/top.php");
if(session_id() == '') {
    session_start();
   }
require('actionsManager/database.php');
require('actionsManager/actionsInfos/infos.php');
?>


            
            <!--  debut contenu -->
                <main>
                    <?php 
                        if(isset($_SESSION['ad'])){
                            
                        ?>
                            <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Membres</div>
                                    <div class="card-body">Nombre de membres : <?php print_r($getCountUsers->fetchColumn()) ; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="list_membres.php">En savoir plus</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Catégories</div>
                                    <div class="card-body">Nombre de catégories : <?php print_r($getCountCat->fetchColumn()) ; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="list_categories.php">En savoir plus</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Annonces</div>
                                    <div class="card-body">Nombre d'annonces : <?php print_r($getCountAnnonces->fetchColumn()) ; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="list_annonces.php">En savoir plus</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Admins</div>
                                    <div class="card-body">Nombre d'admins : <?php print_r($getCountAdmin->fetchColumn()) ; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="list_admins.php">En savoir plus</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
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
                            echo "Vous devez être connecté pour pouvoir avoir accès aux informations du panel d'admin.";
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
