<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand mx-lg-5 my-2" href="index.php?p=home"><img src="public/img/logo.png"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav mx-lg-5">
          <li class="nav-item ms-lg-4">
            <a class="nav-link link" href="index.php?p=shop&amp;pagenumber=1">VÊTEMENTS</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto me-5">
          <li class="nav-item me-3">
            <?php
              if (isset($_SESSION['panier']) && $_SESSION['panier'] > 0) {
                ?>
                <a class="nav-link link" href="index.php?p=cartpage">Panier (<?= $_SESSION['panier'] ?>) </a>
                <?php
              } else
              {
                ?>
                <a class="nav-link link" href="index.php?p=cartpage">Panier</a>
                <?php
              }
            ?>
          </li>
          <?php
          if (isset($_SESSION['loger']) && $_SESSION['loger'] === 'yes' && $_SESSION['acces'] == 0) {
            ?>
            <li class="nav-item me-3">
              <a class="nav-link link" href="index.php?p=profile">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link" href="index.php?p=disconnection">Déconnexion</a>
            </li>
            <?php
          }elseif (isset($_SESSION['acces']) && $_SESSION['acces'] == 1) {
            ?>
            <li class="nav-item me-3">
              <a class="nav-link link" href="index.php?p=profile">Profil</a>
            </li>
            <li class="nav-item me-3">
              <a class="nav-link link" href="index.php?p=admin">Administration</a>
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