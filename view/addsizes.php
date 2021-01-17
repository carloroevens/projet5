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
    
    <title>Hello, world!</title>
  </head>
  <body class="bg-white bg-gradient">
    
  <?php
    require 'view/header.php'
  ?>

  <div class="container page">
    <div class="row">
      <div class="col mt-5">
        <h1 class="text-center my-5">Ajouter le nombre de taille</h1>
        <form class="mb-3" method="post" action="index.php?p=addsizes&amp;id=<?= $_GET['id']; ?>">
          <div class="mb-4 w-50">
            <label for="S" class="form-label">Taille S</label>
            <input type="number" class="form-control" id="S" name="numberofs">
          </div>
          <div class="mb-4 w-50">
            <label for="M" class="form-label">Taille M</label>
            <input type="number" class="form-control" id="M" name="numberofm">
          </div>
          <div class="mb-4 w-50">
            <label for="L" class="form-label">Taille L</label>
            <input type="number" class="form-control" id="L" name="numberofl">
          </div>
          <div class="mb-4 w-50">
            <label for="XL" class="form-label">Taille XL</label>
            <input type="number" class="form-control" id="XL" name="numberofxl">
          </div>
          <div class="mb-4 w-50">
            <label for="XXL" class="form-label">Taille XXL</label>
            <input type="number" class="form-control" id="XXL" name="numberofxxl">
          </div>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-warning my-3">Ajouter les tailles</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php
    require 'view/footer.php'
  ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>