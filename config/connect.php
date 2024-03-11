<?php
    $conn = new mysqli("localhost", "root", "", "vtattoo");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
?>