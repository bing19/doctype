<?php

include 'menu/topmenu.php';
include 'menu/mainmenu.php';
include 'work-with-file.php';
include 'view/header.php';


if(isset($_GET['page']) && $_GET['page'] != '') {
    $page = $_GET['page'];
} else {
    $page = 'main';
}
if(file_exists('view/' . $page . '.php')) {
    include 'view/' . $page . '.php';
} else {
    include 'view/404.php';
}

include 'view/footer.php';
?>


