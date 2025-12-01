<?php

    function esc_html(string $text){
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    }

    function read_csv_rows(string $path){
        if (!is_file($path)) {
            return [];
        }
        $rows = [];
        $file = fopen($path, 'rb');
        if ($file === false) {
            return [];
        }
        while(!feof($file)){
            $row = fgetcsv($file);
            if ($row !== false) {
                array_push($rows, $row);
            }
        }
        fclose($file);
        return $rows;
    }

    function write_csv_rows(string $path, array $rows){
        try{
            $file = fopen($path, 'wb');
            foreach($rows as $row){
                fputcsv($file, $row);
            }
        } catch (Exception $e ){
            echo("An error has occured: " . $e->getMessage() ."\n");
            return false;
        }

        return true;
    }