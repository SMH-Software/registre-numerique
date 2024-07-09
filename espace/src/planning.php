<?php include('header.php') ?>

<?php 
  
    $planning="SELECT * FROM planning WHERE MATRICULE_ENS='$matricule'";
    $result_planning=$pdo->prepare($planning);
    $result_planning->execute();

    $affectation="SELECT * FROM affectation WHERE MAT_ENSEIGNANT='$matricule'";
    $result_affectation=$pdo->prepare($affectation);
    $result_affectation->execute();

?>

    <!-- End Navbar -->
    <div class="row container">
        <div class="col-md-12 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h3 class="mb-0">Mes Modules</h3>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <?php if($result_affectation->rowCount() == 0) {?>
                      <h5 class="mb-3">Aucun module ne vous a été affecté</h5>
                    <?php }else{ 

                      while($affectations=$result_affectation->fetch()) { ?> 
                       <h5 class="mb-3"><?= $affectations['MODULE'] ?></h5>
                      
                    <?php } }?> 
                      
                    
                </li>
               
              </ul>
            </div>
          </div>
        </div>
        
      </div>
    
    <?php if($result_planning->rowCount() == 0){?>
      <div class="container">
       
            <h1 class="coloreted card-title text-center  py-5 mt-5 mb-5 text-white">Aucun planning prévu (0)</h1>
        
      </div>
    <?php }else { ?> 

    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="coloreted1 pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Liste des séances (<?= $result_planning->rowCount() ?>)</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary font-weight-bolder opacity-7">N°</th>
                      <th class="text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">Classe</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Module</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Salle</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Date</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Heure-Début</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Heure-Fin</th>
                     
                      <th class="text-secondary opacity-7 text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php 
                        $count = 1;
                        while($allplanning=$result_planning->fetch()) { ?> 
                        <tr>
                        
                                <td>
                                    <p class="text-xs font-weight-bold mb-0 text-center"><?= $count++ ?></p>
                                
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?= $allplanning['CLASSE'] ?></span>
                                </td>
                                
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?= $allplanning['MODULE'] ?></span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?= $allplanning['TYPE_SALLE'] ?></span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?= $allplanning['DATE_SEANCE'] ?></span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?= $allplanning['HEURE_DEBUT'] ?></span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?= $allplanning['HEURE_FIN'] ?></span>
                                </td>
                                <td class="align-middle">
                                    <a href="../actions/delete.php?id=<?= $allplanning['ID'] ?>" class="btn btn-danger font-weight-bold text-xs text-white" onclick="return confirm('Voulez-vous vraiment annuler cette séance ?');" data-toggle="tooltip" data-original-title="Edit user">
                                    Annuler
                                    </a>
                                </td>
                            </tr>
                        
                    <?php } ?>
                            
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
       
    </div> 
    <?php } ?>
     

      <?php include('footer.php') ?>
      <?php include('../actions/alerts.php') ?>
</body>
</html>