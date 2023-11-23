<?php 

include "_inc.php";

$vue = "";

if( isset($_GET['action']) ){
     $action = $_GET['action'];

     switch($action){
          case "membre":
               
               if( isset($_POST['login']) ){
                    $query = "INSERT INTO membre 
                    VALUES(NULL, :prenom, :nom, :log, :mdp, :tel, :mail, :adrr, :cp, :ville, :statut, now())";

                    extract($_POST);
                    executerRequete($query, [
                         "prenom"  => $prenom,
                         "nom"     => $nom,
                         "log"     => $login,
                         "mdp"     => $mdp,
                         "tel"     => $tel,
                         "mail"    => $email,
                         "adrr"    => $adresse,
                         "cp"      => $cp,
                         "ville"   => $ville,
                         "statut"  => $statut
                    ]);

                    header("location: ?action=membre");
                    exit;
               }

               $membres = executerRequete("SELECT * FROM membre")->fetchAll();
           
               $vue = "views/membre/index.html";
               break;
          case "agence": 
               $vue = "views/agence/index.html";
               break;
          case "vehicule": 
               $vue = "views/vehicule/index.html";
               break;
          case "location": 
               $vue = "views/location/index.html";
               break;
     }
     
}

include "views/_header.html";

if( file_exists($vue) ){
     include $vue;
}

include "views/_footer.html";




