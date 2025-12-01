<?php 
    require_once __DIR__ . '/controller/mainController.php';


    $route = $_GET['route'] ?? 'home';
    
    switch ($route) {
        case 'home':
        case 'hours':
        case 'locations':
            showPage($route);
            break;
        case 'menu':
            showMenu();
            break;

        default:
            showPage('home');
    }