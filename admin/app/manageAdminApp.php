<?php

if (!isset($_SESSION['id'])){
    header('Location: index.php'); 
    exit;
}

if (!isset($_SESSION['SP'])){
    header('Location: index.php'); 
    exit;
}

if ($_SESSION['SP'] != 1){
    header('Location: index.php'); 
    exit;
}  

  // On récupère tous les utilisateurs sauf l'utilisateur en cours

  $afficher_admin = $DB->query("SELECT * 

    FROM tadmin 

    WHERE id <> ?",

    array($_SESSION['id']));

  $afficher_admin = $afficher_admin->fetchAll(); // fetchAll() permet de récupérer plusieurs enregistrements

?>