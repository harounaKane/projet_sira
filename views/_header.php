<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="public/css/style.css">
     <title>Projet SIRA - <?= $title ?? "" ?> </title>
</head>
<body>
     <header class="bg-dark p-4 mb-3">
          <div class="d-flex justify-content-between align-items-center">
               <h1><a href="." class="text-light">Sira</a></h1>
               <div class="text-light text-end"> <?= $_SESSION['user']['prenom'] ?? '' ?> </div>
          </div>
          <?php if( !isConnected() ): ?>
               <div class="m-2 text-center">
                    <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#logonModal">Inscription</a>
                    <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#loginModal">Connexion</a>
               </div>
          <?php endif; ?>
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <div class="container-fluid">
                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if( isAdmin() ): ?>
                         <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Gestion
                         </a>
                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li>
                                   <a class="dropdown-item" href="membre.php?action=membre">Membre</a>
                              </li>
                              <li>
                                   <a class="dropdown-item" href="agence.php">Agence</a>
                              </li>
                              <li>
                                   <a class="dropdown-item" href="vehicule.php">Véhicule</a>
                              </li>
                              <li>
                                   <a class="dropdown-item" href="location.php">Location</a>
                              </li>
                         </ul>
                         </li>
                         <li class="nav-item dropdown">
                                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                   Stat
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                   <li>
                                        <a class="dropdown-item" href="stat.php?action=statVehicule">Véhicule en location</a>
                                   </li>
                                   <li>
                                        <a class="dropdown-item" href="stat.php?action=statAgence">Réservation par Agence</a>
                                   </li>
                              </ul>
                         </li>
                    <?php endif; ?>
                    <?php if( isConnected() ): ?>
                         <li class="nav-item">
                              <a class="nav-link" href="membre.php?action=logout" tabindex="-1" aria-disabled="true">Deconnexion</a>
                         </li>
                    <?php endif; ?>
                     <li class="nav-item">
                       <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Contact</a>
                     </li>
                   </ul>
                   <form class="d-flex">
                     <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                     <button class="btn btn-outline-success" type="submit">Search</button>
                   </form>
                 </div>
               </div>
             </nav>
     </header>


     <!-- MODAL INSCRIPTION -->
     <div class="modal fade" id="logonModal" tabindex="-1" aria-labelledby="logonModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="logonModalLabel">Inscription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                    <form action="membre.php" method="post">
                         <input type="hidden" name="idChambre" value="">
                         <div class="row">
                              <div class="form-group col-6">
                                   <label for="">Nom</label>
                                   <input type="text" name="nom" class="form-control">
                              </div>
          
                              
                              <div class="form-group col-6">
                                   <label for="">Prénom</label>
                                   <input type="text" name="prenom" class="form-control">
                              </div>

                              <div class="form-group col-6">
                                   <label for="">Login</label>
                                   <input type="text" name="login" class="form-control">
                              </div>

                              <div class="form-group col-6">
                                   <label for="">Password</label>
                                   <input type="password" name="mdp" class="form-control">
                              </div>
          
                              <div class="form-group col-6">
                                   <label for="">Email</label>
                                   <input type="email" name="email" class="form-control">
                              </div>
          
                              
                              <div class="form-group col-6">
                                   <label for="">Téléphone</label>
                                   <input type="text" name="tel" class="form-control">
                              </div>
                         </div>
                         <div class="row">
                              <div class="form-group col-12">
                                   <label for="">Adresse</label>
                                   <input type="text" name="adresse" class="form-control">
                              </div>
                         </div>
                         <div class="row mb-3">
                              <div class="form-group col-6">
                                   <label for="">Code postal</label>
                                   <input type="text" name="cp" class="form-control">
                              </div>
                              <div class="form-group col-6">
                                   <label for="">Ville</label>
                                   <input type="text" name="ville" class="form-control">
                              </div>
                         </div>
     
                         <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                         <button name="inscription" value="inscription" type="submit" class="btn btn-primary">Envoyer</button>

                    </form>
              </div>
              <div class="modal-footer">
              </div>
            </div>
          </div>
        </div>

        
     <!-- MODAL Connexion -->
     <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Connexion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                    <form id="annuler" action="membre.php" method="post">
                         <div class="row mb-3">
                              <div class="form-group col-6">
                                   <label for="">Login</label>
                                   <input type="text" name="login" class="form-control">
                              </div>

                              <div class="form-group col-6">
                                   <label for="">Password</label>
                                   <input type="password" name="mdp" class="form-control">
                              </div>
                         </div>
                         
     
                         <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                         <button name="connexion" value="connexion" type="submit" class="btn btn-primary">Envoyer</button>

                         <a href="" class="noCompte" data-bs-toggle="modal" data-bs-target="#logonModal">S'inscrire si pas de compte</a>

                    </form>
              </div>
              <div class="modal-footer">
              </div>
            </div>
          </div>
        </div>

        <script>
          document.getElementsByClassName("noCompte")[0].addEventListener('click', () => {
               document.getElementById("loginModal").style.display = "none";
              // document.getElementById("annuler").submit();
          })
        </script>