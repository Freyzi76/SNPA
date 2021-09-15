<?php

  session_destroy();

  header('location: ../admin?page=home'); // la page sur lequel l'utilisateur sera redirigé.

  exit;

?>