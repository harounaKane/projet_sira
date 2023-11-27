
<form action="" method="post">
     <input type="hidden" name="id_membre" value="<?= $user['id_membre'] ?? ''; ?>">
     <div class="row">
          <div class="form-group col-6">
               <label for="">Nom</label>
               <input type="text" name="nom" value="<?= $user['nom'] ?? ''; ?>" class="form-control">
          </div>

          
          <div class="form-group col-6">
               <label for="">Prénom</label>
               <input type="text" name="prenom" value="<?= $user['prenom'] ?? ''; ?>" class="form-control">
          </div>

          <div class="form-group col-6">
               <label for="">Login</label>
               <input type="text" name="login" value="<?= $user['login'] ?? ''; ?>" class="form-control">
          </div>

          <div class="form-group col-6">
               <label for="">Password</label>
               <input type="password" name="mdp" class="form-control">
          </div>

          <div class="form-group col-6">
               <label for="">Email</label>
               <input type="email" name="email" value="<?= $user['email'] ?? ''; ?>" class="form-control">
          </div>

          
          <div class="form-group col-6">
               <label for="">Téléphone</label>
               <input type="text" name="tel" value="<?= $user['tel'] ?? ''; ?>" class="form-control">
          </div>
     </div>
     <div class="row">
          <div class="form-group col-6">
               <label for="">Adresse</label>
               <input type="text" name="adresse" value="<?= $user['adresse'] ?? ''; ?>" class="form-control">
          </div>
          <div class="form-group col-6">
               <label for="">Code postal</label>
               <input type="text" name="cp" value="<?= $user['cp'] ?? ''; ?>" class="form-control">
          </div>
     </div>
     <div class="row mb-3">
          <div class="form-group col-6">
               <label for="">Ville</label>
               <input type="text" name="ville" value="<?= $user['ville'] ?? ''; ?>" class="form-control">
          </div>
          <div class="col-6 mt-4">
               <label for="">Statut : </label>
               <div class="form-check-inline">
                    <input type="radio" name="statut" value="ADMIN" id="admin" class="form-group" <?= isset($user) && $user['statut'] == "ADMIN" ? 'checked' : ''?> >
                    <label for="admin"> Admin</label>
               </div>
               <div class="form-check-inline">
                    <input type="radio" name="statut" value="CLIENT" id="client" class="form-group" <?= isset($user) && $user['statut'] == "CLIENT" ? 'checked' : ''?> >
                    <label for="client"> Client</label>
               </div>
          </div>
     </div>

     <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
     <button type="submit" class="btn btn-primary">Envoyer</button>
</form>