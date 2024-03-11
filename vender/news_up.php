<?php
    require_once '../config/connect.php';
    $title = $_POST['title'];
    $news = $_POST['news'];
    $date = $_POST['date'];
   
    
    $sosat = $conn->query("INSERT INTO `news` (`title`, `news`, `date`) VALUES ('$title', '$news', '$date')");
    if($sosat == True){
        echo 'Новость опубликована на сайт';
        $conn->close();
    }else{
        echo 'Не получилось, не фортануло!(';
    }