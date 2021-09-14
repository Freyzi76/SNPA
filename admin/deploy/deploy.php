
<?php

ini_set('display_errors', '-1');
error_reporting( E_ALL );

$command = $_POST['command'];
echo "<pre>";
echo shell_exec($command);
echo "</pre>";

shell_exec('sh /home/hugo76113/script.sh');

shell_exec('sh /home/hugo76113/script.sh > /home/scripts/log.txt &');

echo "hey";

?>



<form action="deploy.php" method="post">
commande shell <input type="text" name="command">
<input type="submit">
</form>


