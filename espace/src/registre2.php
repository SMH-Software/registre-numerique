<?php include('header.php') ?>

<?php 

    $id_et = isset($_GET['matricule']) ? $_GET['matricule']: null;

    $pointage="SELECT * FROM pointage WHERE MAT_ENSEIGNANT='".$utilisateur['MATRICULE']."' AND MAT_ETUDIANT LIKE '%$id_et%'";
    $result_pointage=$pdo->prepare($pointage);
    $result_pointage->execute();

  
    $pointage2="SELECT * FROM pointage WHERE MAT_ENSEIGNANT='".$utilisateur['MATRICULE']."'";
    $result_pointage2=$pdo->prepare($pointage2);
    $result_pointage2->execute();

  

?>
    <?php if($result_pointage2->rowCount() != 0) { ?>
        <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="coloreted1 pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">RECHERCHE <i class="fa fa-search"></i></h6>        
                </div>
                </div>
                <div class="card-body">
                <form role="form" class="text-start" action="registre2.php" method="get">

                        <div class="row">

                            <div class="col-lg-8 col-md-8">
                                <div class="input-group input-group-outline my-3">
                                    
                                        <select name="matricule" id="" class="form-control" required>
                                            <option selected>Selectionnez un étudiant pour rechercher</option>
                                        <?php while($et=$result_pointage2->fetch()) { ?> 
                                                <option value="<?= $et['MAT_ETUDIANT'] ?>"><?= $et['MAT_ETUDIANT']." ". $et['NOM_ETUDIANT']." ". $et['PRENOM_ETUDIANT'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="text" name="content" value="Registre" hidden>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="text-center my-3">
                                    <button type="submit" name="" class="btn btn-success w-100">
                                        Rechercher maintenant
                                    </button>
                                </div>
                            </div>
                        </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    <?php } ?>
    <!-- End Navbar -->
    
    <?php if($result_pointage->rowCount() == 0){?>
      <div class="container mt-5">
       
            <h1 class="card-title coloreted1 text-center py-5 mt-10 mb-5 text-white">Régistre d'appels indisponible !</h1>
       
      </div>
    <?php }else { ?> 

    <div class="container-fluid mt-4">
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