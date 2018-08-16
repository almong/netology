<?php
// Домашнее задание №2.1 "Жестокое обращение с животными" PHP Нетология

//Исходный массив данных
$arr = ['Africa' => ['lion','giraffe','zebra','monkey'],
        'Asia' => ['panda','gaur','camel','wolf','indian crane'],
        'Europe' => ['goose','fox','walris','mountain hare'],
        'Australia' => ['bandicoot','wombat','diamond python','wood kangaroo'],
        'Suoth America' => ['arama','badger american','white egret','turkey ordinary'],
        'North America' => ['royal neck','manatee','tarantula','electric eel'],
        'Antarctica' => ['seal','sea elephant','killer whale','imperial penguin']
];
$new_arr = array();
//Ищем названия животных, состоящих из 2-х слов и создаем из них новый массив
foreach ($arr as $animal_array){
    foreach ($animal_array as $animal) {
        if (strpos($animal, ' ')){
            array_push($new_arr, $animal);
        }
    }
}
//Разбиваем новый массив на два. Первый содержит первые слова, второй вторые, будем его перемешивать
$shuffle_arr = array();
foreach ($new_arr as $str){
    $str = explode(' ', $str);
    array_push($shuffle_arr, $str[1]);
}
shuffle($shuffle_arr);
//Меняем название животных
for ($i=0; $i<count($shuffle_arr); $i++){
    $a_arr = explode(' ', $new_arr[$i]);
    $a_arr[1] = $shuffle_arr[$i];
    $new_arr[$i] = implode($a_arr, ' ');
}
//Выводим наших странных животных
foreach ($new_arr as $v) {
    echo $v . "<br />";
}
//Дополнительное задание, выводм животных и континенты
foreach ($arr as $continent => $animal_array){
    $new_animal_arr = array();
    echo "<h2>$continent: </h2>";
    foreach($animal_array as $str){
        if (strpos($str, ' ')){
            $str = explode(' ', $str);
            for ($i=0; $i<count($new_arr); $i++){
                $find_str = explode(' ', $new_arr[$i]);
                if ($str[0] == $find_str[0]){
                    $str = $new_arr[$i];
                    break;
                }
            }
        } 
        array_push($new_animal_arr, $str);
    }
    echo implode($new_animal_arr, ', ');
    unset($new_animal_arr);
}