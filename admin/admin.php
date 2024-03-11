<?php
session_start();

// Проверяем, установлена ли сессия входа
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  // Если сессия входа не установлена, перенаправляем пользователя на страницу входа
  header("Location: ../index.php");
  exit();
}

if (isset($_POST['delete'])) {
  // Удаляем данные из сессии
  session_destroy();
  unset($_SESSION['loggedin']);
  header('Location: adminlogin.php');
}

?>

<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Кыш, это админка</title>
    <link href="../css/admin.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="admin/admin.php">Админка</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">На сайт</a>
          </li>
          <li class="nav-item">
            <button class="btn btn-light btn-user" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><img class="user-icon" src="../assets/icons/user.png"></button>
          </li>
          <li>
          <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
          <input type="submit" name="delete" value="Выйти">
          </form>
          </li>
      </div>
    </div>
    </nav>
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
      <div class="offcanvas-header">
          <img class="w-25" src="../assets/icons/admin_pic.png" alt="Админ">
          <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Андрей Панов</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="navbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="#statistic" class="nav-link active">Статистика</a>
            </li>
            <li class="nav-item">
              <a href="#new-zapis" class="nav-link active">Новые записи</a>
            </li>
            <li class="nav-item">
              <a href="#add-pics" class="nav-link active">Добавить фото</a>
            </li>
            <li class="nav-item">
              <a href="#add-graths" class="nav-link active">Добавить время</a>
            </li>
            <li class="nav-item">
              <a href="#add-news" class="nav-link active">Добавить новость</a>
            </li>

            <li class="nav-item mt-2">
              <button class="btn btn-danger">Выйти</button>
            </li>

          </ul>
        </div>
      </div>
      </div>
  </header>

  <main>
    <div class="conrainer-fluid">

      <div class="container state">
       
        <div class='table'>
          <div class='table-wrapper'>
          <h1 id="statistic" class="table-title text-center p-2">Статистика</h1>
          <div class='table-content'>
          <img src='../vender/stats.php' class='statistics-img'> <br>
          Красный: просмотры <br>
          1 шаг — 1 день
          </div>
          </div>
          </div>

      </div>
      <div class="container-fluid new_zapis">
        <h1 id="new-zapis" class="text-center p-2">Новые записи</h1>
        <?php
          $conn = new mysqli("localhost", "root", "", "vtattoo");
          if($conn->connect_error){
              die("Ошибка: " . $conn->connect_error);
          }
          $sql = "SELECT * FROM zapistattoo ";
          if($result = $conn->query($sql)){
              $rowsCount = $result->num_rows; // количество полученных строк
              echo "<p>Получено объектов: $rowsCount</p>";
              echo "<table><tr><th class='p-2'>Имя</th><th class='p-2'>Фамилия</th><th class='p-2'>Email</th><th class='p-2'>Телефон</th><th class='p-2'>Тема тату</th><th class='p-2'>Размер</th><th class='p-2'>Дата</th><th class='p-2'>Вопрос</th><th class='p-2'><p>Бесит</p></th></tr>";
              foreach($result as $row){
                  echo "<tr>";
                      
                      echo "<td class='p-2'>" . $row["user_name"] . "</td>";
                      echo "<td class='p-2'>" . $row["user_surname"] . "</td>";
                      echo "<td class='p-2'>" . $row["email"] . "</td>";
                      echo "<td class='p-2'>" . $row["tel"] . "</td>";
                      echo "<td class='p-2'>" . $row["theme"] . "</td>";
                      echo "<td class='p-2'>" . $row["size"] . "</td>";
                      echo "<td class='p-2'>" . $row["date"] . "</td>";
                      echo "<td class='p-2'>" . $row["question"] . "</td>";
                      echo "<td><form action='../vender/delete.php' method='post'>
                        <input type='hidden' name='id' value='" . $row["id"] . "' />
                        <input type='submit' value='Удалить'></form></td>";
                  echo "</tr>";
              }
              echo "</table>";
              $result->free();
          } else{
              echo "Ошибка: " . $conn->error;
          }
          $conn->close();
          ?>
      </div>



      <div class="container add_pics">
        <h1 id="add-pics" class="text-center p-2">Добавление фото</h1>
        <form enctype="multipart/form-data" method="post" action="../vender/upload_file.php">
          <p>Выберете категорию тату</p>
          <select name="theme" id="theme_select">
                    <option disabled>Тема</option>
                    <option value="Надписи">Надписи</option>
                    <option value="Животные">Животные</option>
                    <option value="Нежность">Нежность</option>
                    <option value="Люди">Люди</option>
                    <option value="Цветы">Цветы</option>
                    <option value="Рукав">Рукав</option>
                    <option value="Мифология">Мифология</option>
                    <option value="Демоны">Демоны</option>
                    <option value="Другое">Другое</option>
                </select>
          <p class="pt-4 pb-2">Загрузите новое тату на сайт</p>
            <input type="file" name="photo" multiple accept="image/*,image/jpeg"><br>
            <button class="btn btn-dark mb-2 mt-3" type="submit">Отправить</button>
        </form>
      </div>
      
    </div>

    <div class="container add_graths">
        <h1 id="add-graths" class="text-center p-2">Добавление доступных дат в график</h1>
        <form method="post" action="../vender/grathics_up.php">
          <label class="m-2 ms-0">Впишите дату или период, можно несколько вперёд</label><br>
          <input class="m-2 ms-0" type="text" name="dates"><br>
          <!-- <input type="text" name="date1" class="w-25"><br> -->
          <label class="pt-4 pb-2">Введите время</label><br>
          <input type="time" name="time1" class="w-25 mb-3"><br>

          <input type="time" name="time2" class="w-25 mb-3"><br>

          <input type="time" name="time3" class="w-25 mb-3"><br>

          <input type="time" name="time4" class="w-25 mb-3"><br>

          <input type="time" name="time5" class="w-25 mb-3"><br>

          <input type="time" name="time6" class="w-25 mb-3"><br>

          <input type="time" name="time7" class="w-25 mb-3"><br>

          <button class="btn btn-dark mb-3" type="submit">Выложить дату</button>
        </form>

      <h2>Опубликованные даты и время</h2>
      <?php
          $conn = new mysqli("localhost", "root", "", "vtattoo");
          if($conn->connect_error){
              die("Ошибка: " . $conn->connect_error);
          }
          $sql = "SELECT * FROM grathics ";
          if($result = $conn->query($sql)){
              $rowsCount = $result->num_rows; // количество полученных строк
              echo "<p>Получено объектов: $rowsCount</p>";
              echo "<table><tr><th class='p-2'>Дата</th><th class='p-2'>Время</th></tr>";
              foreach($result as $row){
                  echo "<tr>";
                      
                      echo "<td class='p-2'>" . $row["dates"] . "</td>";
                      echo "<td class='p-2'>" . $row["time1"] . "</td>";
                      echo "<td class='p-2'>" . $row["time2"] . "</td>";
                      echo "<td class='p-2'>" . $row["time3"] . "</td>";
                      echo "<td class='p-2'>" . $row["time4"] . "</td>";
                      echo "<td class='p-2'>" . $row["time5"] . "</td>";
                      echo "<td class='p-2'>" . $row["time6"] . "</td>";
                      echo "<td><form action='../vender/delete.php' method='post'>
                        <input type='hidden' name='id' value='" . $row["id"] . "' />
                        <input type='submit' value='Удалить'></form></td>";
                  echo "</tr>";
              }
              echo "</table>";
              $result->free();
          } else{
              echo "Ошибка: " . $conn->error;
          }
          $conn->close();
          ?>

    </div>   


    <div class="container add_news mb-5">
        <h1 id="add-news" class="text-center p-2">Добавление новости</h1>
        <form method="post" action="../vender/news_up.php">
          <label class="pt-4 pb-2">Введите заголовок для новости</label><br>
          <input type="text" name="title" class="w-25"><br>
          <label class="pt-4 pb-2">Введите текст новости</label><br>
          <textarea class="w-25" name="news"></textarea><br>
          <label class="pt-4 pb-2">Выберите дату добавления новости</label><br>
          <input type="date" name="date" class="mt-2 mb-3 w-25"><br>
          <button class="btn btn-dark mb-3" type="submit">Выложить новость</button>
        </form>
        <h2>Опубликованные новости</h2>
      <?php
          $conn = new mysqli("localhost", "root", "", "vtattoo");
          if($conn->connect_error){
              die("Ошибка: " . $conn->connect_error);
          }
          $sql = "SELECT * FROM news ";
          if($result = $conn->query($sql)){
              $rowsCount = $result->num_rows; // количество полученных строк
              echo "<p>Получено объектов: $rowsCount</p>";
              echo "<table><tr><th class='p-2'>Заголовок</th><th class='p-2'>Новость</th><th class='p-2'>Дата</th></tr>";
              foreach($result as $row){
                  echo "<tr>";
                      
                      echo "<td class='p-2'>" . $row["title"] . "</td>";
                      echo "<td class='p-2'>" . $row["news"] . "</td>";
                      echo "<td class='p-2'>" . $row["date"] . "</td>";
                      echo "<td><form action='../vender/delete.php' method='post'>
                        <input type='hidden' name='id' value='" . $row["id"] . "' />
                        <input type='submit' value='Удалить'></form></td>";
                  echo "</tr>";
              }
              echo "</table>";
              $result->free();
          } else{
              echo "Ошибка: " . $conn->error;
          }
          $conn->close();
          ?>

    </div>    
  </main>

  <footer class="bg-primary-subtle">

    <div class="container-fluid">
      <div class="container">
        <p>Разработчик этого сайта - <a href="https://t.me/lizaschilling">Ссылка на телеграм</a></p>
      </div>
    </div>

  </footer>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
