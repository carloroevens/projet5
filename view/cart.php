<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="public/css/hero.css">
    <link rel="stylesheet" type="text/css" href="public/css/cart.css">
    <link rel="icon" type="image/png" sizes="16x16" href="public/img/favicon.png"/>
    
    <title>SQUARE | Boutique en ligne</title>
  </head>
  <body class="bg-white bg-gradient">
    
  <?php
    require 'view/header.php'
  ?>

  <div class="container page">
    <div class="row">
      <div class="col-8 mt-5">
        <h1>Panier</h1>
        <hr class="hr">
        <div class="row">
          <?php
          $price = 0;
          $cart = $cartManager->getItem($_SESSION['id']);
          if (empty($cart)) {
              echo "Vous n'avez pas d'article dans votre panier";
            }
            else
            {
              foreach (array_column($cart, 'item_id') as $valeur) {
          foreach ($itemManager->getFavoriteItems($valeur, 'ItemsController') as $items): ?>

      <div class="col-12 d-flex justify-content-around my-3">
          <div>
            <img src="data:image/png;base64,<?= base64_encode($items->item_img) ?>" class="img-size" alt="...">
          </div>
          <div class="w-25">
            <p class="text-dark fs-3"><a class="text-decoration-none text-dark" href="<?= $items->getUrl() ?>"><?= $items->item_name; ?></a></p>
            <p class="text-muted mt-2 fs-5"><?= $items->item_price; ?> €</p>
          </div>
          <div class="">
            <a href="index.php?p=deletecart&amp;id=<?= $items->id; ?>" class="btn btn-warning">Suprimer</a>
          </div>
      </div>
      <hr class="hr mt-2">
        <?php 
        $price = $price + $items->item_price;
          endforeach; 
        }
      }
      ?>

        </div>
      </div>
      <div class="col-4 mt-5">
        <div class="bg-light py-5">
          <div>
            <p class="ms-5">PRIX: <?= $price ?> €</p>
            <p class="ms-5">LIVRAISON: 
            <?php
              if ($price == 0) {
                $delivery = 0;
                echo $delivery;
              }else{
                $delivery = 4.99;
                echo $delivery;
              }
            ?>
            </p>
            <hr class="hr">
            <p class="ms-5">TOTAL TTC: <?= $price + $delivery ?> €</p>
            <hr class="hr">
            <a class="btn btn-warning ms-5" href="#">COMMANDER</a>
          </div>
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