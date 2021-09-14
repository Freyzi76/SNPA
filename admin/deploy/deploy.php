<?php

ini_set('display_errors', '-1');
error_reporting( E_ALL );



echo 'test1';
$output = shell_exec('sudo cd /var/www/');
$output. = shell_exec('sudo rm -r SNPA');
echo "<pre>$output</pre>";
?>
