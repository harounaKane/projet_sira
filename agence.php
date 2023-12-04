<?php 

include "_inc.php";



if( isset($_POST['nom']) && empty($_POST['id_agence']) ){
  
     $query = "INSERT INTO agence VALUES(NULL, :nom, :tel, :mail, :adrr, :cp, :ville, :img)";

     extract($_POST);

     $image = loadImg($nom, "agence");

     executerRequete($query, [
          "nom"     => $nom,
          "tel"     => $tel,
          "mail"    => $email,
          "adrr"    => $adresse,
          "cp"      => $cp,
          "ville"   => $ville,
          "img"     => $image
     ]);

     header("location: agence.php");
     exit;
}elseif( isset($_GET['action']) && ctype_digit($_GET['id']) ){
     $id = $_GET['id'];

     if( $_GET['action'] == "update" ){

          if( isset($_POST['nom']) ){
               extract($_POST);
               $image = $img_actuelle;

               //test si nouvelle image
               if( $_FILES['image']['error'] == 0 ){
                    //delete old img
                    if( file_exists("public/img/agence/". $image) ){
                         unlink("public/img/agence/". $image);
                    }

                    $image = loadImg($nom, "agence");
               }

               $q = "UPDATE agence SET nom = :nom, email = :mail, tel = :tel, adresse = :addr, cp = :cp, ville = :ville, image = :img WHERE id_agence = :id";

               executerRequete($q, [
                    "nom"     => $nom,
                    "mail"    => $email,
                    "tel"     => $tel,
                    "addr"    => $adresse,
                    "cp"      => $cp,
                    "ville"   => $ville,
                    "img"     => $image,
                    "id"      => $id_agence
               ]);

               header("location: agence.php");
               exit;
          }

          $agencetoUp = getAgence($id);

     }else if( $_GET['action'] == "delete" ){
          $agenceToDelete = getAgence($id);
          //delete old img
          if( file_exists("public/img/agence/". $image) ){
               unlink("public/img/agence/". $agenceToDelete['image']);
          }

          executerRequete("DELETE FROM agence WHERE id_agence = :id", ["id" => $id]);

          header("location: agence.php");
          exit;
     }
}

$res = executerRequete("SELECT * FROM agence");
$agences = $res->fetchAll();


$title = "Gestion agence";
include "views/_header.php";

include "views/agence/index_agence.php";


include "views/_footer.html";


function getAgence($id){
     
     $q = "SELECT * FROM agence WHERE id_agence = :id";
     $res = executerRequete($q, ["id" => $id]);

     return $res->fetch();
}