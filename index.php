<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>SYSTEME DE GESTION DES REGISTRES D'APPELS | Connexion</title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/style1.css" />
	
</head>
<body>

    <div class="container" style="margin-top:20%">
        <header>
			
			<h1>Espace Enseignant</h1>
            <h2>TIME UNIVERSITE DE TUNIS</h2>
		</header>
			
		<section class="main">
                      
            <table border="0" align="center">
                <tr>
                    <td>
                        <table border="0" align="center" width="600">
                            <tr>
                                <td width="300">
                                    <p><br>
                                        <span class="Style1">Bienvenue dans l'éspace enseignant.</span> <br> <br> 
                                        <span class="Style2">Pour accéder à votre compte, </span>
                                    </p>
                                    <p>
                                        <span class="Style2"> 
                                            veuillez introduire vos Identifiants : <br><br>
                                        
                                        Login = Matricule <br><br>
                                        Mot de passe = Nom</span>
                            
                                    </p>
                                </td>
                
                                <td width="100"></td>
                        </table>
                    </td>
                    <td width="50"><img src="./assets/img/log.png"><br></td>
            
                    <td width="550"> 
                        <form class="form-5 clearfix" method="post" action="actions/login.php">
                            <p>
                                <input type="text" id="" name="login" placeholder="Login">
                                <input type="password" name="password" id="" placeholder="Mot de Passe"> 
                            </p>
                            <button type="submit" name="submit">
                                <i class="icon-arrow-right"></i>
                                <span>Envoyer</span>				    
                            </button>     
                        </form>​​​​         
                    </td>
                </tr>
            </table>
	    </section>
    </div>

<!-- jQuery if needed -->

    <script type="text/javascript" src="assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="assets/js/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
    <!-- JavaScript Bundle with Popper -->
  <?php include('actions/alerts.php') ?>
</body>
</html>