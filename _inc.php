<?php 

include "config/bd.php";

function executerRequete($query, $data = null){
     global $pdo;

     $statement = $pdo->prepare($query);

     $statement->execute($data);

     return $statement;

}