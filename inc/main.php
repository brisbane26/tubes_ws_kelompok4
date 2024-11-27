<?php

if (isset($_GET['p'])) {  // Periksa apakah key 'p' ada
    switch ($_GET['p']) {
        case "search":
            include "./page/search.php";
            break;
        case "about":
            include "./page/about.php";
            break;
        case "class":
            include "./page/class.php";
            break;
        case "single":
            include "./page/single.php";
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
