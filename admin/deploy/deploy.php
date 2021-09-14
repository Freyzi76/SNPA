<?php

ini_set('display_errors', '-1');
error_reporting( E_ALL );



echo 'test1';
$output = shell_exec('sudo /home/hugo76113/script.sh');
echo "<pre>$output</pre>";
?>
