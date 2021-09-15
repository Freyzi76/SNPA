<?php

  session_destroy();

  echo ' Destroy ';

  header('location: http://hugo-marc.xyz/admin?page=home'); // la page sur lequel l'utilisateur sera redirigé.

  exit;

?>