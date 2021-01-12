<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="public/css/hero.css">

    <title>Hello, world!</title>
  </head>
  <body class="bg-light bg-gradient">
    
  <?php
    require 'view/header.php'
  ?>

  <div class="hero">
    <img src="public/img/hero-t2.jpg" class="img-fluid" alt="...">
  </div>

  <section class="bg-dark">
    <div class="container">
      <div class="row">
        <div class="col my-5">
          <h2 class="text-light text-center mt-5">Square</h2>
          <p class="text-light text-center fs-4">Pas Le Temp De Tourner En Rond</p>
          <p class="text-light text-center fs-5 my-5">Square est une marque française de vêtement crée en 2020. Destinée aux adeptes de streetwear a conotation rap et hiphop. </p>
        </div>
      </div>
    </div>
  </section>

  <div class="container">
    <div class="row my-5">
      <div class="col-12 col-xl-4 my-3 text-center">
        <a class="position-relative" href="">
          <img class="banner img-fluid" src="public/img/square1.jpg">
          <span class="position-absolute word">Vêtements</span>
        </a>
      </div>
      <div class="col-12 col-xl-4 my-3 text-center">
        <a class="position-relative" href="">
          <img class="banner img-fluid" src="public/img/square2.jpg">
          <span class="position-absolute word">Accessoires</span>
        </a>
      </div>
      <div class="col-12 col-xl-4 my-3 text-center">
        <a class="position-relative" href="">
          <img class="banner img-fluid" src="public/img/square3.jpg">
          <span class="position-absolute word word2">NOUVELLE COLLECTION</span>
        </a>
      </div>
    </div>
    <div class="row d-flex justify-content-between">
      <div class="col-12 col-xl-5 street-bg position-relative">
        <div class="text-center content bg-gradient">
          <h2 class="display-6 mt-4"><strong>Historique des collections</strong></h2>
          <div class="hr-style my-4"></div>
          <div class="h5 mt-4">
            <ul class="list-unstyled">
              <li class="mb-4"><a class="lien" href="">Collection Hiver</a></li>
              <li><a class="lien" href="">Collection Printemps</a></li>
            </ul>
            <ul class="list-unstyled">
              <li class="mb-4"><a class="lien" href="">Collection Été</a></li>
              <li><a class="lien" href="">Collection Automne</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-12 col-xl-5 mt-5 street2-bg position-relative">
        <div class="text-center content bg-gradient">
          <h2 class="display-6 my-5"><strong>Un probléme avec ta commande ?</strong></h2>
          <div class="hr-style my-4"></div>
          <a class="lien h3" href="">N'hésite pas nous contacter</a>
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