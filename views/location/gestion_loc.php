     <main class="container-fluid">
          <h2 class="text-center">Gestion location de véhicule</h2>

          <div class="my-2">
               <a href="location.php" class="btn btn-outline-success">Locations en cours</a>
               <a href="location.php?action=locFinish" class="btn btn-outline-success">Locations terminées</a>
          </div>
          
          <table class="table table-striped">
               <tr class="table-dark">
                    <th>Véhicule</th>
                    <th>Agence</th>
                    <th>Début</th>
                    <th>Fin</th>
                    <th>Prix/jour</th>
                    <th>jours</th>
                    <th>Total</th>
                    <th>Action</th>
               </tr>

               <?php foreach($locations as $loc): ?>
                    <tr>
                         <td> <?= $loc['marque'] ?> </td>
                         <td> <?= $loc['nom'] ?> </td>
                         <td> <?= $loc['dateDebut'] ?> </td>
                         <td> <?= $loc['dateFin'] ?> </td>
                         <td> <?= $loc['prix_journalier'] ?> </td>
                         <td> <?= nbJour($loc['dateDebut'], $loc['dateFin'] );?> </td>
                         <td> <?= $loc['total'] ?> </td>
                         <td> <?= $loc['marque'] ?> </td>
                    </tr>
               <?php endforeach; ?>

          </table>

     </main>

  