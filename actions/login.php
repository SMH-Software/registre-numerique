<?php 
  session_start();

  if(isset($_POST['submit'])){

      if(empty($_POST['login']) && empty($_POST['password'])){

          $_SESSION['vide'] = "Veuillez renseigner les tous les champs pour vous connecter";
          header("location:../index.php");
      }else{

          $login = $_POST['login'];
          $password = $_POST['password'];

          require_once("config.php");

          $connexion="SELECT * FROM comptes WHERE USERNAME='$login' AND `PASSWORD`='$password'";
          $result=$pdo->prepare($connexion);
          $result->execute();

        
          if($user=$result->fetch()){

          
            $_SESSION['USER'] = $user['USERNAME'];
            header("location:../espace/src/index.php?content=Accueil");

          }
          else
          { 

            $_SESSION['error'] = "Login ou Mot de passe invalide !";
            header("location:../index.php");

          }

      }  

  }

?>

