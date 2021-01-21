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
  <body class="bg-light bg-gradient">
    
  <?php
    require 'view/header.php'
  ?>

  <div class="container">
    <div class="row">
      
        <?php

          $fav = $favoriteManager->getFavorite($_SESSION['id']);
            foreach (array_column($fav, 'item_id') as $valeur) {
                
                foreach ($itemManager->getFavoriteItems($valeur, 'ItemsController') as $items): ?>

      <div class="col-12 col-sm-6 col-lg-3 my-4 d-flex justify-content-center">
        <div class="card bg-product" style="width: 18rem;">
          <img src="data:image/png;base64,<?= base64_encode($items->item_img) ?>" class="card-img-top img-size img-fluid" alt="...">
          <div class="card-body">
            <a class="stretched-link text-decoration-none" href="<?= $items->getUrl() ?>">
              <ul class="list-unstyled">
                <li class="card-title text-dark fs-3"><?= $items->item_name; ?></li>
                <li class="card-text text-muted mt-2 fs-5"><?= $items->item_price; ?> €</li>
              </ul>
            </a>
          </div>
        </div>
      </div>
        <?php endforeach; 
        }?>

    </div>
  </div>

  <?php
    require 'view/footer.php'
  ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>