<?php
    require_once '../config/connect.php';
    $dates = $_POST['dates'];
    $time1 = $_POST['time1'];
    $time2 = $_POST['time2'];
    $time3 = $_POST['time3'];
    $time4 = $_POST['time4'];
    $time5 = $_POST['time5'];
    $time6 = $_POST['time6'];
   
    $sosat = $conn->query("INSERT INTO `grathics` (`dates`, `time1`, `time2`, `time3`, `time4`, `time5`, `time6`) VALUES ('$dates', '$time1', '$time2', '$time3', '$time4', '$time5', '$time6')");
    if($sosat == True){
        echo 'Даты опубликованы на сайт';
        $conn->close();
    }else{
        echo 'Не получилось, не фортануло!(';
    }
