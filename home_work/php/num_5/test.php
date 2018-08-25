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
            <?foreach($obj as $key=>$test){?>
                <fieldset>
                    <p><?echo $test['description'];?></p>
                    <?for($j=0; $j<count($test['answer']); $j++){
                    $answ = $test['answer'][$j];?>
                    <label><input type="radio" name="<?echo "$id,$key";?>" value="<?echo $j;?>"><?echo $answ;?></label>
                <?}?>
                </fieldset>
            <?}?>
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
            $arr = explode(",", $id);
            $obj = get_test($arr[0]);
            foreach($obj as $key=>$test){
                if ($key == $arr[1] && $test['done'] == $done){
                    $result .= "Ответ на вопрос ".($key+1). " верный<br />";
                } elseif ($key == $arr[1] && $test['done'] != $done){
                    $result .= "Ответ на вопрос ".($key+1). " не верный<br />";
                }
            }
        } 
        echo $result;   
}
?>