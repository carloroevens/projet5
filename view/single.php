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
    <link rel="icon" type="image/png" sizes="16x16" href="public/img/favicon.png"/>

    <title>SQUARE | Boutique en ligne</title>
  </head>
  <body class="bg-white bg-gradient">
    
  <?php
    require 'view/header.php'
  ?>

  <div class="container my-5">
    <div class="row">
      <div class="col-12 col-md-6">
        <img src="data:image/png;base64,<?= base64_encode($item->item_img) ?>" class="img-fluid" alt="...">
      </div>
      <div class="col-12 col-md-6 mt-5">
        <?php
        if (isset($_SESSION['id'])) {
          
          $fav = $favoriteManager->getFavorite($_SESSION['id']);
          if (in_array($item->id, array_column($fav, 'item_id'))) {
            ?>
            <a href="index.php?p=removefavorite&amp;itemid=<?= $item->id; ?>" id="lien" class="text-decoration-none ms-3 text-danger">♥ Retirer des favoris</a>
            <?php
          }
          else{
            ?>
            <a href="index.php?p=addfavorite&amp;itemid=<?= $item->id; ?>" id="lien" class="text-decoration-none ms-3 text-danger">♡ Ajouter aux favoris</a>
            <?php
          }
        }
        ?>
        <h1 class="ms-3"><?= $item->item_name; ?></h1>
        <p class="fs-4 mt-3 ms-3"><?= $item->item_description; ?></p>
        <p class="fw-bold fs-3 my-5 ms-3"><?= $item->item_price; ?> €</p>
        <hr>
        <h3 class="my-4 ms-3">Taille</h3>
        <form method="post" action="index.php?p=addcart&amp;id=<?= $item->id; ?>">
          <ul class="list-unstyled list-inline mb-5">
            <li class="list-inline-item">
              <?php
                if ($size->item_numberofs < 1) {
                  ?>
                    <label>
                      <input class="no-sizes" id="disabledTextInput" type="radio" value="S" name="sizes">
                      <span class="empty">S</span>
                    </label>
                  <?php
                } 
                else
                {
                  ?>
                    <label>
                      <input class="sizes" checked type="radio" value="S" name="size">
                      <span>S</span>
                    </label>
                  <?php
                }
              ?>
            </li>
            <li class="list-inline-item">
              <?php
                if ($size->item_numberofm < 1) {
                  ?>
                    <label>
                      <input class="no-sizes" id="disabledTextInput" type="radio"  name="sizes">
                      <span class="empty">M</span>
                    </label>
                  <?php
                } 
                else
                {
                  ?>
                    <label>
                      <input class="sizes" type="radio" value="M" name="size">
                      <span>M</span>
                    </label>
                  <?php
                }
              ?>
            </li>
            <li class="list-inline-item">
              <?php
                if ($size->item_numberofl < 1) {
                  ?>
                    <label>
                      <input class="no-sizes" id="disabledTextInput" type="radio" name="sizes">
                      <span class="empty">L</span>
                    </label>
                  <?php
                } 
                else
                {
                  ?>
                    <label>
                      <input class="sizes" type="radio" value="L" name="size">
                      <span>L</span>
                    </label>
                  <?php
                }
              ?>
            </li>
            <li class="list-inline-item">
              <?php
                if ($size->item_numberofxl < 1) {
                  ?>
                    <label>
                      <input class="no-sizes" id="disabledTextInput" type="radio" name="sizes">
                      <span class="empty">XL</span>
                    </label>
                  <?php
                } 
                else
                {
                  ?>
                    <label>
                      <input class="sizes" type="radio" value="XL" name="size">
                      <span>XL</span>
                    </label>
                  <?php
                }
              ?>
            </li>
            <li class="list-inline-item">
              <?php
                if ($size->item_numberofxxl < 1) {
                  ?>
                    <label>
                      <input class="no-sizes" id="disabledTextInput" type="radio" name="sizes">
                      <span class="empty">XXL</span>
                    </label>
                  <?php
                } 
                else
                {
                  ?>
                    <label>
                      <input class="sizes" type="radio" value="XXL" name="size">
                      <span>XXL</span>
                    </label>
                  <?php
                }
              ?>
            </li>
          </ul>
          <button class="btn btn-secondary fs-5 ms-5">AJOUTER AU PANIER</button>
        </form>
      </div>
    </div>
  
    <div class="row my-5">
      
        <p class="text-center fw-bold fs-2 mt-5">VOUS AIMEREZ AUSSI</p>
        <?php
                foreach ($itemManager->getRecommendationItem("$item->item_category", "$item->id", 'ItemsController') as $recommendationitems): ?>

          <div class="col-6 col-sm-4 col-lg-3 my-4 d-flex justify-content-center">
            <div class="card bg-product" style="width: 18rem;">
              <img src="data:image/png;base64,<?= base64_encode($recommendationitems->item_img) ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <a class="stretched-link text-decoration-none" href="<?= $recommendationitems->getUrl() ?>">
                  <ul class="list-unstyled">
                    <li class="card-title text-dark fs-3"><?= $recommendationitems->item_name; ?></li>
                    <li class="card-text text-muted mt-2 fs-5"><?= $recommendationitems->item_price; ?> €</li>
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
    <script type="text/javascript" src="public/js/favorite.js"></script>
  </body>
</html>