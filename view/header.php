<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand mx-lg-5 my-2" href="index.php?p=home">SQUARE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav mx-lg-5">
          <li class="nav-item ms-lg-4">
            <a class="nav-link link" href="index.php?p=shop">VÊTEMENTS</a>
          </li>
          <li class="nav-item ms-lg-5">
            <a class="nav-link link" href="#">COLLECTIONS</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto me-5">
          <li class="nav-item me-3">
            <a class="nav-link link" href="#">Panier</a>
          </li>
          <?php
          if (isset($_SESSION['loger']) && $_SESSION['loger'] === 'yes') {
            ?>
            <li class="nav-item me-3">
              <a class="nav-link link" href="index.php?p=profile">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link" href="index.php?p=disconnection">Déconnexion</a>
            </li>
            <?php
          } else {
            ?>
            <li class="nav-item">
              <a class="nav-link link" href="index.php?p=connexionpage">Connexion</a>
            </li>
            <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>