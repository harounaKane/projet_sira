<?php 

include "_inc.php";


if( isset($_GET['action']) ){
     if( $_GET['action'] == "locFinish" ){
          $q = "SELECT location.*, nom, marque, prix_journalier 
                    FROM `location` 
                    INNER JOIN vehicule
                    ON location.id_vehicule = vehicule.id_vehicule
                    INNER JOIN agence
                    ON agence.id_agence = location.id_agence
                    WHERE dateFin < now()";
          $res = executerRequete($q);

          $locations = $res->fetchAll();

     }
}else {
          $q = "SELECT location.*, nom, marque, prix_journalier 
                    FROM `location` 
                    INNER JOIN vehicule
                    ON location.id_vehicule = vehicule.id_vehicule
                    INNER JOIN agence
                    ON agence.id_agence = location.id_agence
                    WHERE dateFin >= now()";
          $res = executerRequete($q);

          $locations = $res->fetchAll();

     }


$title = "Gestion loction";
include "views/_header.php";

include "views/location/gestion_loc.php";

include "views/_footer.html";




