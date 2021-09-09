<?php

require('../bd/connexionDB.php');


  
  ini_set('display_errors', '-1');

 
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

<html lang="fr">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Utilisateurs du site</title>

  </head>

  <body>      

    <div>Administrateur</div>

    <table>

      <tr>

        <th>Nom</th> 

        <th>Prénom</th>

        <th>Grerez cet Administrateur</th>

      </tr>

      <?php

        foreach($afficher_admin as $aa){

        ?>

          <tr>          

            <td><?= $aa['lastname'] ?></td>

            <td><?= $aa['firstname'] ?></td>

            <td><a href="modify-admin.php?id=<?= $aa['id'] ?>">Aller au profil</a></td>

          </tr>

        <?php

        }

      ?>

    </table>

  </body>

</html>