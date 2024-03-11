<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/galary.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/icons/ico.svg" type="image/x-icon">
    <title>Галерея работ</title>
</head>
<body>
    <header>
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
        <div class="zag">
                <h2 class="zag1">Работы Андрея, распределённые по темам</h2>
        </div>
    </header>
    <main>
        <div class="grid">
            <div class="el el-1">
                <button name='lol_button' value='Надписи' style='background-color: rgba(0, 0, 0, 0.00001);margin: 0 auto;display: block;border: none;'>
                    <a href="galary_list.php?name=Надписи" class="sug">
                        <img class="img" src="assets/img/galary/nadpisi.jpg" alt="Надписи" title="Нажми:)">
                    </a>
                </button>
            </div>
            <div class="el el-2">
                <button name='lol_button' value='Животные' style='background-color: rgba(0, 0, 0, 0.00001);margin: 0 auto;display: block;border: none;'>
                    <a href="galary_list.php?name=Животные" class="sug">
                        <img class="img" src="assets/img/galary/animals.jpg" alt="Животные" title="Нажми:)">
                    </a>
                </button>
            </div>
            <div class="el el-3">
                <button name='lol_button' value='Нежность' style='background-color: rgba(0, 0, 0, 0.00001);margin: 0 auto;display: block;border: none;'>
                    <a href="galary_list.php?name=Нежность" class="sug">
                        <img class="img" src="assets/img/galary/sweet.jpg" alt="Нежность" title="Нажми:)">
                    </a>
                </button>
            </div>
            <div class="el el-4">
                <button name='lol_button' value='Люди' style='background-color: rgba(0, 0, 0, 0.00001);margin: 0 auto;display: block;border: none;'>
                    <a href="galary_list.php?name=Люди" class="sug">
                        <img class="img" src="assets/img/galary/people.jpg" alt="Люди" title="Нажми:)">
                    </a>
                </button>
            </div>

            <div class="el el-5">
                <button name='lol_button' value='Цветы' style='background-color: rgba(0, 0, 0, 0.00001);margin: 0 auto;display: block;border: none;'>
                    <a href="galary_list.php?name=Цветы" class="sug">
                        <img class="img" src="assets/img/galary/flowers.jpg" alt="Цветы" title="Нажми:)">
                    </a>
                </button>
            </div>

            <div class="el el-6">
                <button name='lol_button' value='Рукав' style='background-color: rgba(0, 0, 0, 0.00001);margin: 0 auto;display: block;border: none;'>
                    <a href="galary_list.php?name=Рукав" class="sug">
                        <img class="img" src="assets/img/galary/hand.jpg" alt="Рукав" title="Нажми:)">
                    </a>
                </button>
            </div>
            <div class="el el-7">
                <button name='lol_button' value='Мифология' style='background-color: rgba(0, 0, 0, 0.00001);margin: 0 auto;display: block;border: none;'>
                    <a href="galary_list.php?name=Мифология" class="sug">
                        <img class="img" src="assets/img/galary/anubis.jpg" alt="Мифология" title="Нажми:)">
                    </a>
                </button>
            </div>
            <div class="el el-8">
                <button name='lol_button' value='Демоны' style='background-color: rgba(0, 0, 0, 0.00001);margin: 0 auto;display: block;border: none;'>
                    <a href="galary_list.php?name=Демоны" class="sug">
                        <img class="img" src="assets/img/galary/demons.jpg" alt="Демоны" title="Нажми:)">
                    </a>
                </button>
            </div>
            <div class="el el-9">
                <button name='lol_button' value='Другое' style='background-color: rgba(0, 0, 0, 0.00001);margin: 0 auto;display: block;border: none;'>
                    <a href="galary_list.php?name=Другое" class="sug">
                        <img class="img" src="assets/img/galary/another.jpg" alt="Другое" title="Нажми:)">
                    </a>
                </button>
            </div>
        </div>
    </main>
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
</body>
</html>