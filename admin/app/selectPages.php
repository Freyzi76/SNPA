<?php

if (isset($_GET['page'])) {

$content = htmlentities(trim($_GET['page']));

} else {

$content = 'home';

}

?>