<?php include('header.php') ?>

<?php 
  
    $seance="SELECT * FROM seance WHERE MAT_ENSEIGNANT='$matricule' AND ETAT='0'";
    $result_seance=$pdo->prepare($seance);
    $result_seance->execute();
    $info_seance = $result_seance->fetch();

    $etudiant="SELECT * FROM classe WHERE GROUPE='".$info_seance['CLASSE']."'";
    $result_etudiant=$pdo->prepare($etudiant);
    $result_etudiant->execute();
   


?>

    <!-- End Navbar -->
    
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="coloreted1 pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Informations de la séance</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>	

                    <tr>
                     
                      <th class="text-center text-uppercase text-secondary text-sm  font-weight-bolder opacity-7">Classe</th>
                      <th class="text-center text-uppercase text-secondary text-sm  font-weight-bolder opacity-7">Module</th>
                      <th class="text-center text-uppercase text-secondary text-sm  font-weight-bolder opacity-7">Salle</th>
                      <th class="text-center text-uppercase text-secondary text-sm  font-weight-bolder opacity-7">Date</th>
                 
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Heure Début</th>
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Heure Fin</th>
                     
                     
                      
                    </tr>
                  </thead>
                  <tbody> 
                   
                        <tr>
                            <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold"><?= $info_seance['CLASSE'] ?></span>
                                </td>
                                
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?= $info_seance['MODULE'] ?></span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?= $info_seance['TYPE_SALLE'] ?></span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?= $info_seance['DATE_SEANCE'] ?></span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?= $info_seance['HEURE_DEBUT'] ?></span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?= $info_seance['HEURE_FIN'] ?></span>
                                </td>
                               
                            </tr>
                                           
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
       
    </div> 

    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="coloreted1 pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Liste des étudiants</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>	

                    <tr>
                      <th class="text-uppercase text-secondary text-center font-weight-bolder opacity-7">N°</th>
                      <th class="text-uppercase text-secondary  text-center font-weight-bolder opacity-7 ps-2">Matricule</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Nom</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Prénom</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Classe</th>
   
                      <th class="text-secondary opacity-7 text-center">Pointage</th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php 
                        $count = 1;
                        while($etudiants=$result_etudiant->fetch()) { ?> 
                        <tr>
                        
                                <td>
                                    <p class="text-xs font-weight-bold mb-0 text-center"><?= $count++ ?></p>
                                
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm text-center font-weight-bold"><?= $etudiants['MAT_ETUDIANT'] ?></span>
                                </td>
                                
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?= $etudiants['NOM_ETUDIANT'] ?></span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?= $etudiants['PRENOM_ETUDIANT'] ?></span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?= $etudiants['GROUPE'] ?></span>
                                </td>
                                
                               
                                <td class="align-middle text-center">
                                    <a href="statut.php?content=Pointage&mat_etudiant=<?= $etudiants['MAT_ETUDIANT'] ?>&date=<?= $info_seance['DATE_SEANCE'] ?>&debut=<?= $info_seance['HEURE_DEBUT'] ?>&fin=<?= $info_seance['HEURE_FIN'] ?>" class="btn btn-info font-weight-bold text-xs text-white" data-toggle="tooltip" data-original-title="Edit user">
                                        Pointer
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
   
     

      <?php include('footer.php') ?>
      <?php include('../actions/alerts.php') ?>
</body>
</html>