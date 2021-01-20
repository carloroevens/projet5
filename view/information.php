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
        <h1 class="text-center mt-5">Informations</h1>
        <form class="mb-3" method="post" action="index.php?p=modifyinfos">
          <div class="mb-4 w-50">
            <label for="mail" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="mail" name="email" value="<?= htmlspecialchars($user->user_mail) ?>">
          </div>
          <div class="mb-4 w-50">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="mb-4 w-50">
            <label for="name" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($user->user_name) ?>">
          </div>
          <div class="mb-4 w-50">
            <label for="lastname" class="form-label">Nom</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?= htmlspecialchars($user->user_lastname) ?>">
          </div>
          <div class="mb-4 w-50">
            <label for="birthday" class="form-label">Date de naissance</label>
            <input type="date" class="form-control" id="birthday" name="birthday" value="<?= htmlspecialchars($user->user_birthday) ?>">
          </div>
          <div class="mb-4 w-50">
            <label for="adress" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adress" name="adress" value="<?= htmlspecialchars($user->user_adress) ?>">
          </div>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-warning my-3">Modifier</button>
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