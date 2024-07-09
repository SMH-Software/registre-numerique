<?php include('header.php') ?>

<?php 
  
    $pointage="SELECT * FROM pointage WHERE MAT_ENSEIGNANT='$matricule'";
    $result_pointage=$pdo->prepare($pointage);
    $result_pointage->execute();

?>

    <!-- End Navbar -->
    
    <?php if($result_pointage->rowCount() == 0){?>
      <div class="container mt-5">
        <div class="card coloreted">
            <h1 class="card-title text-center mt-10 mb-10 text-white">Aucun Régistre d'appels disponible !</h1>
        </div>
      </div>
    <?php }else { ?> 

    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="coloreted1 pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Régistre d'Appels</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>	

                    <tr>
                      <th class="text-uppercase text-secondary text-sm text-center font-weight-bolder opacity-7">N°</th>
                      <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">Matricule</th>
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Nom</th>
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Prénom</th>
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Classe</th>
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Module</th>
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Salle</th>
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Date</th>
                 
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Heure Début</th>
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Heure Fin</th>
                     
                     
                      <th class="text-secondary opacity-7 text-center">Statut</th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php 
                        $count = 1;
                        while($registre=$result_pointage->fetch()) { ?> 
                        <tr>
                        
                                <td>
                                    <p class="text-xs font-weight-bold mb-0 text-center"><?= $count++ ?></p>
                                
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?= $registre['MAT_ETUDIANT'] ?></span>
                                </td>
                                
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?= $registre['NOM_ETUDIANT'] ?></span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?= $registre['PRENOM_ETUDIANT'] ?></span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?= $registre['CLASSE'] ?></span>
                                </td>
                                
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?= $registre['MODULE'] ?></span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?= $registre['TYPE_SALLE'] ?></span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?= $registre['DATE_SEANCE'] ?></span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?= $registre['HEURE_DEBUT'] ?></span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?= $registre['HEURE_FIN'] ?></span>
                                </td>
                                <td class="align-middle">
                                    <a href="" class="btn <?= $registre['STATUT'] == "PRESENT" ? "btn-success":"btn-danger" ?> font-weight-bold text-xxs text-white" data-toggle="tooltip" data-original-title="Edit user">
                                      <?= $registre['STATUT'] ?>(E)
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
</body>
</html>