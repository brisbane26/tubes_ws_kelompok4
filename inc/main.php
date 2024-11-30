<?php

if (isset($_GET['p'])) {  // Periksa apakah key 'p' ada
    switch ($_GET['p']) {
        case "find":
            include "./page/find.php";
            break;
        case "about":
            include "./page/about.php";
            break;
        case "class":
            include "./page/class.php";
            break;
        case "detail":
            include "./page/detail.php";
            break;
        default:
            echo "
                <div class='not-found'>404 Page Not Found</div>
            ";
            break;
    }
} else {
    include "./page/home.php";
}
