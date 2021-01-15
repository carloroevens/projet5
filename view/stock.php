<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="public/css/hero.css">
    <link rel="stylesheet" type="text/css" href="public/css/shop.css">
    
    <title>Hello, world!</title>
  </head>
  <body class="bg-white bg-gradient">
    
  <?php
    require 'view/header.php'
  ?>

  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6">
        <img src="data:image/png;base64,<?= base64_encode($item->item_img) ?>" class="img-fluid" alt="...">
      </div>
      <div class="col-12 col-md-6 mt-5">
        <h1 class="mt-5 ms-3"><?= $item->item_name; ?></h1>
        <p class="fs-4 mt-3 ms-3"><?= $item->item_description; ?></p>
        <p class="fw-bold fs-3 my-5 ms-3"><?= $item->item_price; ?> €</p>
        <hr>
        <div class="ms-3 fs-4">
        <h3 class="my-4">Taille en stock</h3>
        <p>Nombre de taille S: <?= $size->item_numberofs; ?></p>
        <p>Nombre de taille M: <?= $size->item_numberofm; ?></p>
        <p>Nombre de taille L: <?= $size->item_numberofl; ?></p>
        <p>Nombre de taille XL: <?= $size->item_numberofxl; ?></p>
        <p>Nombre de taille XXL: <?= $size->item_numberofxxl; ?></p>
        <a href="" class="btn btn-secondary fs-5">Ajouter des tailles</a>
        </div>
      </div>
    </div>
  </div>

  <?php
    require 'view/footer.php'
  ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>