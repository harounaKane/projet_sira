<?php 

include "_inc.php";



if( isset($_POST['nom']) ){
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

     header("location: agence.php?action=agence");
     exit;
}

$res = executerRequete("SELECT * FROM agence");
$agences = $res->fetchAll();


$title = "Gestion agence";
include "views/_header.php";

include "views/agence/index_agence.php";


include "views/_footer.html";