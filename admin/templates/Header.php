<nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Expand at md</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
          
            <span class="navbar-toggler-icon"></span>

        </button>

            <div class="collapse navbar-collapse" id="navbarsExample04">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                            <li class="nav-item">

                                <a class="nav-link active" aria-current="page" href="../admin?page=login">Home</a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link disabled"><?php// echo $_SESSION['lastname'];?> </a>

                            </li>

                            
                    </ul>

                    <?php

                        if(!isset($_SESSION['id'])) { // Si on ne détecte pas de session alors on verra les liens ci-dessous

                    ?>

                        <div class="text-end">
                            <a href="../admin?page=login" class="btn btn-primary">Connexion</a>
                            <a href="../admin?page=forgetPassword" class="btn btn-secondary">Mot de passe oublié</a>
                        </div>

                    <?php

                        }else{

                    ?>

                        <div class="text-end">
                            <a href="../admin?page=logOut" class="btn btn-danger">Déconnexion</a>
                        </div>

                    <?php

                    }

                    ?>


            <div>

    </div>

</nav>