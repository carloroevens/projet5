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

  <div class="container page">
    <div class="row">
      <div class="col text-center">
        <h1>VÊTEMENTS</h1>
        <ul class="list-inline category pt-4">
          <li class="list-inline-item"><a id="lien" class="text-decoration-none text-secondary me-2 mx-md-3 mx-lg-4 mx-xl-5" href="index.php?p=shop">TOUT</a></li>
          <li class="list-inline-item"><a id="lien" class="text-decoration-none text-secondary me-2 mx-md-3 mx-lg-4 mx-xl-5" href="index.php?p=shop&amp;category=T-SHIRT">T-SHIRTS</a></li>
          <li class="list-inline-item"><a id="lien" class="text-decoration-none text-secondary me-2 mx-md-3 mx-lg-4 mx-xl-5" href="index.php?p=shop&amp;category=SWEAT">SWEATS</a></li>
          <li class="list-inline-item"><a id="lien" class="text-decoration-none text-secondary me-2 mx-md-3 mx-lg-4 mx-xl-5" href="index.php?p=shop&amp;category=JEAN">JEANS</a></li>
          <li class="list-inline-item"><a id="lien" class="text-decoration-none text-secondary me-2 mx-md-3 mx-lg-4 mx-xl-5" href="index.php?p=shop&amp;category=VESTE">VESTES</a></li>
          <li class="list-inline-item"><a id="lien" class="text-decoration-none text-secondary me-2 mx-md-3 mx-lg-4 mx-xl-5" href="index.php?p=shop&amp;category=ACCESSOIRE">ACCESSOIRES</a></li>
        </ul>
      </div>
    </div>
  
    <div class="row">
      
        <?php
        if (isset($_GET['category'])) {

          foreach ($itemManager->getItemByCategory($_GET['category'], 'ItemsController') as $items): 
            ?>

      <div class="col-12 col-sm-6 col-lg-3 my-4 d-flex justify-content-center">
        <div class="card bg-product" style="width: 18rem;">
          <div class="position-relative">
            <img src="data:image/png;base64,<?= base64_encode($items->item_img) ?>" class="card-img-top img-size img-fluid" alt="...">
          </div>
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

        }
        else if (!isset($_GET['category']))
        {
          foreach ($itemManager->getItems('ItemsController') as $items): ?>

      <div class="col-12 col-sm-6 col-lg-3 my-4 d-flex justify-content-center">
        <div class="card bg-product" style="width: 18rem;">
          <div class="position-relative">
            <img src="data:image/png;base64,<?= base64_encode($items->item_img) ?>" class="card-img-top img-size img-fluid" alt="...">
          </div>
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
        }
            /*

            PRODUIT ÉPUISÉ

              if ($size->item_numberofs, $size->item_numberofm, $size->item_numberofl, $size->item_numberofxl, $size->item_numberofxxl < 1) {
                ?>
                <div class="no-stock">
                  <p class="text-warning fs-4 text-center mt-5">PRODUIT ÉPUISÉ</p>
                </div>
                <?php
              }*/
            ?>
    </div>
  </div>

  <?php
    require 'view/footer.php'
  ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!--<script type="text/javascript" src="public/js/shop-category.js"></script>-->
  </body>
</html>