     
     <main class="container-fluid">
          <table class="table table-striped table-hover table-sm table-bordered">
               <tr class="table-dark">
                    <th>Id Véhicule</th>
                    <th>Image</th>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Prix</th>
                    <th>Agence</th>
                    <th>Action</th>
               </tr>

               <?php foreach($vehicules as $vehicule): ?>
                    <tr>
                         <td> <?= $vehicule['id_vehicule']; ?> </td>
                         <td style="width: 20%;">
                              <img src="public/img/vehicule/<?= $vehicule['image']; ?>" alt="" class="img-fluid w-25">
                         </td>
                         <td> <?= $vehicule['marque']; ?> </td>
                         <td> <?= $vehicule['modele']; ?> </td>
                         <td> <?= $vehicule['prix_journalier']; ?> </td>
                         <td> <?= $vehicule['agence']; ?> </td>
                         <td>
                              <a href="?action=vehicule&type=update&id=<?= $vehicule['id_vehicule']; ?>">Modifier</a>
                              <a href="?action=vehicule&type=delete&id=<?= $vehicule['id_vehicule']; ?>">Supprimer</a>
                         </td>
                    </tr>
               <?php endforeach; ?>

          </table>

          <?php include "views/vehicule/form.php"; ?>

     </main>