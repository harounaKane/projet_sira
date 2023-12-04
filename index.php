<?php 

include "_inc.php";

$res = executerRequete("SELECT 
                         COUNT(*) AS loc,
                         vehicule.*, 
                         nom, 
                         ville, dateFin 
                    FROM vehicule 
                    LEFT JOIN location 
                    ON vehicule.id_vehicule = location.id_vehicule
                    INNER JOIN agence 
                    ON agence.id_agence = agence
                    GROUP BY vehicule.id_vehicule");


$vehicules = $res->fetchAll();

include "views/_header.php";

include "views/accueil.php";

include "views/_footer.html";




