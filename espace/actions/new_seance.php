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

    $seance="INSERT INTO `seance`(`CLASSE`, `MODULE`, `TYPE_SALLE`, `DATE_SEANCE`, `HEURE_DEBUT`, `HEURE_FIN`, `MAT_ENSEIGNANT`) VALUES (?,?,?,?,?,?,?)";	
    $params=array($groupe,$module,$salle,$date_seance,$heure_debut,$heure_fin,$user_matricule);
    $result=$pdo->prepare($seance);
    $result->execute($params);
    
    $_SESSION['seance'] = "Séance ouverte";
    header("location:../src/seances.php?content=Nouvelle séance");



     
}

?>

