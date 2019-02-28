<?php

// On inclus le fichier header.php sur la page
include(__DIR__.'./partials/header.php');
?>

<?php 
		// On déclare les variables 
		$brand = null;
        $model = null;
        $price = null;
        $release_date = null;
        $photo = null;

// On recupere les informations
        if (!empty($_POST)) { 
		    $brand = $_POST['brand'];
            $model = $_POST['model'];
            $price = $_POST['price'];
            $release_date = $_POST['release_date'];
            $photo = $_FILES['photo'];

//On fait un tableau pour d'evnetuelles erreurs
           $errors = [];
		

// Vérifier le marque
    if (empty($brand)) {
        $errors['brand'] = 'La marque du modèle n\'est pas rempli';
    }
    // Vérifier le modele
    if (empty($model)) {
        $errors['model'] = 'Le type modele n\'est pas rempli';
    }
    // Vérifier le prix
    if (empty($price)) {
        $errors['price'] = 'Le prix n\'est pas affiché'; 
    }

 // Vérifier le prix
 if (empty($photo)) {
    $errors['photo'] = 'La photo n\'a pas été téléchargé '; 
    }

// METTRE LE UPLOAD AVANT LA REQUETE


// Upload de la la photo
 if ($photo['error'] === 0) {
    // On récupére le fichier temporaire
    $tmpFile = $photo['tmp_name'];
    // On récupére le nom du fichier
    $fileName = $photo['name'];
    
    $fileName = substr(md5(time()), 0, 0) . ' ' . $fileName;
   
    move_uploaded_file($tmpFile, __DIR__.'./img/'.$fileName);
   
    $photo = $fileName;
    } else { 
     $photo = null;
    }






 // Si le formulaire est valide
    if (empty($errors)) {
        $query = $db->prepare('INSERT INTO car (brand, model, price, release_date, photo) VALUES (:brand, :model, :price, :release_date, :photo)');
        $query->bindValue(':brand', $brand);
        $query->bindValue(':model', $model);
        $query->bindValue(':price', $price);
        $query->bindValue(':release_date', $release_date);
        $query->bindValue(':photo', $photo);
        if ($query->execute()) {
            echo '<div class="alert alert-success">La voiture a bien été ajouté.</div>';
        }
    }
}

?>



<div class="container my-5">
<?php
        // S'il y a des erreurs
        if (!empty($errors)) {
            echo '<div class="alert alert-danger">';
            echo '<p>Le formulaire contient des erreurs</p>';
            echo '<ul>';
            foreach ($errors as $field => $error) {
                echo '<li>'.$field.' : '.$error.'</li>';
            }
            echo '</ul>';
            echo '</div>';
        }
    ?>
    <div class="row">
        <div class="col-md-6 offset-3">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nom">Marque</label>
                    <input type="text" name="brand" id="marque" <?php echo $brand; ?> class="form-control">
                </div>
                <div class="form-group">
                    <label for="nom">Modèle</label>
                    <input type="text" name="model" id="modele" <?php echo $model; ?> class="form-control">
                </div>

                <div class="form-group">
                    <label for="nom">prix</label>
                    <input type="text" name="price" id="price" <?php echo $price; ?> class="form-control">
                </div>

                <div class="form-group">
                    <label for="release_date">année de sortie</label>
                    <select name="release_date" id="release_date" class="form-control">
                    <?php
                           $dateActuel = date('Y');
                           for ($date = 1955; $date <= $dateActuel; $date++) { 
                             ?><option><?php echo $date ?></option>

                    <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="photo">photo</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                </div>

                <button class="btn btn-dark btn-block">Ajouter la voiture</button>
            </form>
        </div>
    </div>
</div>


	




<?php
  // On inclus le fichier footer.php sur la page

include(__DIR__.'./partials/footer.php');
?>