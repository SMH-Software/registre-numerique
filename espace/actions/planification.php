<?php 
  session_start();

  if(isset($_POST['seance'])){

    $groupe = $_POST['groupe'];
    $module = $_POST['module'];
    $salle = $_POST['salle'];
    $date_seance = $_POST['date_seance'];
    $heure_debut = $_POST['heure_debut'];
    $heure_fin = $_POST['heure_fin'];

    $user_matricule = $_POST['user_matricule'];

    require_once("../../actions/config.php");

    $verification="SELECT * FROM planning WHERE TYPE_SALLE='$salle' AND DATE_SEANCE='$date_seance' AND HEURE_DEBUT='$heure_debut' AND HEURE_FIN='$heure_fin' AND MATRICULE_ENS='$user_matricule'";	
    $result_verification=$pdo->prepare($verification);
    $result_verification->execute();


    if($result_verification->fetch()){

        $_SESSION['accuse'] = "La salle selectionnée a déjà été réservé pour la même plage d'horaires !";
        header("location:../src/seance.php?content=Planification d'une séance");

    }else{ 

        $req_planning="INSERT INTO `planning`(`MATRICULE_ENS`, `MODULE`, `CLASSE`, `TYPE_SALLE`, `DATE_SEANCE`, `HEURE_DEBUT`, `HEURE_FIN`) VALUES (?,?,?,?,?,?,?)";
        $params=array($user_matricule,$module,$groupe,$salle,$date_seance,$heure_debut,$heure_fin);
        $result=$pdo->prepare($req_planning);
        $result->execute($params);

        $_SESSION['success'] = "planification enrégistrée avec succès !";
        header("location:../src/seance.php?content=Planification d'une séance");

    }

     
}

?>

