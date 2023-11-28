<?php 

include "_inc.php";

$res = executerRequete("SELECT vehicule.*, nom, ville FROM vehicule, agence WHERE id_agence = agence");
$vehicules = $res->fetchAll();


include "views/_header.php";

include "views/accueil.php";

include "views/_footer.html";




