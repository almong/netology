<?php
//Страны и режим въезда PHP Нетология
    $err = 0;
    $file = 'visa.csv';
    if (is_writable($file)){
        $fc = file('visa.csv');
        for ($i=0; $i<count($fc); $i++){
            $arr = explode(",", $fc[$i]);
            $country = str_replace("\"", "",$arr[1]);
            if ($argv[1] === $country){
                $visa = str_replace("\"", "",$arr[4]);
                $err = 0;
                echo "$country: $visa";
                break;
            } else {}
            $lev = levenshtein($argv[1],$country);
            if ($lev <= 1){
                $visa = str_replace("\"", "",$arr[4]);
                $err = 0;
                echo "$country: $visa";
                break;
            } else {
                $err = 1;
            }
        }
        if ($err == 1){
            echo 'Ошибка ввода страны или страна не найдена';
        }
    } else {
        echo 'Ошибка чтения файла';
    }

?>