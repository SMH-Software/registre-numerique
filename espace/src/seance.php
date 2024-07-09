<?php include('header.php') ?>
<?php 
   $req_groupe="SELECT * FROM groupe";
   $result_groupe=$pdo->prepare($req_groupe);
   $result_groupe->execute();

   $req_module="SELECT * FROM affectation WHERE MAT_ENSEIGNANT='$matricule'";
   $result_module=$pdo->prepare($req_module);
   $result_module->execute();

   
   $req_type_salle="SELECT * FROM type_salle";
   $result_type_salle=$pdo->prepare($req_type_salle);
   $result_type_salle->execute();

?>


    <!-- End Navbar -->
   <div class="container py-5">
     <div class="card">
       <div class="card-body">
          <form role="form" class="text-start" action="<?= $_REQUEST['content'] == "Démarrage d'une nouvelle séance" ? "../actions/new_seance.php":"../actions/planification.php" ?>" method="post">
            <div class="row">

              <div class="col-lg-4 col-md-4">
                <div class="input-group input-group-outline my-3">
                    <select name="groupe" id="" class="form-control" required>
                    <option  selected>Selectionnez une classe</option>
                      <?php while($groupe=$result_groupe->fetch()){ ?>
                        <option value="<?= $groupe['LIBELLE'] ?>"><?= $groupe['LIBELLE'] ?></option>
                      <?php } ?>
                    </select>
                </div>
              </div>

              <div class="col-lg-4 col-md-4">
                <div class="input-group input-group-outline my-3">
                    <select name="module" id="" class="form-control" required>
                    <option  selected>Selectionnez un module</option>
                      <?php while($module=$result_module->fetch()){ ?>
                        <option value="<?= $module['MODULE'] ?>"><?= $module['MODULE'] ?></option>
                      <?php } ?>
                    </select>
                </div>
              </div>

              <div class="col-lg-4 col-md-4">
                <div class="input-group input-group-outline my-3">
                    <select name="salle" id="" class="form-control" required>
                    <option  selected>Selectionnez une salle</option>
                      <?php while($type_salle=$result_type_salle->fetch()){ ?>
                        <option value="<?= $type_salle['NUM_SALLE']." ".$type_salle['LIBELLE'] ?>"><?= $type_salle['NUM_SALLE']." ".$type_salle['LIBELLE'] ?></option>
                      <?php } ?>
                    </select>
                </div>
              </div>

            </div>
            <div class="row">

              <div class="col-lg-4 col-md-4">
                <div class="input-group input-group-outline my-3">
                    <div class="input-group input-group-outline my-3">
                      <label class="form-label">Date de la séance</label>
                      <input type="date" class="form-control" name="date_seance" required>
                    </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-4">
                <div class="input-group input-group-outline my-3">
                    <div class="input-group input-group-outline my-3">
                      <label class="form-label">Heure début</label>
                      <input type="time" class="form-control" name="heure_debut" required>
                    </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-4">
                <div class="input-group input-group-outline my-3">
                    <div class="input-group input-group-outline my-3">
                      <label class="form-label">Heure début</label>
                      <input type="time" class="form-control" name="heure_fin" required>
                    </div>
                </div>
              </div>

            </div>
            <input type="text" class="form-control" name="user_matricule" value="<?= $matricule ?>" hidden>
           
           
           
            <div class="text-center">
              <button type="submit" name="seance" class="<?= $_REQUEST['content'] == "Démarrage d'une nouvelle séance" ? "btn btn-success":"btn btn-info" ?> w-100 my-4 mb-2">
                <?= $_REQUEST['content'] == "Démarrage d'une nouvelle séance" ? " Démarrer maintenant":"Enrégistrer maintenant" ?>
             </button>
            </div>
           
          </form>
       </div>
     </div>
   </div>
      <?php include('footer.php') ?>
      <?php include('../actions/alerts.php') ?>

</body>
</html>