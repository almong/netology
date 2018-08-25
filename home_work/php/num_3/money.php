<?php
    //Учёт расходов PHP Нетолония (https://github.com/netology-code/php-2-homeworks/tree/master/files/money)
    $date = date('Y-m-d');
    $sum = 0;
    $file = 'money.csv';
    $input = $argv;
    $input = array_splice($input, 1);
    $input = implode(" ", $input);
    //Считаем затраты за день
    if ($argv[1] === "--today"){
        if (file_exists($file)){
            $fc = file('money.csv');
            for ($i=0; $i<count($fc); $i++){
                $arr = explode(",", $fc[$i]);
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
    $money_str = "$date,$argv[1],$description\r\n";
    if (is_writable($file)){
        file_put_contents($file, $money_str, FILE_APPEND);
    } else {
        echo 'Ошибка открытия файла для записи';
    }
    } else {
        echo 'Ошибка! Аргументы не заданы. Укажите флаг --today или запустите скрипт с аргументами {цена} и {описание покупки}';
    }
?>