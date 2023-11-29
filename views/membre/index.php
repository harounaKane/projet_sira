
     <main class="container-fluid">
          <table class="table table-striped table-hover table-sm table-bordered">
               <tr class="table-dark">
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Login</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Ville</th>
                    <th>Statut</th>
                    <th>Date</th>
                    <th>Action</th>
               </tr>

               <?php foreach($membres as $membre): ?>
                    <tr>
                         <td> <?= $membre['prenom']; ?> </td>
                         <td> <?= htmlentities($membre['nom']); ?> </td>
                         <td> <?= $membre['login']; ?> </td>
                         <td> <?= $membre['tel']; ?> </td>
                         <td> <?= $membre['email']; ?> </td>
                         <td> <?= $membre['ville']; ?> </td>
                         <td> <?= $membre['statut']; ?> </td>
                         <td> <?= $membre['date_inscription']; ?> </td>
                         <td>
                              <a href="?action=membre&type=update&id=<?= $membre['id_membre']; ?>">Modifier</a>
                              <a href="?action=membre&type=delete&id=<?= $membre['id_membre']; ?>">Supprimer</a>
                         </td>
                    </tr>
               <?php endforeach; ?>

          </table>

          <?php include "views/membre/form.php"; ?>

     </main>