<?php
session_start();

$_SESSION["username"] = "Андрей";
$_SESSION["password"] = "passpassadmin";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Получаем данные из формы входа
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Проверяем, совпадают ли данные с данными, сохраненными в сессии
    if ($username === $_SESSION["username"] && $password === $_SESSION["password"]) {
        // Если данные верны, устанавливаем сессию входа
        $_SESSION["loggedin"] = true;

        // Перенаправляем пользователя на защищенную страницу
        header("Location: admin.php");
        exit();
    } else {
      echo '<script>
      location="../index.php"
      alert("Хули в админку лезем ёбик? Пошёл нахуй");

      </script>';

      
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Кыш, это админка</title>
    <link href="css/admin.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="login-box">
                <h1>Login</h1>
    
                <div class="textbox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" placeholder="Username"
                            name="username" value="">
                </div>
    
                <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Password"
                            name="password" value="">
                </div>
    
                <input class="button" type="submit"
                        name="login" value="Sign In">
            </div>
    </form>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
