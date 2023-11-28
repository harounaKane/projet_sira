<?php 

include "_inc.php";


if( isset($_GET['action']) ){
     $action = $_GET['action'];
     if( $action == "logout"  ){
          session_destroy();
          header("location: .");
          exit;
     }
}

//inscription / ajout  
if( isset($_POST['login']) && empty($_POST['id_membre']) && !isset($_POST['connexion']) ){                    
     inscription($_POST);

     header("location: membre.php");
     exit;

}else if( isset($_POST['connexion']) ){
     connexion($_POST['login'], $_POST['mdp']);

     header("location: .");
     exit;
}

//gestion : update & delete
if( isset($_GET['type']) ){
     if( $_GET['type'] == "delete" ){
          executerRequete("DELETE FROM membre WHERE id_membre = :id", ["id" => $_GET['id']]);

          header("location: membre.php");
          exit;
     }else if( $_GET['type'] == "update" ){


          
          // en 2nd
          //si form est envoyé pour faire un update
          if( isset($_POST['login']) && !empty($_POST['id_membre']) ){
               executerRequete("UPDATE membre SET nom = :nom, prenom = :prenom WHERE id_membre = :id",[
                    "nom"     => $_POST['nom'],
                    "prenom"  => $_POST['prenom'],
                    "id"      => $_POST["id_membre"]
               ] );

               header("location: membre.php");
               exit;
          }

          // en 1er

          $res = executerRequete("SELECT * FROM membre WHERE id_membre = :id", ["id" => $_GET['id']]);
          
          $user = $res->fetch();
     }
}

$membres = executerRequete("SELECT * FROM membre")->fetchAll();
      


//si user pas un admin, retour à l'accueil. Pour empecher l'accès aux pages admin
if( !isAdmin() ){
     header("location: .");
     exit;
}

$title = "Gestion membre";
include "views/_header.php";

include "views/membre/index.php";


include "views/_footer.html";




