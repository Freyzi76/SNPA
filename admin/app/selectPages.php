<?php

if (isset($_GET['page'])) {

$content = htmlentities(strtolower(trim($_GET['page'])));

} else {

$content = 'home';

}

?>