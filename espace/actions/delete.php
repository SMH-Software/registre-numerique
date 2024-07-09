<?php

    session_start();

    if(isset($_REQUEST['id'])){
        
        $id = $_REQUEST['id'];

        require_once("../../actions/config.php");

        $req="DELETE FROM `planning` WHERE ID='$id'";
        $result=$pdo->prepare($req);
        $result->execute();

        $_SESSION['success_delete'] = "Séance supprimée avec success !";
        header("location:../src/planning.php?content=Planification d'une séance");

        
    }

?>