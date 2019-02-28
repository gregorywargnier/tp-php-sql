<?php
require_once __DIR__ . './database.php';

 // Démarrer la session PHP
 session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>voiture</title>
<!--css boostrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!--css -->
<link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">TP PHP/SQL</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="add.php">Ajouter une voiture</a>
                    </li>
                  </ul>
                </div>  
                  <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav ml-auto">  
                        <?php if (isset($_SESSION['users'])) { ?>
                         <?php
                          $hash = md5($_SESSION['user']['email']);
                echo $_SESSION['user']['email']; 
                
                        }?>



                          <li class="nav-item">
                            <a class="nav-link" href="login.php">login</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="inscription.php">inscription</a>
                          </li>
                        </ul>
                </div>
              </nav>
    </header>