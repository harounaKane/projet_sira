     
     <main class="container-fluid">
          <div class="row">
               <?php foreach($vehicules as $vehicule): ?>
                    <div class="card col-3 m-2 p-0">
                         <h5 class="card-title"><?= $vehicule['marque'] ?></h5>
                         <img class="card-img-top" src="public/img/vehicule/<?= $vehicule['image'] ?>" alt="">
                         <div class="card-body">
                              <p class="card-text">
                                   Pour <strong><?= $vehicule['prix_journalier'] ?>€</strong> Journée!
                              </p>
                         </div>
                         <a href="louer.php?action=louer&id_vehicule=<?= $vehicule['id_vehicule'] ?>" class="btn btn-primary w-100">Louer</a>
                    </div>
               <?php endforeach; ?>
          </div>
     </main>