<?php 

include "_inc.php";

if( isset($_GET['action']) ){
     if( $_GET['action'] == "statVehicule" ){
          $q = "SELECT vehicule.image, COUNT(*) AS ttLocation, marque, nom 
                FROM `location` 
                INNER JOIN vehicule
                ON location.id_vehicule = vehicule.id_vehicule
                INNER JOIN agence
                ON agence.id_agence = location.id_agence
                GROUP BY location.id_vehicule ";
          $res = executerRequete($q);

          $stat = $res->fetchAll();

          var_dump($stat);

     }elseif( $_GET['action'] == "statAgence" ){
          $q = "SELECT nom, COUNT(*) AS ttRes
                FROM `location`
                INNER JOIN agence
                ON location.id_agence = agence.id_agence
                GROUP BY nom";

          
          $res = executerRequete($q);

          $stat = $res->fetchAll();

          var_dump($stat);
     }
}

include "views/_header.php";


include "views/_footer.html";




