<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="public/css/hero.css">
    <link rel="stylesheet" type="text/css" href="public/css/form.css">
    <link rel="icon" type="image/png" sizes="16x16" href="public/img/favicon.png"/>
    
    <title>SQUARE | Boutique en ligne</title>
  </head>
  <body class="bg-white bg-gradient">
    
  <?php
    require 'view/header.php'
  ?>

  <div class="container page">
    <div class="row">
      <div class="col mt-5">
        <h1 class="text-center mt-5">Inscription</h1>
        <form id="form" class="mb-3" method="post" action="index.php?p=insert-user">
          <div class="mb-4 w-50">
            <label for="mail" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="mail" name="email">
          </div>
          <div class="mb-4 w-50">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="mb-4 w-50">
            <label for="Comf-password" class="form-label">Comfirmer votre mot de passe</label>
            <input type="password" class="form-control" id="Comf-password" name="Comf-password">
          </div>
          <div class="result text-danger fs-4"></div>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-warning my-3">Inscription</button>
          </div>
        </form>
        <p class="text-center">N'hésiter pas a compléter vos informations par la suite!</p>
      </div>
    </div>
  </div>

  <?php
    require 'view/footer.php'
  ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script type="text/javascript" src="public/js/registration.js"></script>
  </body>
</html>