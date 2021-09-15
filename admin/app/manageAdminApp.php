<?php

if (!isset($_SESSION['id'])){
    header('Location: ../admin?page=home'); 
    exit;
}

if (!isset($_SESSION['SP'])){
    header('Location: ../admin?page=home'); 
    exit;
}

if ($_SESSION['SP'] != 1){
    header('Location: ../admin?page=home'); 
    exit;
}  

  // On récupère tous les utilisateurs sauf l'utilisateur en cours

  $afficher_admin = $DB->query("SELECT * 

    FROM tadmin 

    WHERE id <> ?",

    array($_SESSION['id']));

  $afficher_admin = $afficher_admin->fetchAll(); // fetchAll() permet de récupérer plusieurs enregistrements

?>