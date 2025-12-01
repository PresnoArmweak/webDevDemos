<!-- made by Preston Armstrong -->

<?php

    $Books = [
        'The Road' => [
            'author' => 'Cormac McCarthy',
            'year' => 2006,
            'genre' => 'Post-apocalyptic',
            'stock' => 0,
            'return_date' => '9/20/2024',
            'due_date' => '9/20/2024'
        ],
        'The Spider' => [
            'author' => 'Barry Levine',
            'year' => 2020,
            'genre' => 'True Crime',
            'stock' => 3,
            'return_date' => '12/31/2024',
            'due_date' => '1/15/2024'
        ],
        'Roadside Picnic' => [
            'author' => 'Arkady and Boris Strugatsky',
            'year' => 1972,
            'genre' => 'Science Fiction',
            'stock' => 2,
            'return_date' => '10/01/2024',
            'due_date' => '10/24/2024'
        ],
        'Blood Meridian' => [
            'author' => 'Cormac McCarthy',
            'year' => 1985,
            'genre' => 'Western',
            'stock' => 4,
            'return_date' => '11/05/2024',
            'due_date' => '11/20/2024'
        ]
    ];


    if ($_GET) {//pulls data from the form and adds it to the array
        $name = trim($_GET['name'] ?? '');
        $author = trim($_GET['author'] ?? '');
        $year = intval($_GET['year'] ?? 0);
        $genre = trim($_GET['genre'] ?? '');
        $stock = intval($_GET['stock'] ?? 0);
        $return_date = trim($_GET['return_date'] ?? '');
        $due_date = trim($_GET['due_date'] ?? '');
        returnABook($name, $author, $year, $genre, $stock, $return_date, $due_date);
    }

    function checkStock($bookTitle){//checks if the book is in stock
        global $Books;
        if (isset($Books[$bookTitle])) {
            return $Books[$bookTitle]['stock'] > 0 ? 'In Stock' : 'Out of Stock';
        } else {
            return 'Book not found';
        }
    }

    function returnABook($name, $author, $year, $genre, $stock, $return_date, $due_date) {//formats a book to be added to the array
        global $Books;
        if (isset($Books[$name])) {
            $Books[$name]['stock'] += $stock;
        } else {
            $Books[$name] = [
                'author' => $author,
                'year' => $year,
                'genre' => $genre,
                'stock' => $stock
            ];
        }
        // Persist provided dates so the UI can compute due status
        if (!empty($return_date)) {
            $Books[$name]['return_date'] = $return_date;
        }
        if (!empty($due_date)) {
            $Books[$name]['due_date'] = $due_date;
        }
    }

    //formates the return date to raw seconds
    function returnReturnDate($return_dateRaw) {
        return !empty($return_dateRaw) ? strtotime($return_dateRaw) : false;
    }

    function returnDueDate($due_dateRaw) {
        return !empty($due_dateRaw) ? strtotime($due_dateRaw) : false;
    }

    function checkDueStatus($returnTs, $dueTs) {
        // Handle invalid or missing dates
        if ($returnTs === false || $dueTs === false) {
            return "Unknown";
        }

        $diffSeconds = $returnTs - $dueTs;

        if ($diffSeconds === 0) {
            return "Due today";
        }

        $isOverdue = $diffSeconds > 0;
        $diffSeconds = abs($diffSeconds);

        // Convert seconds into days, then break down into years/months/days
        $days = floor($diffSeconds / 86400);// rounds down to not have partial dates

        $years = floor($days / 365);
        $days -= $years * 365;

        $months = floor($days / 30);
        $days -= $months * 30;

        $parts = [];
        if ($years > 0) $parts[] = $years . " year" . ($years > 1 ? "s" : "");
        if ($months > 0) $parts[] = $months . " month" . ($months > 1 ? "s" : "");
        if ($days > 0) $parts[] = $days . " day" . ($days > 1 ? "s" : "");

        if (empty($parts)) {
            $parts[] = "0 days";
        }

        $diffString = implode(", ", $parts);//rejoins all of the parts

        if ($isOverdue) {
            return "Overdue by $diffString";
        } else {
            return "Due in $diffString";
        }
    }

