<?php

// On inclus le fichier header.php sur la page
include(__DIR__.'./partials/header.php');
?>

<?php
$email = null;
$password = null;
$cfpassword = null;

if (!empty($_POST)){
    $email = $_POST['email'];
    $password = trim($_POST['password']); //la fonction trim les espaces au début et à la fin de la chaine
    $cfnpassword = trim($_POST['cfnpassword']);


    $errors = [];


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // 1er etape verification de l'email valide
        $errors['email'] = 'email pas valide';

    }

//verification du mot de passe
if (!empty($password) || $password != $cfnpassword){
    $errors['password'] = 'mot de passe non valide';    
    }



    // Vérification de la force du mot de passe
    // - Au moins 7 caractères
    // - Un chiffre
    // - Un caractère spécial

    if(!preg_match('/(.){7,}', $password)) {
        $errors['password'] = 'Le mot de passe n\'est pas assez long (7 caractères).';
    }

    if(!preg_match('/[0-9]+', $password)){
        $errors['password'] = 'Le mot de passe doit contenir un chiffre.';
    }

  



    //Inscription de l'utilisateur

    if (empty($errors)) {
        $query = $db->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
        $query->bindValue(':email', $email);
        $query->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
        if ($query->execute()) {
            echo '<div class="alert alert-success">Vous êtes inscrit.</div>';
        }
    }

}

?>
<div class="container my-5">
    <h1 class="text-center">Inscription</h1>
    <div class="row">
        <div class="col-md-6 offset-3">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cfpassword">Confirmer le mot de passe</label>
                    <input type="password" name="cfpassword" id="cfpassword" class="form-control">
                </div>
                <button class="btn btn-primary">S'inscrire</button>
            </form>
        </div>
    </div>
</div>




<?php
require_once __DIR__ . './partials/footer.php';