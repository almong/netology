<?php
function get_test($id){
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
        if ($key == $id){
            $file = file_get_contents($value);
            $obj = json_decode($file, true);
            break;
        } 
    }
    return $obj;
}
if (!empty($_GET)){
    if (array_key_exists('id', $_GET)){
        $id = $_GET['id'];
        $obj = get_test($id);
        ?>
        <!DOCTYPE html>
        <html lang="ru">
        <head>
            <meta charset="UTF-8">
            <title>Тест № <?echo $id?></title>
        </head>
        <body>
            <p>Тест № <?echo $id;?></p>
            <form action="test.php" method="POST">
            <fieldset>
            <p><?echo $obj['description'];?></p>
            <?for($j=0; $j<count($obj['answer']); $j++){
                $answ = $obj['answer'][$j];?>
                <label><input type="radio" name="<?echo $id?>" value="<?echo $j;?>"><?echo $answ;?></label>
                <?}?>
            </fieldset>
            <input type="submit">
            </form>
        </body>
        </html>
    <?
    } else {
        echo 'Не верный запрос';
    }
}
if(!empty($_POST)){
        foreach($_POST as $id=>$done){
            $obj = get_test($id);
            if ($done == $obj['done']){
                echo 'Ответ верный';
            }else {
                echo 'Ответ не верный';
            }
        }    
}
?>