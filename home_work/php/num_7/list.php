<?php
    session_set_cookie_params(3600);
    session_start();
    if (!empty($_SESSION['user_login']) || !empty($_SESSION['guest'])){
        echo '<p><a href="/logout.php"> Выйти</a></p>';
    $arr_dir = scandir(__DIR__ . '/tests');
    $i=0;
    $reg = '/\.json$/';
    $arr_test = array();
    foreach($arr_dir as $file_name){
        
        if (preg_match($reg, $file_name)){
            $i++;
            $arr_test += [$i => $file_name]; 
            
        }
    }
    echo '<h2>Выберите тест</h2>';
    foreach($arr_test as $key => $value){?>
        <div><?php echo $key;?> - <a href="/test.php?id=<?php echo $key;?>"><?php echo $value;?></a></div>
   <?php }} else {
       http_response_code(403);
   }
   if (!empty($_SESSION['user_login'])){
   ?>
  <p><a href="/admin.php">Добавить тест</a></p>
   <?php } ?>