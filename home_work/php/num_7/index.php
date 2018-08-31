<?php
    session_set_cookie_params(3600);
    session_start();

    if ($_SESSION['attempt'] >= 11){
        http_response_code(403);
        echo 'Подождите часок, мы вас заблокировали, а затем попробуйте снова';
        die;
    }

    if (!empty($_SESSION['guest']) || !empty($_SESSION['user_login'])){
        header('Location: /list.php');
    } else {
    if (!empty($_POST)){
        $errors = [];
        if (trim($_POST['login'] == '')){
            $errors[] = 'Вы не ввели логин';
        }
        if (($_POST['password'] == '' && $_POST['guest'] != 'on')){
            $errors[] = 'Вы не ввели пароль';
        }
        if (!empty($errors)){
            $_SESSION['attempt']++;?>
        <ul> <?php
            foreach ($errors as $error) {?>
                <li><?php echo $error;?></li>
            <?php } ?>
        </ul><hr>
        <?php
        } elseif ($_POST['guest'] != 'on') {
            $obj = file_get_contents(__DIR__ . '/login.json');
            $auth_arr = json_decode($obj, true);
            foreach ($auth_arr as $user_arr){
                if ($user_arr['login'] == $_POST['login'] && $user_arr['password'] == $_POST['password']){
                    if (array_key_exists('captcha', $_POST)){
                        if (md5($_POST['captcha']) === $_SESSION['captcha']){
                            $_SESSION['user_login'] = $_POST['login'];
                        } else { 
                            http_response_code(403);
                            $_SESSION['attempt']++;
                            echo '<a href="/">Назад</a><br>';
                            echo 'Доступ закрыт';  
                            die;            
                        } 
                    } else {
                        $_SESSION['user_login'] = $_POST['login'];    
                    }
                } 
            }
            if (empty($_SESSION['user_login'])){
                http_response_code(403);
                $_SESSION['attempt']++;
                echo '<a href="/">Назад</a><br>';
                echo 'Доступ закрыт';
                die;
            } else {
                header('Location: /list.php');
            }
        } else {
            if ($_POST['guest'] == 'on'){
                $_SESSION['guest'] = $_POST['login'];
                unset ($_SESSION['attempt']);
                header('Location: /list.php');
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form method="post">
        <h2>Авторизация</h2>
        <p>Введите логин <input type="text" name="login" value="<?php echo $_POST['login'];?>"></p>
        <p>Введите пароль <input type="password" name="password"></p>
        <p>Войти как гость <input type="checkbox" name="guest"></p>
        <?php 
        if ($_SESSION['attempt'] >= 6) {?>
            <img src="/captcha.php" alt="captcha">
            <p><input type="text" name="captcha"></p>
        <?php } ?>
        <p><button type="submit">Войти</button></p>
    </form>
</body>
</html>
    <?php } ?>