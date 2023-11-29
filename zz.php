<?php 
function executerRequete($query, $data = array()){
     global $pdo;
     $statement = $pdo->prepare($query);
     $statement->execute($data);
     return $statement;
}

$query = "SELECT * FROM membre WHERE prenom = :prenom";
$res = executerRequete($query, ["prenom" => "toto"]);

$query = "DELETE FROM membre WHERE prenom = :prenom";
executerRequete($query, ["prenom" => "jean"]);


executerRequete("SELECT * FROM membre");

