<?php
echo 'test1';
$output = exec('sudo /var/www/script.sh');
echo "<pre>$output</pre>";
?>
