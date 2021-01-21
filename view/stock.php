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
    <link rel="icon" type="image/png" sizes="16x16" href="public/img/favicon.png"/>
    
    <title>SQUARE | Boutique en ligne</title>
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
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter des tailles</button>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Mettre à jour les tailles du stock</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="index.php?p=updatesize&amp;id=<?= $item->id; ?>">
                  <div class="modal-body text-center d-flex justify-content-center">
                    <div class="mb-4 w-50">
                      <label for="S" class="form-label">Taille S</label>
                      <input type="number" class="form-control" id="S" name="numberofs" value="<?= $size->item_numberofs; ?>">
                    
                    
                      <label for="M" class="form-label">Taille M</label>
                      <input type="number" class="form-control" id="M" name="numberofm" value="<?= $size->item_numberofm; ?>">
                    
                    
                      <label for="L" class="form-label">Taille L</label>
                      <input type="number" class="form-control" id="L" name="numberofl" value="<?= $size->item_numberofl; ?>">
                    
                    
                      <label for="XL" class="form-label">Taille XL</label>
                      <input type="number" class="form-control" id="XL" name="numberofxl" value="<?= $size->item_numberofxl; ?>">
                    
                    
                      <label for="XXL" class="form-label">Taille XXL</label>
                      <input type="number" class="form-control" id="XXL" name="numberofxxl" value="<?= $size->item_numberofxxl; ?>">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Enregristrer</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php

    /*if (isset($_POST['numberofs'], $_POST['numberofm'], $_POST['numberofl'], $_POST['numberofxl'], $_POST['numberofxxl'])) {

      $itemManager = new ItemManager;

      $itemManager->updateSize($_POST['numberofs'], $_POST['numberofm'], $_POST['numberofl'], $_POST['numberofxl'], $_POST['numberofxxl'], $item->id);

      header('refres: index.php?p=stock&id=$items->id');
    }*/

  ?>
  <?php
    require 'view/footer.php'
  ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>