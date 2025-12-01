<?php
    echo "Hello World\n";


    //coments look like this
    /* or like this */

    $opening = 'hellow uniberse';
    $count = 6; //integer
    $price = 9.50; //double or float
    $first_name = 'bob'; //string
    $first_name = "Bob"; //string
    $is_balid = true; //boolean
    $nullVarible; //NULL ... a variable with no balue assigned
    echo ($nullVarible);
    if(!$nullVarible){
        echo("true\n");
    }else{
        echo("False\n");
    }

    echo ($opening . " " . $first_name); // concatenation
    echo("$opening and $first_name"); // interpolation
    
?>