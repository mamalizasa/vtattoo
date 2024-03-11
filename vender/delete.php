<?php
if(isset($_POST["id"]))
{
    $conn = new mysqli("localhost", "root", "", "vtattoo");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $userid = $conn->real_escape_string($_POST["id"]);
    $sql = "DELETE FROM zapistattoo WHERE id = '$userid'";
    if($conn->query($sql)){
         
        header("Location: ../admin/admin.php");
    }
    else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();  
}


if(isset($_POST["id"]))
{
    $conn = new mysqli("localhost", "root", "", "vtattoo");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $userid = $conn->real_escape_string($_POST["id"]);
    $sql = "DELETE FROM grathics WHERE id = '$userid'";
    if($conn->query($sql)){
         
        header("Location: ../admin/admin.php");
    }
    else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();  
}

if(isset($_POST["id"]))
{
    $conn = new mysqli("localhost", "root", "", "vtattoo");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $userid = $conn->real_escape_string($_POST["id"]);
    $sql = "DELETE FROM news WHERE id = '$userid'";
    if($conn->query($sql)){
         
        header("Location: ../admin/admin.php");
    }
    else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();  
}
?>