<?php
    if (!empty($argv[1])){
        $query = array_splice($argv, 1);
        $query = implode(" ", $query);
        $code_str = urlencode($query);
        $json_str = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=$code_str");
        $obj = json_decode($json_str);
        
        if (json_last_error() == 'JSON_ERROR_NONE') {
            $file = __DIR__ . '/books.csv';
            $id = $obj->items[0]->id;
            $title = $obj->items[0]->volumeInfo->title;
            
            if (!isset($obj->items[0]->volumeInfo->authors[0])){
                $authors = 'none';
            } else {
                $authors = $obj->items[0]->volumeInfo->authors[0];
            }
            
            $csv_str = "$id,$title,$authors\r\n";
            if (is_writable($file)){
                file_put_contents($file, $csv_str, FILE_APPEND);
            } else {
                echo 'Ошибка открытия файла для записи';
            }
        } else {
            echo "Ошибка, обработки JSON\r\n";
            // throw new UnexpectedValueException(json_last_error_msg());
        } 
    }else {
        echo 'Нет данных для поиска';
    }
?>