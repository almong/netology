<?php
//Учёт расходов PHP Нетолония (https://github.com/netology-code/php-2-homeworks/tree/master/files/money)
    $date = date('Y-m-d');
    $sum = 0;
    $file = __DIR__ . '/money.csv';
    $input = $argv;
    $input = array_splice($input, 1);
    $input = implode(" ", $input);
//Считаем затраты за день
    if (isset($argv[1])){
        if ($argv[1] === "--today"){
            if (file_exists($file)){
                $fc = file('money.csv');
                for ($i=0; $i<count($fc); $i++){
                    $arr = str_getcsv($fc[$i], ",");
                    if ($date === $arr[0]){
                        $sum += $arr[1];
                    }
                }
                echo "$date расход за день: $sum";
            } else {
                echo 'Файл не существует';
            }
//Проверяем ввод по шаблону
        } elseif (preg_match('/^(\d+|(\d+\.\d{1,2})) \w/iu', $input)) {
            $description = array_splice($argv, 2);
            $description = implode(" ", $description);
            $money_arr = [$date, $argv[1], $description];
            $fp = fopen($file, 'a');
            
            if (is_writable($file)){
                fputcsv($fp, $money_arr, ",");
                fclose($fp);
            } else {
                echo 'Ошибка открытия файла для записи';
            }
        } else {
            echo 'Ошибка! Аргументы не заданы. Укажите флаг --today или запустите скрипт с аргументами {цена} и {описание покупки}';
        }
    } else {
        echo "Ошибка! Аргументы не заданы. Укажите флаг --today или запустите скрипт с аргументами {цена} и {описание покупки}\r\n";
    }
?>