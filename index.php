<!--header-->
<?php

// On inclus le fichier header.php sur la page
include(__DIR__.'./partials/header.php');
?>
<div class="container">
  <div class="row font-weight-bold my-5 border-top">
    <div class="col-1 my-3">#</div>
    <div class="col-3 my-3">photo</div>
    <div class="col-2 my-3">marque</div>
    <div class="col-1 my-3">modèle</div>
    <div class="col-2 my-3">prix</div>
    <div class="col-2 my-3">Année de sortie</div>
    <div class="col-1 my-3">Action</div>
  </div>
  <?php
$query = $db->query('SELECT * FROM car');
$car = $query->fetchAll();
?>
  <?php
foreach($car as $cars){?>
  <div class="row border-top border-dark">
    <div class="col-1 my-4"><?php echo $cars['id'];?></div>
    <div class="col-3 my-4"><img class="card-img-top " src="./img/<?php echo $cars['photo'];?>" alt="<?= $cars['brand']; ?>">
    </div>
    <div class="col-2 my-4"><?php echo $cars['brand'];?></div>
    <div class="col-1 my-4"><?php echo $cars['model'];?></div>
    <div class="col-2 my-4 ">
    <?= number_format($cars['price'], 2, ',', ' ');


    ?>€</div>
    <div class="col-2 my-4"><?php echo $cars['release_date'];?></div>
    <div class="col-1 my-4 ">
      <p>blabla</p>
    </div>
  </div>
  <?php } ?>
</div>




































<?php
  // On inclus le fichier footer.php sur la page

include(__DIR__.'./partials/footer.php');
?>