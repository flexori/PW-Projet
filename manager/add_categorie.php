<?php
include("inc/top.php");
require('actionsManager/actionsModif/ajouteCat.php');
?>


            
            <!--  debut contenu -->
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Catégories</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Catégories</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                ici, un message possible pour vos actions
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Ajouter une catégorie
                            </div>
                            <div class="card-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Nom </th>
                                            <form method="POST" >
                                            <th><input type="text" name="nameOfCat" value="" /> </th>
                                            <th><input  type="submit" name="ajoute" value="Ajouter cette catégorie"/></th>
                                            <form>
                                        </tr>
                                    </thead>
                                    
                                   
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </main>

                                <!-- fin contenu -->
               
               
<?php
include("inc/bottom.php");
?>
