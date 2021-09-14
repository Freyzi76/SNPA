<?php

ini_set('display_errors', '-1');
error_reporting( E_ALL );

  session_start(); 

  // Fichier PHP contenant la connexion à votre BDD

  require('../bd/connexionDB.php'); 

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

    <?= require('templates/Header.php'); ?>

    <main>

    <?= require('pages/index.php'); ?>

    </main>
    

  </body>

</html>