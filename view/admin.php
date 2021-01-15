<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="public/css/hero.css">
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    
    <title>Hello, world!</title>
  </head>
  <body class="bg-white bg-gradient">
    
  <?php
    require 'view/header.php'
  ?>

  <div class="container page">
    <div class="row ">
      <div class="col text-center">
        <a class="btn btn-warning w-75 profile-btn fs-2 fw-bold" href="index.php?p=addproduct"><i class="fas fa-plus"></i><i class="fas fa-tshirt"></i><br>Ajout d'article</a>
      </div>
      <div class="col text-center">
        <a class="btn btn-warning w-75 profile-btn fs-2 fw-bold" href="index.php?p=productmanagement"><i class="fas fa-box-open"></i></i><br>Gestion des stocks</a>
      </div>
    </div>
  </div>

  <?php
    require 'view/footer.php'
  ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>