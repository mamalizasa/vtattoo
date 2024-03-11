<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/news.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/icons/ico.svg" type="image/x-icon">
    <title>Новости</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>
<body>
    <header id="toTop">
        <div class="container-menu">

            <section class="top-nav">
                <div class="logoblock">
                <a href="index.php"><img class="logo" src="assets/img/logo.svg" alt="logo"></a>
                </div>
                <input id="menu-toggle" type="checkbox" />
                <label class='menu-button-container' for="menu-toggle">
                <div class='menu-button'></div>
            </label>
                <ul class="menu">
                    <li class="lipunkt"><a class="ssulka-menu" href="form.php">Запись</a></li>
                    <li class="lipunkt"><a class="ssulka-menu" href="calendar.php">График</a></li>
                    <li class="lipunkt"><a class="ssulka-menu" href="galary.php">Галерея</a></li>
                    <li class="lipunkt"><a class="ssulka-menu" href="fag.php">FAQ</a></li>
                    <li class="lipunkt"><a class="ssulka-menu" href="news.php">Новости</a></li>
                </ul>
            </section>

    </div>
    </header>
    <main>
        <h1>Новости</h1>

        <div class="container-news">
            <div class="container-happening1">
            <?php
                $conn = new mysqli("localhost", "root", "", "vtattoo");
                if($conn->connect_error){
                    die("Ошибка: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM news ";
                if($result = $conn->query($sql)){
                    foreach($result as $row){
                            echo "<h2>" . $row["title"] . "</h2>";
                            echo "
                            <div class='container-rt'>
                                <div class='container-irt'>" . $row['news'] . "</div>
                            </div>";
                            echo "
                            <div class='necotorui-flex'>
                                <div class='date'>
                                    <h2 class='datextcnyj'>" . $row['date'] . "</h2>
                                </div>
                            
                                <div class='container-knp'>
                                    <div class='element-animation'>
                                        <button class='knopa'><a class='knopa-ssul' href='form.php'><strong>Записаться</strong></a></button>
                                        <img class='lines' src='assets/img/lines.svg' alt='lines'>
                                    </div>
                    
                                </div>
                            </div>";
                    }
                    $result->free();
                } else{
                    echo "Ошибка: " . $conn->error;
                }
                
                if($sql > 0) {

                }
                echo "<div class='container-nonews'>
                <h3>Можете посмотреть видео с тату студией</h3>
                <div class='container-video'>
                
                    <iframe class='vidivo' src='https://www.youtube.com/embed/nNk8l3Cq2zk' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>
                    </iframe>
                </div>
                <p class='cta'>Или <a class='hrefa' href='form.php'>записаться на татуировку</a></p>
                </div>
                ";
                $conn->close();
            ?>
    </main>
    <div class="btn-top btn-up_hide">
        <img class="icon-top" src="assets/icons/top.svg">
    </div>
    <footer>  
        <div class="grid-2">
            <div class="logof">
                <a href="index.php"><img class="logof-pic" src="assets/img/logo.svg" alt="что-то"></a>
            </div>
            <nav class="menuf">
                <ul class="spif">
                    <li class="lif"><a class="ssulka-menuf" href="calendar.php">График</a></li>
                    <li class="lif"><a class="ssulka-menuf" href="form.php">Запись</a></li>
                    <li class="lif"><a class="ssulka-menuf" href="galary.php">Галерея</a></li>
                    <li class="lif"><a class="ssulka-menuf" href="fag.php">Ответы</a></li>
                    <li class="lif"><a class="ssulka-menuf" href="news.php">Новости</a></li>
                </ul>
            </nav>
            <div class="address">
                <p>Южный бульвар 6, Волхов, Ленинградская область</p>
            </div>
            <div class="social-links">
                <a href="#" class="icon1"><img src="assets/icons/vk.svg" alt="Vkontakte"></a>
                <a href="#" class="icon2"><img src="assets/icons/youtube.svg" alt="Youtube"></a>
            </div>
            <div class="map">
                <iframe class="mapframe" src="https://yandex.ru/map-widget/v1/?um=constructor%3A5563c6c844016632d4cc8cc142f6ddb54e06664c2d07c232b70e406c4be40de3&amp;source=constructor" width="70%" height="400" frameborder="0"></iframe>
            </div>
            <!-- <div class="adressf">
                <p class="ssulka-menuf1">Адрес</p>
                <p class="adrf">г. Волхов, улица Гагарина <br>дом 13, кабинет 214</p>
                <div class="iconsu">
                    <a href="#" class="icon1"><img src="assets/icons/vk.svg" alt="Vkontakte"></a>
                    <a href="#" class="icon2"><img src="assets/icons/youtube.svg" alt="Youtube"></a>
                </div>
            </div>
            <div class="mapf">
                <p class="ssulka-menuf2">Карта</p>
                <iframe class="mapframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1999.2921824765622!2d32.301311437512105!3d59.92729374136653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46bd18d2f79f4ab9%3A0x9e6eff3d94387c94!2z0YPQuy4g0K7RgNC40Y8g0JPQsNCz0LDRgNC40L3QsCwgMTMsINCS0L7Qu9GF0L7Qsiwg0JvQtdC90LjQvdCz0YDQsNC00YHQutCw0Y8g0L7QsdC7LiwgMTg3NDAx!5e0!3m2!1sru!2sru!4v1675412087878!5m2!1sru!2sru" width="180" height="90" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div> -->
        </div>
        <p class="pf">(с) ИП Панов Андрей Михайлович. Все права защищены.</p>
    </footer>



    <script src="js/element.js"></script>
    <script src="js/button_top.js"></script>
</body>
</html>