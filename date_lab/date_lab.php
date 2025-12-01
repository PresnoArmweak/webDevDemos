<?php
    function showNow(){
        $currentTime = time();
        echo($currentTime . " Time in seconds\n");
        echo(date("m-d-Y h:i") . " Current time \n");
        echo("\n");
    }

    showNow();

    function showStringDate($str){
        $givenTimeInSec = strtotime($str);
        echo($givenTimeInSec . " Given time in seconds\n");
        echo(date("m-d-Y h:i", $givenTimeInSec) . " Given time \n");
        echo("\n");
    }
    showStringDate("next Friday");
    showStringDate("2025-12-25");

    function showFourthOfJuly(){
        $dateOf4th = mktime(9,0,null,7,4,2026);
        $dateOf4th = date("m-d-Y h:i", $dateOf4th);
        echo($dateOf4th . " Date of the 4th of July\n");
    }

    showFourthOfJuly();

    function addThirtyDaysBySeconds(){
        $ThirtyDaysFromNow = time() + (30 * 24 * 60 * 60);
        echo(date("m-d-Y h:i", $ThirtyDaysFromNow) . " Thirty days from now \n");
        echo("\n");
    }

    addThirtyDaysBySeconds();

    function addOneYearRelative(){
        $oneYearFromNow =strtotime("1 year");
        echo(date("m-d-Y h:i", $oneYearFromNow) . " One year from now\n");
        echo("\n");
    }

    addOneYearRelative();


    function showCentralTime(){
        echo(date("m-d-Y h:i") . "The current time in GMT \n");
        date_default_timezone_set("America/Chicago");
        echo(date("m-d-Y h:i") . "The current time in CST \n");
        echo("\n");
    }

    showCentralTime();
?>