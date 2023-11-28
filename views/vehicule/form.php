
<form action="" method="post" enctype="multipart/form-data">
     <input type="hidden" name="id_vehicule" value="<?= $vehiculeUp['id_vehicule'] ?? ''; ?>">
     <div class="row mb-4">
          <div class="form-group col-6">
               <label for="">Marque</label>
               <input type="text" name="marque" value="<?= $vehiculeUp['marque'] ?? ''; ?>" class="form-control">
          </div>

          
          <div class="form-group col-6">
               <label for="">Modèle</label>
               <input type="text" name="modele" value="<?= $vehiculeUp['modele'] ?? ''; ?>" class="form-control">
          </div>

          <div class="row">
               <div class="col-6">
                    <div class="row d-flex justify-content-between">
                         <div class="form-group col-12">
                              <label for="">Prix journalier</label>
                              <input type="text" name="prix_journalier" value="<?= $vehiculeUp['prix_journalier'] ?? ''; ?>" class="form-control">
                         </div>

                         <div class="form-group col-12">
                              <label for="">Agence</label>
                              <select name="agence" class="form-select">
                                   <?php foreach($agences as $agence): ?>
                                        <option value="<?= $agence['id_agence']; ?>" class="form-control"><?= $agence['nom']; ?></option>
                                   <?php endforeach; ?>
                              </select>
                         </div>

                         <div class="form-group col-12">
                              <label for="">Image</label>
                              <input id="file" type="file" onchange="prevImg(this.files);" name="image" accept="image/*" class="form-control">
                         </div>
                    </div>
               </div>
               <div class="col-6">
                    <div class="form-group col-12">
                         <label for="">Description</label>
                         <textarea name="description" rows="6" class="form-control"></textarea>
                    </div>
               </div>
          </div>

          <div class="form-group col-6">
               <div id="img"></div>
          </div>

     </div>
     
     <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
     <button type="submit" class="btn btn-primary">Envoyer</button>
</form>