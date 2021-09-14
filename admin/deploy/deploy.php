
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

ini_set('display_errors', '-1');
error_reporting( E_ALL );

$command = $_POST['command'];
echo "<pre>";
echo shell_exec($command);
echo "</pre>";

?>


<form action="deploy.php" method="post">
commande shell <input type="text" name="command">
<input type="submit">
</form>


