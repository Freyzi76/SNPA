<?php

  session_destroy();

  header('location: ?page=home'); // la page sur lequel l'utilisateur sera redirigé.

  exit;

?>