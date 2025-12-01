<?php
require_once __DIR__ . '/controllers/siteController.php';



// $route = trim($_GET['route'] ?? 'home', '');
$route = $_GET['route'] ?? 'home';
// echo ($route);
// print_r($_GET);
switch ($route) {
    case 'about':
    case 'home':
    case 'contact':
        showPage($route);
        break;
    case 'books':
        showBooks();
        break;

    default:
        showPage('404');
}