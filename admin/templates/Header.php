

<header class="p-3 bg-dark text-white">

</div>

    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
          <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
          <li><a href="#" class="nav-link px-2 text-white">About</a></li>
        </ul>


        <?php

            if(!isset($_SESSION['id'])) { // Si on ne détecte pas de session alors on verra les liens ci-dessous

        ?>

        <div class="text-end">
            <a href="../admin/login.php" class="btn btn-primary">Connexion</a>
            <a href="../admin/forget-password.php" class="btn btn-secondary">Mot de passe oublié</a>
        </div>

        <?php

            }else{

        ?>

        <div class="text-end">
            <a href="deconnexion.php" class="btn btn-danger">Déconnexion</a>
        </div>

        <?php

        }

        ?>

    </div>

</header>