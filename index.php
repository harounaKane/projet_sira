<?php 

include "_inc.php";


$vue = "";

if( isset($_GET['action']) ){
     $action = $_GET['action'];

     if( $action == "logout"  ){
          session_destroy();
          header("location: .");
          exit;
     }

     //si user pas un admin, retour à l'accueil. Pour empecher l'accès aux pages admin
     if( !isAdmin() ){
          header("location: .");
          exit;
     }

     switch($action){
          case "membre":
               
               if( isset($_POST['login']) && empty($_POST['id_membre']) ){                    
                    inscription($_POST);

                    header("location: ?action=membre");
                    exit;
               }

               //gestion : update & delete
               if( isset($_GET['type']) ){
                    if( $_GET['type'] == "delete" ){
                         executerRequete("DELETE FROM membre WHERE id_membre = :id", ["id" => $_GET['id']]);

                         header("location: ?action=membre");
                         exit;
                    }else if( $_GET['type'] == "update" ){

                         //si form est envoyé pour faire un update
                         if( isset($_POST['login']) && !empty($_POST['id_membre']) ){
                              executerRequete("UPDATE membre SET nom = :nom, prenom = :prenom WHERE id_membre = :id",[
                                   "nom"     => $_POST['nom'],
                                   "prenom"  => $_POST['prenom'],
                                   "id"      => $_POST["id_membre"]
                              ] );

                              header("location: ?action=membre");
                              exit;
                         }

                         $res = executerRequete("SELECT * FROM membre WHERE id_membre = :id", ["id" => $_GET['id']]);
                         
                         $user = $res->fetch();
                    }
               }

               $membres = executerRequete("SELECT * FROM membre")->fetchAll();
           
               $vue = "views/membre/index.php";
               break;


          case "vehicule": 
               $vue = "views/vehicule/index.php";
               break;


          case "location": 
               $vue = "views/location/index.php";
               break;
     }
     
}else if( isset($_POST['inscription']) ){
     inscription($_POST);

     header("location: .");
     exit;

}else if( isset($_POST['connexion']) ){
     connexion($_POST['login'], $_POST['mdp']);
}



$title = "Gestion membre";
include "views/_header.php";

if( file_exists($vue) ){
     include $vue;
}

include "views/_footer.html";




