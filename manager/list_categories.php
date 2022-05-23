<?php
include("inc/top.php");
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
                                Catégories
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Numéro</th>
                                            <th>Nom</th>
                                            <th>Modifier</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Numéro</th>
                                            <th>Nom</th>
                                            <th>Modifier</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Bijoux</td>
                                            <td><a href="modif_categorie.php?id=1">Modifier</a></td>
                                            <td><a href="delete_categorie.php?id=1">Supprimer</a></td>
                                          
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Jouets</td>
                                            <td><a href="modif_categorie.php?id=2">Modifier</a></td>
                                            <td><a href="delete_categorie.php?id=2">Supprimer</a></td>
                                     
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Jeux</td>
                                            <td><a href="modif_categorie.php?id=3">Modifier</a></td>
                                            <td><a href="delete_categorie.php?id=3">Supprimer</a></td>
                                          
                                        </tr>
                                       
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

                                <!-- fin contenu -->
               
               
<?php
include("inc/bottom.php");
?>
