<?php
require_once __DIR__ . '/../model/bookModel.php';


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

function showBooks(){
    // print_r($_GET);
    global $header;
    global $footer;
    $books = getBooks();
    include $header;
    include __DIR__ . '/../views/books.php';
    include $footer;
}