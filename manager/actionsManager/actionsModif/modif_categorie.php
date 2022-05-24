<?php
if(session_id() == '') {
    session_start();
   }
   require('actionsManager/database.php');

//echo "test";
if(isset($_POST['valModif'])){

    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['num']) AND !empty($_POST['nom'])){
        
        if(isset($_GET['id']) AND !empty($_GET['id'])){
        $idOfCat = $_GET['id'];
        //Les données de l'user
        $user_num = htmlspecialchars($_POST['num']);
        $user_nom = htmlspecialchars($_POST['nom']);
            
            //Insérer l'utilisateur dans la bdd

            $req = $bdd->prepare('UPDATE categories SET id = :nvnum, nom = :nv_nom WHERE id = :idCat');
            $req->execute(array(

                'nvnum' => $user_num,
                'nv_nom' => $user_nom,
                'idCat' => $idOfCat
         
                ));

            //$bdd->exec('UPDATE users SET prenom='.$user_prenom.', nom='.$user_nom.', mail='.$user_mail.', password='.$user_password.' WHERE id='.$idOfUser);
        
            header('Location: ../manager/list_categories.php');


        }else{
            $errorMsg = "Aucune categorie trouvée.";
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}
