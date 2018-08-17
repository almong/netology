<?php
//Домашнее задание "Сложные погодные условия" PHP Нетология
//api = 298d56df3add3baecfd98b9951ae567a
//Получаем JSON
$json_str = file_get_contents('http://api.openweathermap.org/data/2.5/weather?id=518255&units=metric&appid=298d56df3add3baecfd98b9951ae567a');
$obj = json_decode($json_str);
//print_r ($obj);
$temp = $obj->main->temp;
$cloud = $obj->weather[0]->description;
$pressure = $obj->main->pressure;
$humidity = $obj->main->humidity;
$wind_speed = $obj->wind->speed;
$wind_deg = $obj->wind->deg;
//Определяем направление ветра
if (0 < $wind_deg && $wind_deg<90){
    $wind_deg = "С-В";
} elseif (90 < $wind_deg && $wind_deg<180){
    $wind_deg = "Ю-В";
}elseif (180 < $wind_deg && $wind_deg<270){
    $wind_deg = "Ю-З";
}elseif (270 < $wind_deg && $wind_deg<360){
    $wind_deg = "С-З";
}elseif ($wind_deg = 0){
    $wind_deg = "С";
}elseif ($wind_deg = 90){
    $wind_deg = "В";
}elseif ($wind_deg = 180){
    $wind_deg = "Ю";
}elseif ($wind_deg = 270){
    $wind_deg = "З";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Сложные погодные условия</title>
</head>
<body>
<h1>Погода в Новороссийске</h1>
<table border="1px solid #FFFFFF" cellspacing=0>
    <tr>
        <td>Температура</td>
        <td><?php echo $temp; ?> &deg;C</td>
    </tr>
    <tr>
        <td>Облачность</td>
        <td><?php echo $cloud; ?></td>
    </tr>
    <tr>
        <td>Атмосферное давление</td>
        <td><?php echo $pressure; ?> мм рт.ст</td>
    </tr>
    <tr>
        <td>Влажность</td>
        <td><?php echo $humidity; ?> %</td>
    </tr>
    <tr>
        <td>Ветер</td>
        <td><?php echo $wind_speed; ?>m/s <?php echo $wind_deg; ?></td>
    </tr>
</table>
</body>
</html>