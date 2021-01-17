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
        <h1 class="text-center mt-5">Modifier un article</h1>
        <form class="mb-3" method="post" action="index.php?p=modifyitem&amp;id=<?= $item->id; ?>" enctype="multipart/form-data">
          <div class="mb-4 w-50">
            <label for="name" class="form-label">Titre</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $item->item_name; ?>">
          </div>
          <div class="mb-4 w-50">
            <label for="price" class="form-label">Prix</label>
            <input type="number" class="form-control" id="price" name="price" value="<?= $item->item_price; ?>">
          </div>
          <div class="mb-4 w-50">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"><?= $item->item_description; ?></textarea>
          </div>
          <div class="mb-4 w-50">
            <p><img src="data:image/png;base64,<?= base64_encode($item->item_img) ?>" class="img-fluid" alt="..."></p>
            <label for="img" class="form-label">Photo</label>
            <div id="img" class="form-text">Vous pouvais voir la photo utilisé pour le moment ci-dessus</div>
            <input class="form-control" type="file" id="img" name="img">
          </div>
          <div class="mb-4 w-50">
            <label for="category" class="form-label">Catégorie</label>
            <div id="img" class="form-text">La catégorie utiliser est <?= $item->item_category; ?></div>
            <select class="form-select" id="category" name="category">
              <option value="T-SHIRT">T-SHIRT</option>
              <option value="SWEAT">SWEAT</option>
              <option value="JEAN">JEAN</option>
              <option value="VESTE">VESTE</option>
              <option value="ACCESSOIRE">ACCESSOIRE</option>
            </select>
          </div>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-warning my-3">Modifier cette article</button>
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