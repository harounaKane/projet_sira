<?php 

include "_inc.php";

if( isset($_GET['id_vehicule'])){
     $res = executerRequete("SELECT 
     v.*, nom, ville, dateFin 
     FROM vehicule v
     LEFT JOIN location l
     ON v.id_vehicule = l.id_vehicule  
     INNER JOIN agence a 
     ON a.id_agence = agence 
     AND v.id_vehicule = :id_v", [
          "id_v" => $_GET['id_vehicule']
     ]);

     $vehicule = $res->fetch();

     var_dump($vehicule);

     if( isset($_POST['dateDebut']) ){
          extract($_POST);

          $query = "INSERT INTO `location`(id_client, id_vehicule, id_agence, dateDebut,dateFin,	total) VALUES(:client, :vehicule, :agence, :debut, :fin, :total)";

          executerRequete($query, [
               "client"       => $id_client,
               "vehicule"     => $id_vehicule,
               "agence"       => $id_agence,
               "debut"        => $dateDebut,
               "fin"          => $dateFin,
               "total"        => $total
          ]);

          header("location: .");
          exit;
     }
}

include "views/_header.php";

include "views/location/vueLouer.php";

include "views/_footer.html";
