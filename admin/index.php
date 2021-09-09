<?php

ini_set('display_errors', '1');

  // Permet de savoir s'il y a une session. 

  // C'est-à-dire si un utilisateur s'est connecté à votre site 

  session_start(); 

  

  // Fichier PHP contenant la connexion à votre BDD

  include('../bd/connexionDB.php'); 

?>

<html>

  <head>

    <meta charset="utf-8"/>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../Admin/css/style.css">

    <title>Admin</title>


  </head>

  <body>

    <h1>Admin panel</h1>

    <?php

      if(!isset($_SESSION['id'])) { // Si on ne détecte pas de session alors on verra les liens ci-dessous

    ?>

    <div class="container-fluid ">

      <a href="../admin/login.php" class="btn btn-primary">Connexion</a>

      <a href="motdepasse.php" class="btn btn-secondary">Mot de passe oublié</a>

    </div>



      <?php

        }else { // Sinon s'il y a une session alors on verra les liens ci-dessous

          if($_SESSION['SP'] == 1) {

            ?>

            <a href="add-admin.php">Gerez Les Administrateur</a>
            <br>
            <a href="manage-admin.php">Gerez Les Administrateur</a>
            <br>


            <?php


          }

      ?>



          <a href="add-item.php">Ajouter un produit</a>

          <br>
          
          <a href="deconnexion.php">Déconnexion</a>


 

    <?php
        
      } 

    ?>

  </body>

</html>