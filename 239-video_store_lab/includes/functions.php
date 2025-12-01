<?php
    function esc_html($string) {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
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
    function write_csv_rows(string $path, array $rows): bool{

        $fh = fopen($path, 'wb');
        if ($fh === false) {
            return false;
        }
        foreach ($rows as $row) {
            fputcsv($fh, $row);
        }
        fclose($fh);
        return true;
    }