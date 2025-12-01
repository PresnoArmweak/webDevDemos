<?php
    function displayWelcomeMessage(){
        echo ("Welcome to my Function Demo!");

    }

    //displayWelcomeMessage();

    function squareNumber($num){
        $square = $num * $num;
        echo ("the square of $num is $square\n");
    }

    // squareNumber(5);
    
    function multiplyNumbers($num, $multiplies = 2){
        $result = $num * $multiplies;
        echo("$num multiplies by $multiplies is $result");
    }

    // multiplyNumbers(5, 5);

    function doubleNumber($num){
        return $num * 25;
    }

    echo(doubleNumber(50));

    
?>