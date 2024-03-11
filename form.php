<?php

date_default_timezone_set('Europe/Moscow');
setlocale(LC_ALL, 'ru_RU');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$conn = new mysqli("localhost", "root", "", "vtattoo");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Функция для защиты от XSS
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags($data));
}

if($_POST){
    // Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/POP3.php';
    require 'PHPMailer/src/SMTP.php';
    require 'PHPMailer/src/Exception.php';



    $clientName = sanitizeInput($_POST['name']);
    $clientsurName = sanitizeInput($_POST['surname']);
    $clientEmail = sanitizeInput($_POST['email']);
    $clientTel = sanitizeInput($_POST['tel']);
    $tattooTheme = sanitizeInput($_POST['theme']);
    $tattooSize = sanitizeInput($_POST['size']);
    $tattooDate = $_POST['date'];
    $message = sanitizeInput($_POST['textarea']);

    // Защита от SQL-инъекций
    $clientName = $conn->real_escape_string($clientName);
    $clientsurName = $conn->real_escape_string($clientsurName);
    $clientEmail = $conn->real_escape_string($clientEmail);
    $clientTel = $conn->real_escape_string($clientTel);
    $tattooTheme = $conn->real_escape_string($tattooTheme);
    $tattooSize = $conn->real_escape_string($tattooSize);
    $message = $conn->real_escape_string($message);

    // Запись данных в базу данных
    $sql = "INSERT INTO `zapistattoo`(`user_name`, `user_surname`, `email`, `tel`, `theme`, `size`, `date`, `question`) VALUES ('$clientName','$clientsurName','$clientEmail','$clientTel','$tattooTheme','$tattooSize','$tattooDate','$message')";

    if ($conn->query($sql) === TRUE) {
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.yandex.ru';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'padl1za@yandex.ru';                 // SMTP username
            $mail->Password = 'wxumpmdignblbzdi';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;                                  // TCP port to connect to
    
            //Recipients
            $mail->setFrom('padl1za@yandex.ru', 'Vtattoo');
            $mail->addAddress('padl1za@yandex.ru', 'Владельцу ресурса Vtattoo.ru');     // Add a recipient
    
    
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Новая заявка с сайта vtattoo.ru';
            $mail->Body    = ' <html>
                        <head>
                            <title>Новая заявка с сайта</title>
                        </head>
                        <body>
                            <p>Имя: '.$_POST['name'].'</p>
                            <p>Почта: '.$_POST['surname'].'</p>  
                            <p>Телефон:  '.$_POST['tel'].'</p>                        
                            <p>Дата:  '.$_POST['date'].'</p>
                            <p>Сообщение (если есть):  '.$_POST['textarea'].'</p>                          
                        </body>
                    </html>';
    
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();


   
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="shortcut icon" href="assets/icons/ico.svg" type="image/x-icon">
    <title>Запись на сеанс</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    
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
    </header>
    <main id="toTop">
        <section>
            <h1>Записаться на татуировку</h1>
            <div class='div_success' id="message_success"></div>  
            
            <form class="form" id="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                <label for="name_input">Ваше имя*</label>
                <input id="name_input" class="inputsu rfield empty_field" type="text" name="name" data-valid="required" placeholder="Имя"><span></span>
            
                <label for="surname_input">Ваша фамилия*</label>
                <input id="surname_input" class="inputsu rfield empty_field" type="text" data-valid="required" name="surname" placeholder="Фамилия"><span></span>
               
                <label for="email_input">Ваша почта*</label>
                <input id="email_input" class="inputsu rfield empty_field _email" type="email" data-valid="required" name="email" placeholder="Email"><span></span>
            
                <label for="tel">Ваш номер телефона*</label>
                <input id="tel_input" class="inputsu rfield empty_field" type="tel" data-valid="required" data-phone name="tel" placeholder="Телефон"><span></span>
             
                <label for="t-select">Какую татуировку вы хотите?</label>
                <select name="theme" data-valid="required" class="rfield empty_field" id="t-select">
                    <option value="Не выбрано">Тема</option>
                    <option value="Надписи">Надписи</option>
                    <option value="Животные">Животные</option>
                    <option value="Нежность">Нежность</option>
                    <option value="Люди">Люди</option>
                    <option value="Цветы">Цветы</option>
                    <option value="Рукав">Рукав</option>
                    <option value="Мифология">Мифология</option>
                    <option value="Демоны">Демоны</option>
                    <option value="Другое">Другое</option>
                </select><span></span>

                <label for="s-select">Какого размера татуировку вы хотите?</label>
                <select name="size" data-valid="required" class="rfield empty_field" id="s-select">
                    <option value="Не выбрано">Размер</option>
                    <option value="Маленькая">Маленькая</option>
                    <option value="Средняя">Средняя</option>
                    <option value="Большая">Большая</option>
                </select><span></span>

                <label for="date">На какую дату вам удобно записаться?*</label>
                <input id="date_input" class="inputsu rfield empty_field" data-valid="required" type="date" name="date" placeholder="Дата"><span></span>
            

                <label>Посмотрите в <a class="oneword" href="calendar.php">графике</a> свободное время</label>

                <label for="textarea">Напишите особенные пожелания, важную информацию или свой вопрос.</label>
                <textarea id="textarea" class="textarea" name="textarea">Здравствуйте,</textarea>

                <div class='div_success' id="message"></div>  
              
                <button type="submit" id="zapis" class="knopa">Записаться</button>
                
            </form>
        </section>
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





    <div class="btn-top btn-up_hide"></div>



    <script src="js/button_top.js"></script>
    <script src="js/form.js"></script>
</body>
</html>