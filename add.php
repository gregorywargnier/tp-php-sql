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
		}
	?>





<div class="container my-5">
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
                            $query = $db->query('SELECT * FROM car');
                            $car = $query->fetchAll();
                            foreach ($car as $cars) {
                                echo '<option value="'.$cars['id'].'">'.$cars['release_date'].'</option>';
                               
                            }
                        ?>  
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
    // Vérifier le modele
    if (empty($model)) {
        $errors['model'] = 'Le type modele n\'est pas rempli';
    }   

?>





<?php
  // On inclus le fichier footer.php sur la page

include(__DIR__.'./partials/footer.php');
?>