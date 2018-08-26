<?php
if (!empty($argv[1])){
//Страны и режим въезда PHP Нетология
    $country_csv = file_get_contents("https://data.gov.ru/opendata/7704206201-country/data-20180609T0649-structure-20180609T0649.csv?encoding=UTF-8");
    $file =  __DIR__ . '/visa.csv';
    file_put_contents($file, $country_csv);
    $err = 0;
    $ok = 0;
    
    if (($fp = fopen($file, 'r')) !== FALSE){
        while (($data = fgetcsv($fp, 1000, ',')) !== FALSE){
            $lev = levenshtein($argv[1], $data[1]);
            if ($lev == 0){
                $ok = 1;
                $res = $data[1] . ': ' . $data[4] . "\r\n";
                break;
            } elseif ($lev <= 1){
                $ok = 1;
                $res = $data[1] . ': ' . $data[4] . "\r\n";
            } elseif ($lev <= 3 && $ok == 0){
                $ok = 1;
                $res = $data[1] . ': ' . $data[4] . "\r\n";
            } else {
                $err = 1;
            }
        }
    } else {
        echo 'Ошибка чтения файла';
    }
    fclose($fp);
    if ($err == 1 && $ok == 0){
        echo "Ошибка ввода страны или страна не найдена\r\n";
    } else {
        echo $res;
    }
}else {
    echo "Нет данных для поиска \r\n";
}
?>