<?php 
  session_start();

  if(isset($_POST['pointage'])){

    $statut = $_POST['statut'];
    $user_matricule = $_POST['user_matricule'];
    $etudiant_matricule = $_POST['etudiant_matricule'];
    $date = $_POST['date'];
    $debut = $_POST['debut'];
    $fin = $_POST['fin'];

    require_once("../../actions/config.php");

    $verification="SELECT * FROM pointage WHERE MAT_ETUDIANT='$etudiant_matricule' AND DATE_SEANCE='$date' AND HEURE_DEBUT='$debut' AND HEURE_FIN='$fin'";	
    $result_verification=$pdo->prepare($verification);
    $result_verification->execute();


    if($maj=$result_verification->fetch()){

        $maj_req="UPDATE `pointage` SET `STATUT`='$statut' WHERE MAT_ETUDIANT='$etudiant_matricule'";	
        $result_maj=$pdo->prepare($maj_req);
        $result_maj->execute();
        
        $_SESSION['nom_maj'] = $maj['NOM_ETUDIANT']." ".$maj['PRENOM_ETUDIANT'];
        $_SESSION['maj'] = $statut;
        header("location:../src/seances.php?content=Nouvelle séance");

    }else{ 

        $etudiant = "SELECT * FROM classe WHERE MAT_ETUDIANT='$etudiant_matricule'";
        $result_etudiant=$pdo->prepare($etudiant);
        $result_etudiant->execute();
        $info_ETD = $result_etudiant->fetch();

        $seance = "SELECT * FROM seance WHERE DATE_SEANCE='$date' AND HEURE_DEBUT='$debut' AND HEURE_FIN='$fin'";
        $result_seance =$pdo->prepare($seance);
        $result_seance ->execute();
        $info_seance = $result_seance->fetch();



        $pointage="INSERT INTO `pointage`(`MAT_ETUDIANT`, `NOM_ETUDIANT`, `PRENOM_ETUDIANT`, `CLASSE`, `MODULE`, `TYPE_SALLE`, `DATE_SEANCE`, `HEURE_DEBUT`, `HEURE_FIN`, `STATUT`, `MAT_ENSEIGNANT`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $params=array($info_ETD['MAT_ETUDIANT'],$info_ETD['NOM_ETUDIANT'],$info_ETD['PRENOM_ETUDIANT'],$info_seance['CLASSE'],$info_seance['MODULE'],$info_seance['TYPE_SALLE'],$info_seance['DATE_SEANCE'],$info_seance['HEURE_DEBUT'],$info_seance['HEURE_FIN'],$statut,$user_matricule);
        $result=$pdo->prepare($pointage);
        $result->execute($params);

        $_SESSION['nom_pointer'] = $info_ETD['NOM_ETUDIANT']." ".$info_ETD['PRENOM_ETUDIANT'];
        $_SESSION['statut'] = $statut;
        header("location:../src/seances.php?content=Nouvelle séance");

    }

     
}

?>

