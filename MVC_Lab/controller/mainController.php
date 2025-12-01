<?php
include __DIR__ . '/../model/menuModel.php';

$header = __DIR__ . '/../partials/header.php';
$footer = __DIR__ . '/../partials/footer.php';



function showPage($view){

        global $header;
        global $footer;

        $view = __DIR__ . "/../views/$view.php";
        include $header;
        include $view;
        include $footer; 
        
        
    }

function showMenu(){

    global $header;
    global $footer;
    $menu = getMenu();
    include $header;
    include __DIR__ . '/../views/menu.php';
    include $footer;
}