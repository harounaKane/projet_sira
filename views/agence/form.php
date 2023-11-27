
<form action="" method="post" enctype="multipart/form-data">
     <input type="hidden" name="id_agence" value="<?= $agencetoUp['id_membre'] ?? ''; ?>">
     <div class="row mb-3">
          <div class="form-group col-6">
               <label for="">Nom</label>
               <input type="text" name="nom" value="<?= $agencetoUp['nom'] ?? ''; ?>" class="form-control">
          </div>

          <div class="form-group col-6">
               <label for="">Email</label>
               <input type="email" name="email" value="<?= $agencetoUp['email'] ?? ''; ?>" class="form-control">
          </div>

          
          <div class="form-group col-6">
               <label for="">Téléphone</label>
               <input type="text" name="tel" value="<?= $agencetoUp['tel'] ?? ''; ?>" class="form-control">
          </div>

          <div class="form-group col-6">
               <label for="">Adresse</label>
               <input type="text" name="adresse" value="<?= $agencetoUp['adresse'] ?? ''; ?>" class="form-control">
          </div>
          <div class="form-group col-6">
               <label for="">Code postal</label>
               <input type="text" name="cp" value="<?= $agencetoUp['cp'] ?? ''; ?>" class="form-control">
          </div>
     
          <div class="form-group col-6">
               <label for="">Ville</label>
               <input type="text" name="ville" value="<?= $agencetoUp['ville'] ?? ''; ?>" class="form-control">
          </div>

          <div class="form-group col-6">
               <label for="">Image</label>
               <input id="file" type="file" onchange="prevImg(this.files);" name="image" accept="image/*" class="form-control">
          </div>

          <div class="form-group col-6">
               <div id="img"></div>
          </div>

     </div>
          

     <button type="reset" class="btn btn-secondary">Annuler</button>
     <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

<script>

     function prevImg(files) {
          let div = document.getElementById('img'); 
          div.innerHTML = "";
          
          for ( let file of files ) {
          let reader = new FileReader();
          
          reader.addEventListener("load", function( event ) {
               let span = document.createElement("span");
               span.innerHTML = '<img height="100" src="' + event.target.result + '" />';
               div.appendChild( span );
          });

          reader.readAsDataURL( file );
          }
     }

     
</script>