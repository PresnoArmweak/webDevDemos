<?php
    $games_path = __DIR__ . '/games';

    if (!is_dir($games_path)) {
        mkdir($games_path, 0775);
    }

    $games = [
        [ 'name' => 'Resident Evil 7', 'console' => 'Nintendo Switch', 'price' => 59.99 ],
        [ 'name' => 'Cyberpunk 2077', 'console' => 'PC', 'price' => 59.99 ],
        [ 'name' => 'Payday 2', 'console' => 'PlayStation 4', 'price' => 39.99 ],
        [ 'name' => 'Borderlands 4', 'console' => 'PlayStation 4', 'price' => 69.99 ]
    ];

    $games_full_path = $games_path . '/games.csv';

    $file = fopen($games_full_path, 'wb');

    foreach ($games as $game) {
        fputcsv($file, $game);
    }
    fclose($file);
    echo"File created at: $games_full_path\n";