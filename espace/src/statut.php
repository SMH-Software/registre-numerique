<?php include('header.php') ?>



    <!-- End Navbar -->
    
    <div class="container-fluid mt-7 mb-0">
      <div class="row min-vh-80">
        <div class="col-6 mx-auto">
          <div class="card mt-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="coloreted1 pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Affecter un statut</h6>
               
              </div>
            </div>
            <div class="card-body">
              <form role="form" class="text-start" action="../actions/add_statut.php" method="post">
               
                    <div class="input-group input-group-outline my-3">
                        <div class="input-group input-group-outline my-3">
                          <select name="statut" id="" class="form-control">
                              <option selected>Selectionnez un statut</option>
                              <option value="PRESENT">Présent</option>
                              <option value="ABSENT">Absent</option>
                          </select>
                        </div>
                    </div>
                
                    <input type="text" class="form-control" name="user_matricule" value="<?= $matricule ?>" hidden>
                    <input type="text" class="form-control" name="etudiant_matricule" value="<?= $_REQUEST['mat_etudiant'] ?>" hidden>
                    <input type="text" class="form-control" name="debut" value="<?= $_REQUEST['debut'] ?>" hidden>
                    <input type="text" class="form-control" name="fin" value="<?= $_REQUEST['fin'] ?>" hidden>
                    <input type="text" class="form-control" name="date" value="<?= $_REQUEST['date'] ?>" hidden>
                
                    <div class="text-center">
                        <button type="submit" name="pointage" class="btn btn-dark w-100">
                            Enrégistrer maintenant
                        </button>
                    </div>
            
              </form>
            </div>
          </div>
        </div>
    </div>
     

    <?php include('footer.php') ?>
</body>
</html>
    
    
    
    
    