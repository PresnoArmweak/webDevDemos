<?php
/*
  RULES
  - Create each function listed below.
  - Some functions must RETURN a value, others must DISPLAY output directly.
  - Keep functions independent. No globals or shared state.

  What to submit:
  - functions.php (this file with your implementations)
*/

/**
 * (P1 – 5 pts) greet_fullname
 *
 * Function signature:
 *   greet_fullname(string $first [, string $last = "Not provided"]): string
 *
 * Description:
 *   Returns "Hello, {first} {last}".
 *
 * Examples:
 *   greet_fullname("John", "Smith") → "Hello, John Smith"
 *   greet_fullname("Alice") → "Hello, Alice Not provided"
 *
 * Notes:
 *   This function must RETURN the string, not echo.
 */
function greet_fullname(string $first, $last = "Not provided"){
  return "Hello, $first $last";
}

echo(greet_fullname("John", "Smith\n"));

/**
 * (P2 – 5 pts) echo_colors
 *
 * Function signature:
 *   echo_colors(): void
 *
 * Description:
 *   Create an associative array named $colors with keys "red", "green", "blue"
 *   and values set to their hex codes:
 *     red   → #FF0000
 *     green → #00FF00
 *     blue  → #0000FF
 *
 *   Loop through the array and DISPLAY each pair as "key: value", one per line.
 *
 * Example (displayed):
 *   red: #FF0000
 *   green: #00FF00
 *   blue: #0000FF
 *
 * Notes:
 *   This function should DISPLAY output directly (echo/print), not return a value.
 */


function echo_colors(){
  $colors = [
    "red" => "#FF0000",
    "green" => "#00FF00",
    "blue" => "#0000FF"
  ];
    foreach($colors as $color => $code){
    echo("$color: $code\n");
  }
}

echo_colors();

$fruits = array("Apple", "Banana", "Cherry");
$fruits[] = "Orange";

$cars = array("brand" => "Ford", "model" => "Mustang");
$cars["color"] = "Red";

$fruits = array("Apple", "Banana", "Cherry");
array_push($fruits, "Orange", "Kiwi", "Lemon");

$cars = array("brand" => "Ford", "model" => "Mustang");
$cars += ["color" => "red", "year" => 1964];


$i = 1;
while ($i < 6) {
  echo $i;
  $i++;
}
