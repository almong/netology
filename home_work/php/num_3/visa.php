<?php
if (!empty($argv[1])){
//Страны и режим въезда PHP Нетология
    $country_csv = file_get_contents("https://data.gov.ru/opendata/7704206201-country/data-20180609T0649-structure-20180609T0649.csv?encoding=UTF-8");
    //print_r($country_csv);
    $err = 0;
    $file = 'visa.csv';
    file_put_contents($file, $country_csv);
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
} else {
    echo 'Нет данных для поиска';
}
?>