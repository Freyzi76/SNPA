<?php

  session_destroy();

  header('location: http://hugo-marc.xyz/admin?page=home'); // la page sur lequel l'utilisateur sera redirigé.

  exit;

?>