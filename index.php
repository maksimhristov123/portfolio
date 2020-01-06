<?php
$site_url = 'http://' . $_SERVER['HTTP_HOST'];

require_once ('templates/header.php');
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $file = "inc/" .$page. ".php";
    if (file_exists($file)) {
        require_once $file;
    }else {
        require_once ('home.php');
    }
}else {
    require_once ('home.php');
}
require_once ('templates/footer.php');

?>
