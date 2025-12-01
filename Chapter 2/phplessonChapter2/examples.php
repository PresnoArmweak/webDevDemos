<?php
//ternary page 76
$age = 21;
if ($age < 16) {
    $price = 5;
} else {
    $price = 10;
}   

//can be written as
$price = ($age < 16) ? 5 : 10;
echo($price);
//switch page 79
$day = 'Monday';

switch ($day) {
    case 'Monday':
        echo 'Wash on Monday';
        break;
    case 'Tuesday':
        echo 'Iron on Tuesday';
        break;
    default:
        echo 'I do not know what day it is';
        break;
}
echo ("\n");

$day = "Wed";
// match page 80
$offer = match($day) {
    'Monday' => '20% off chocolates',
    'Tuesday' => '20% off mints',
    default => 'no discount! ',
};
echo ($offer . "\n");

//foreach with indexed array
$pets = ["Dog", "Cat", "GoldFish"]; // indexed array
foreach ($pets as $key  => $value) {
    echo "Key:  $key and value: $value.\n";
}

// foreach page 91 key/value output
$animals = ["Dog" => "Bark", "Cat" => "Meow", "Cow" => "Moo"]; // associative array
foreach ($animals as $animal => $sound) {
    echo "A $animal makes a $sound sound.\n";
}

// or page 92 value output

foreach($animals as $sound) {
    echo "A $sound sound.\n";
}



