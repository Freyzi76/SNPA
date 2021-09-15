<?php

if (isset($_GET['option'])) {

$option = htmlentities(trim($_GET['option']));

} else {

$option = 'dashboard';

}

?>