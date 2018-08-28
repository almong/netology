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
    foreach($arr_test as $key => $value){?>
        <div><?php echo $key;?> - <a href="test.php?id=<?php echo $key;?>"><?php echo $value;?></a></div>
   <?php } ?>