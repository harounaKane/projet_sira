<?php 

include "_inc.php";

if( isset($_POST['marque']) ){
     extract($_POST);

     $fileName = loadImg($marque.'-'.time(), "vehicule");

     $query = "INSERT INTO vehicule VALUES(NULL, :marque, :modele, :prix, :desc, :img, :agence)";

     executerRequete($query, [
          "marque"  => $marque,
          "modele"  => $modele,
          "prix"    => $prix_journalier,
          "desc"    => $description,
          "img"     => $fileName,
          "agence"  => $agence
     ]);

     header("location: vehicule.php");
     exit;
}

$res = executerRequete("SELECT vehicule.*, nom AS agence FROM vehicule, agence WHERE id_agence = agence");
$vehicules = $res->fetchAll();

//RECUP AGENCE POUR FORMULAIRE D'AJOUT DE VEHICULE
$res = executerRequete("SELECT * FROM agence");
$agences = $res->fetchAll();


$title = "Gestion véhicule";
include "views/_header.php";

include "views/vehicule/index_vehicule.php";


include "views/_footer.html";