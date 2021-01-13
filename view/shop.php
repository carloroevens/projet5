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
  <body class="bg-light bg-gradient">
    
  <?php
    require 'view/header.php'
  ?>

  <div class="container">
    <div class="row">
      <div class="col text-center">
        <h1>VÊTEMENTS</h1>
        <ul class="list-inline category pt-4">
          <li class="list-inline-item"><a class="text-decoration-none text-secondary me-2 mx-md-3 mx-lg-4 mx-xl-5" href="">TOUT</a></li>
          <li class="list-inline-item"><a class="text-decoration-none text-secondary me-2 mx-md-3 mx-lg-4 mx-xl-5" href="">T-SHIRTS</a></li>
          <li class="list-inline-item"><a class="text-decoration-none text-secondary me-2 mx-md-3 mx-lg-4 mx-xl-5" href="">SWEATS</a></li>
          <li class="list-inline-item"><a class="text-decoration-none text-secondary me-2 mx-md-3 mx-lg-4 mx-xl-5" href="">JEANS</a></li>
          <li class="list-inline-item"><a class="text-decoration-none text-secondary me-2 mx-md-3 mx-lg-4 mx-xl-5" href="">VESTES</a></li>
          <li class="list-inline-item"><a class="text-decoration-none text-secondary me-2 mx-md-3 mx-lg-4 mx-xl-5" href="">ACCESSOIRES</a></li>
        </ul>
      </div>
    </div>
  
    <div class="row">
      
        <?php
                foreach ($itemManager->getItems('ItemsController') as $items): ?>

      <div class="col-6 col-sm-4 col-lg-3 my-4 d-flex justify-content-center">
        <div class="card bg-product" style="width: 18rem;">
          <img src="data:image/png;base64,<?= base64_encode($items->item_img) ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <a class="stretched-link text-decoration-none" href="<?= $items->getUrl() ?>">
              <ul class="list-inline d-flex justify-content-between">
                <li class="card-title list-inline-item text-dark fs-3"><?= $items->item_name; ?></li>
                <li class="card-text list-inline-item text-muted mt-2 fs-5"><?= $items->item_price; ?> €</li>
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