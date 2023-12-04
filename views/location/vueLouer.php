     <main class="container-fluid">
          <h2 class="text-center">Louer un véhicule</h2>
          <div class="d-flex align-items-center">
               <div class="card col-3 m-2 p-0">
                    <h5 class="card-title"><?= $vehicule['marque'] ?></h5>
                    <img class="card-img-top" src="public/img/vehicule/<?= $vehicule['image'] ?>" alt="">
                    <div class="card-body">
                         <p class="card-text">
                              Pour <strong id="prix"><?= $vehicule['prix_journalier'] ?></strong> € Journée!
                         </p>
                         <p>
                              L'agence de <?= $vehicule['nom'] ?>
                         </p>
                         <p>
                              L'agence de <?= $vehicule['description'] ?>
                         </p>
                    </div>
               </div>

               <form action="" method="post">

                    <div>
                         condition
                    </div>

                    <input type="hidden" name="id_vehicule" value="<?= $vehicule['id_vehicule'] ?>">
                    <input type="hidden" name="id_agence" value="<?= $vehicule['agence'] ?>">
                    <input type="hidden" name="id_client" value="<?= $_SESSION['user']['id_membre'] ?? '' ?>">
                    <input type="hidden" name="total" value="" id="total">

                    <div class="row p-5">
                         <div class="form-group col-6">
                              <label for="">Date début</label>
                              <input type="date" min="<?= date("Y-m-d") ?>" id="dateDebut" name="dateDebut" class="form-control">
                         </div>
                         <div class="form-group col-">
                              <label for="">Date fin</label>
                              <input type="date" id="dateFin" name="dateFin" class="form-control">
                         </div>
                         <?php if( isConnected() ): ?>
                              <input type="submit" class="btn btn-success col-2 mt-3">
                         <?php else: ?> 
                              <a href="" class="btn btn-success col-2 mt-3" data-bs-toggle="modal" data-bs-target="#loginModal">Envoyer</a>
                         <?php endif; ?>
                    </div>
               </form>

          </div>
     </main>

     <script>
     var dateD = byId("dateDebut");
     var dateF = byId("dateFin");
     var total = byId("total");
     var prix = byId("prix").innerText;

     dateD.addEventListener("change", function(){
          dateF.disabled = false;
          dateF.min = dateD.value;
     
     });

     dateF.addEventListener("change", function(){
          var j =  nbJour(dateF.value, dateD.value);
          var msg = "Pour " + j + " jour(s), le total = ";
          total.value = parseInt(j) * parseFloat(prix);
     });

     function nbJour(depart, arrivee){
          var d1 = new Date(depart);
          var d2 = new Date(arrivee);

          return (d1 - d2) / (1000*60*60*24)+1;
     }

     function byId(id){
          return document.getElementById(id);
     }


</script>