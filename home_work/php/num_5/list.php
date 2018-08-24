<?php
    $arr_dir = scandir(__DIR__);
    $i=0;
    $reg = '/\.json$/';
    $arr_test = array();
    foreach($arr_dir as $file_name){
        if (preg_match($reg, $file_name)){
            $i++;
            $arr_test += [$i => $file_name]; 
        }
    }
    foreach($arr_test as $key => $value){
        echo "$key - $value <br />";
    } ;
?>