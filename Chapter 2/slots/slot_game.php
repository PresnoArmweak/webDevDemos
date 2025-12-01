<?php
    $PossibleSymbols = ['A', 'B', 'C'];
    $TotalWinnings = 0;
    $Spins = 0;
    while ($TotalWinnings < 500 and $Spins < 20){
        $Winnings = 0;
        $Spins++;
        $spin = "";
        for ($i = 0; $i < 3; $i++){
            $spin .= $PossibleSymbols[array_rand($PossibleSymbols)];
        }
            $Winnings += match ($spin) {
                'AAA', 'BBB', 'CCC' => 100,
                'AAB', 'ABA', 'ABB',
                'BAA', 'BAB', 'BBA',
                'ACC', 'CAC', 'CCA',
                'BBC', 'BCB', 'CBB',
                'AAC', 'ACA', 'CAA',
                'BCC', 'BCB', 'CBB' => 50,
                default => 0,
            };
        $TotalWinnings += $Winnings;
        echo "$spin Payoff $Winnings Total $TotalWinnings\n";
    }
    echo "Finished in $Spins spins with total winnings of $TotalWinnings\n";



?>