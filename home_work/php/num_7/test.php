<?php
    session_set_cookie_params(3600);
    session_start();
if (!empty($_SESSION['user_login'])) {
    $name = $_SESSION['user_login'];
} elseif (!empty($_SESSION['guest'])) {
    $name = $_SESSION['guest'];
}
if ($name != ''){

function get_test($id){
    $arr_dir = scandir(__DIR__.'/tests');
    $i=0;
    $reg = '/\.json$/';
    $arr_test = [];
    foreach($arr_dir as $file_name){
        if (preg_match($reg, $file_name)){
            $i++;
            $arr_test += [$i => $file_name]; 
        }
    }
    foreach($arr_test as $key => $value){
        if ($key == $id){
            $file = file_get_contents(__DIR__.'/tests/'.$value);
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
        if ($obj == null){
            http_response_code(404);
        } else {
        ?>
        <!DOCTYPE html>
        <html lang="ru">
        <head>
            <meta charset="UTF-8">
            <title>Тест № <?php echo $id?></title>
        </head>
        <body>
            <p>Тест № <?php echo $id;?></p>
            <form action="test.php" method="POST">
            <?php foreach($obj as $key=>$test){?>
                <fieldset>
                    <p><?php echo $test['description'];?></p>
                    <?php for($j=0; $j<count($test['answer']); $j++){
                    $answ = $test['answer'][$j];?>
                    <label><input type="radio" name="<?php echo "$id,$key";?>" value="<?php echo $j;?>"><?php echo $answ;?></label>
                <?php }?>
                </fieldset>
            <?php }?>
            <input type="submit">
            </form>
        </body>
        </html>
    <?php
    }} else {
        echo 'Не верный запрос';
    }
}
if(!empty($_POST)){
    $res = 0;
        foreach($_POST as $id=>$done){ 
            $arr = explode(",", $id);
            $obj = get_test($arr[0]);
            foreach($obj as $key=>$test){
                if ($key == $arr[1] && $test['done'] == $done){
                    //$result .= "Ответ на вопрос ".($key+1). " верный<br />";
                    $res++;
                } elseif ($key == $arr[1] && $test['done'] != $done){
                    //$result .= "Ответ на вопрос ".($key+1). " не верный<br />";
                }
            }
        } 
        //echo $result; 
        if ($res != 0){
            $bal = ($res / count($obj)) * 100;
            $bal = 'Оценка тестирования: ' . $bal . '%';
            $font = 'font/arial.ttf';
            $im = imagecreatefrompng("img/sert2.png");
            $black = imagecolorallocate($im, 0, 0, 0);
            $px     = (imagesx($im) - 15 * strlen($name)) / 2;
            imagettftext($im, 40, 0, $px, 220, $black, $font, $name);
            imagettftext($im, 20, 0, 150, 300, $black, $font, $bal);
            header("Content-type: image/png");
            imagepng($im);
            imagedestroy($im);
        } else {
            echo 'Тест не пройден';
        }
    }} else {
        http_response_code(403);
    } ?>