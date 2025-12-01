<?php
    //ARRAYS
    $cars = array("Ferarri", "Camaro", "BMW", "Mercedes");
    $games = ['Animal Crossing', "Herry Potter"];
    //print_r($cars)
    // for ($i = 0; $i < count($cars); $i++)
    // {
    //     echo($cars[$i] . "\n");
    // }

    // foreach($cars as $car)
    // {
    //     echo ($car);
    // }

    //Associative Arrays
    $student1 = [
        'name' => "Mitzy",
        'id' => 123456,
        'grade' => 'A'
    ];
    print_r($student1);
    echo $student1['name'];


    $student2 = [
        'name' => "Preston",
        'id' => 768856,
        'grade' => 'B'
    ];
    

    $roster239 = [
        $student1,
        $student2,
        [
            'name' => "Stitch",
            'id' => 626,
            'grade' => 'D'
        ]
    ];
    // print_r($roster239);
    // echo($roster239[2]['name']);
    foreach($roster239 as $student)
    {
        //print_r($student);
        echo($student['name'] . " - " . $student['grade'] . "\n");
        echo("{$student['name']} - {$student['grade']}");

    }
?>