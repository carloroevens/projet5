<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="public/css/hero.css">
    <link rel="stylesheet" type="text/css" href="public/css/single.css">
    <link rel="stylesheet" type="text/css" href="public/css/shop.css">

    <title>Hello, world!</title>
  </head>
  <body class="bg-white bg-gradient">
    
  <?php
    require 'view/header.php'
  ?>

  <div class="container my-5">
    <div class="row">
      <div class="col">
        <img src="data:image/png;base64,<?= base64_encode($item->item_img) ?>" class="img-fluid" alt="...">
      </div>
      <div class="col mt-5">
        <h1 class="mt-5"><?= $item->item_name; ?></h1>
        <p class="fs-4 mt-3"><?= $item->item_description; ?></p>
        <p class="fw-bold fs-3 my-5"><?= $item->item_price; ?> €</p>
        <hr>
        <h3 class="my-4">Taille</h3>
        <form>
          <ul class="list-unstyled list-inline mb-5">
            <li class="list-inline-item">
              <label>
                <input type="radio" name="sizes">
                <span>S</span>
              </label>
            </li>
            <li class="list-inline-item">
              <label>
                <input type="radio" name="sizes">
                <span>M</span>
              </label>
            </li>
            <li class="list-inline-item">
              <label>
                <input type="radio" name="sizes">
                <span>L</span>
              </label>
            </li>
            <li class="list-inline-item">
              <label>
                <input type="radio" name="sizes">
                <span>XL</span>
              </label>
            </li>
            <li class="list-inline-item">
              <label>
                <input type="radio" name="sizes">
                <span>XXL</span>
              </label>
            </li>
          </ul>
          <button class="btn btn-secondary fs-5">AJOUTER AU PANIER</button>
        </form>
      </div>
    </div>
  
    <div class="row my-5">
      
        <p class="text-center fw-bold fs-2 mt-5">VOUS AIMEREZ AUSSI</p>
        <?php
                foreach ($itemManager->getRecommendationItem("$item->item_category", 'ItemsController') as $recommendationitems): ?>

          <div class="col-3 my-4">
            <div class="card bg-product" style="width: 18rem;">
              <img src="data:image/png;base64,<?= base64_encode($recommendationitems->item_img) ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <a class="stretched-link text-decoration-none" href="<?= $recommendationitems->getUrl() ?>">
                  <ul class="list-inline d-flex justify-content-between">
                    <li class="card-title list-inline-item text-dark fs-3"><?= $recommendationitems->item_name; ?></li>
                    <li class="card-text list-inline-item text-muted mt-2 fs-5"><?= $recommendationitems->item_price; ?> €</li>
                  </ul>
                </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    
  </div>

  <?php
    require 'view/footer.php'
  ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>