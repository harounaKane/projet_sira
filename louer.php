<?php 

include "_inc.php";

if( isset($_GET['id_vehicule'])){
     $res = executerRequete("SELECT vehicule.*, nom, ville FROM vehicule, agence WHERE id_agence = agence AND id_vehicule = :id_v", ["id_v" => $_GET['id_vehicule']]);

     $vehicule = $res->fetch();

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


function nbJour($dd, $df){
    
     $d = strtotime($dd);
     $f = strtotime($df);
     $j = $f - $d;
     return $j / 1000 * 60 *60*24;
}

