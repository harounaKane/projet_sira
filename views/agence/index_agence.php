     
     <main class="container-fluid">
          <table class="table table-striped table-hover table-sm table-bordered">
               <tr class="table-dark">
                    <th>Id Agence</th>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Code p</th>
                    <th>Ville</th>
                    <th>Action</th>
               </tr>

               <?php foreach($agences as $agence): ?>
                    <tr>
                         <td> <?= $agence['id_agence']; ?> </td>
                         <td style="width: 20%;">
                              <img src="public/img/agence/<?= $agence['image']; ?>" alt="" class="img-fluid w-25">
                         </td>
                         <td> <?= $agence['nom']; ?> </td>
                         <td> <?= $agence['tel']; ?> </td>
                         <td> <?= $agence['email']; ?> </td>
                         <td> <?= $agence['adresse']; ?> </td>
                         <td> <?= $agence['cp']; ?> </td>
                         <td> <?= $agence['ville']; ?> </td>
                         <td>
                              <a href="?action=agence&type=update&id=<?= $agence['id_agence']; ?>">Modifier</a>
                              <a href="?action=agence&type=delete&id=<?= $agence['id_agence']; ?>">Supprimer</a>
                         </td>
                    </tr>
               <?php endforeach; ?>

          </table>

          <?php include "views/agence/form.php"; ?>

     </main>