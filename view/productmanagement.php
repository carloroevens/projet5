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
      <?php
                foreach ($itemManager->getItems($currentPage, $parPage, 'ItemsController') as $items): ?>

      <div class="col-12 col-sm-6 col-lg-3 my-4 d-flex justify-content-center">
        <div class="card bg-product" style="width: 18rem;">
          <img src="data:image/png;base64,<?= base64_encode($items->item_img) ?>" class="card-img-top img-size img-fluid" alt="...">
          <div class="card-body">
            <ul class="list-unstyled mb-2">
              <li class="card-title text-dark fs-3"><?= $items->item_name; ?></li>
              <li class="card-text text-muted mt-2 fs-5"><?= $items->item_price; ?> €</li>
            </ul>
            <div class="text-center">
              <?php 
                foreach ($itemManager->getSize($items->id, 'ItemsController') as $sizes): 
                  if ($sizes->item_numberofs < 1 || $sizes->item_numberofm < 1 || $sizes->item_numberofl < 1 || $sizes->item_numberofxl < 1 || $sizes->item_numberofxxl < 1) {
                    ?>
                      <a href="index.php?p=stock&amp;id=<?= $items->id; ?>" class="btn btn-danger w-100">Stock</a>
                    <?php
                  }
                  elseif ($sizes->item_numberofs < 30 || $sizes->item_numberofm < 30 || $sizes->item_numberofl < 30 || $sizes->item_numberofxl < 30 || $sizes->item_numberofxxl < 30) {
                    ?>
                    <a href="index.php?p=stock&amp;id=<?= $items->id; ?>" class="btn btn-warning w-100">Stock</a>
                    <?php
                  } 
                  else
                  {
                    ?>
                    <a href="index.php?p=stock&amp;id=<?= $items->id; ?>" class="btn btn-success w-100">Stock</a>
                    <?php
                  }
                endforeach; ?>
            </div>
            <div class="text-center">
            <a href="index.php?p=modifyitempage&amp;id=<?= $items->id; ?>" class="btn btn-info mt-2 w-100">Modifier</a>
            </div>
            <div class="text-center">
            <a href="index.php?p=deleteitem&amp;id=<?= $items->id; ?>" class="btn btn-danger mt-2 w-100">Suprimer</a>
            </div>
          </div>
        </div>
      </div>
        <?php endforeach; ?>
        <ul class="pagination justify-content-center">
              <?php for ($i=1; $i <= $numberPage; $i++) { 
              if ($i == $page) {
                ?>
                 <li class="page-item"><a class="page-link" href="index.php?p=productmanagement&amp;pagenumber=<?= $i ?>"><?= $i ?></a></li>
                  <?php
              } else {
                ?>
                <li class="page-item"><a class="page-link" href="index.php?p=productmanagement&amp;pagenumber=<?= $i ?>"><?= $i ?></a></li>
                <?php
              }
            }
            ?>
    </div>
  </div>

  <?php
    require 'view/footer.php'
  ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>