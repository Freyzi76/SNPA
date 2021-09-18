<?php

ini_set('display_errors', '-1');
error_reporting( E_ALL );

require 'app/Form.php';


$form = new Form;

?>



<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SNPA</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</head>
<body>

<p> je me mets a jour avec un script depuis putty mon proprio est heureux :)<p>

<button class="btn btn-warning " onclick="location.href='/admin';">ADMIN</button>


<form action="#" method="post">

<?php 

echo $form->input('username');
echo $form->input('password');
echo $form->submit();

?>


</form>
  
</body>
</html>


