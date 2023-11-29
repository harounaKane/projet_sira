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

}else if( isset($_POST['filtreAgence']) ){
     $res = executerRequete("SELECT vehicule.*, nom AS agence FROM vehicule, agence WHERE id_agence = agence AND id_agence = :filtre", ["filtre" => $_POST['filtreAgence']]);

     $vehicules = $res->fetchAll();

}else if( isset($_GET['action']) && $_GET['action'] == "filtre" ){
     $res = executerRequete("SELECT vehicule.*, nom AS agence FROM vehicule, agence WHERE id_agence = agence AND id_agence = :filtre", ["filtre" => $_GET['id_agence']]);

     $vehicules = $res->fetchAll();

}
else{
     $res = executerRequete("SELECT vehicule.*, nom AS agence FROM vehicule, agence WHERE id_agence = agence");
     $vehicules = $res->fetchAll();
}

//RECUP AGENCE POUR FORMULAIRE D'AJOUT DE VEHICULE
$res = executerRequete("SELECT * FROM agence");
$agences = $res->fetchAll();


$title = "Gestion véhicule";
include "views/_header.php";

include "views/vehicule/index_vehicule.php";


include "views/_footer.html";