<?php 

session_start();
include "config/bd.php";


/**
 * Permet de faire l'execution de toutes mes requêtes (CRUD)
 * prend en parametre une chaine qui est le query et un tableau associatif de données facultatif
 * renvoie le résultat de la requête
 */
function executerRequete($query, $data = null){
     global $pdo;
 
     $statement = $pdo->prepare($query);

     $statement->execute($data);

     return $statement;

}


/**
 * Permet de faire l'inscription membre
 * prend en parametre un tableau
 */
function inscription($data){

     $query = "INSERT INTO membre 
               VALUES(NULL, :prenom, :nom, :log, :mdp, :tel, :mail, :adrr, :cp, :ville, :statut, now())";

          extract($data);
          var_dump($data);
          executerRequete($query, [
               "prenom"  => $prenom,
               "nom"     => $nom,
               "log"     => $login,
               "mdp"     => password_hash($mdp, PASSWORD_DEFAULT),
               "tel"     => $tel,
               "mail"    => $email,
               "adrr"    => $adresse,
               "cp"      => $cp,
               "ville"   => $ville,
               "statut"  => $statut ?? "CLIENT"
          ]);
}

/**
 * Permet de faire la connexion user
 * prend en parametre le login et le mdp
 */
function connexion($login, $mdp){
     $query = "SELECT * FROM membre WHERE login = :login";
     
     $res = executerRequete($query, ['login' => $login]);

     //si le login est correct
     if( $res->rowCount() != 0 ){
          $user = $res->fetch();
          
          //test maintenant sur le mdp
          if( password_verify($mdp, $user['mdp']) ){
               $_SESSION['user'] = $user;
          }
          
     }

}

/**
 * Test si un user est connecté
 * renvoie un bouléen
 */
function isConnected(){
     return (isset( $_SESSION['user']) ) ? true : false;

     /* if( isset($_SESSION['user']) ){
          return true;
     }else{
          return false;
     }
     */
}


/**
 * Test si un user connecté est ADMIN
 * renvoie un bouléen
 */
function isAdmin(){
     return ( isConnected() && $_SESSION['user']['statut'] == "ADMIN" ) 
     ? true 
     : false;

     /* if( isset( isConnected() && $_SESSION['user']['statut'] == "ADMIN" ){
          return true;
     }else{
          return false;
     }
     */
}


function loadImg($nom, $chemin){

     if( isset($_FILES['image']) && $_FILES['image']['error'] == 0 ){
          $extensions = ['jpg', 'jpeg', 'png', 'gif'];
          $infoImage = pathinfo($_FILES['image']['name']);

          if( in_array(strtolower($infoImage['extension']), $extensions) ){
               $path = "public/img/" . $chemin .'/'. $nom.'.'. $infoImage['extension'];

               move_uploaded_file($_FILES['image']['tmp_name'], $path);

               return $nom.'.'. $infoImage['extension'];
          }

     }

     return null;
}