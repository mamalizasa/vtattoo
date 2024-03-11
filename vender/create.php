<?php

$conn = new mysqli("localhost", "root", "", "vtattoo");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Функция для защиты от XSS
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags($data));
}

// Проверка, что данные были отправлены методом POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных из формы
    $clientName = sanitizeInput($_POST['name']);
    $clientsurName = sanitizeInput($_POST['surname']);
    $clientEmail = sanitizeInput($_POST['email']);
    $clientTel = sanitizeInput($_POST['tel']);
    $tattooTheme = sanitizeInput($_POST['theme']);
    $tattooSize = sanitizeInput($_POST['size']);
    $tattooDate = sanitizeInput($_POST['date']);
    $message = sanitizeInput($_POST['textarea']);

    // Защита от SQL-инъекций
    $clientName = $conn->real_escape_string($clientName);
    $clientsurName = $conn->real_escape_string($clientsurName);
    $clientEmail = $conn->real_escape_string($clientEmail);
    $clientTel = $conn->real_escape_string($clientTel);
    $tattooTheme = $conn->real_escape_string($tattooTheme);
    $tattooSize = $conn->real_escape_string($tattooSize);
    $tattooDate = $conn->real_escape_string($tattooDate);
    $message = $conn->real_escape_string($message);

    // Запись данных в базу данных
    $sql = "INSERT INTO `zapistattoo`(`user_name`, `user_surname`, `email`, `tel`, `theme`, `size`, `date`, `question`) VALUES ('$clientName','$clientsurName','$clientEmail','$clientTel','$tattooTheme','$tattooSize','$tattooDate','$message')";

    if ($conn->query($sql) === TRUE) {
    
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    // // Подготовка сообщения для пользователя
    // $userMessage = "Здравствуйте, $clientName!\n\n";
    // $userMessage .= "Ваша заявка на сеанс татуировки принята. Мы рассмотрим её в ближайшее время.\n";
    // $userMessage .= "Ожидайте письмо на вашу электронную почту.";

    // // Отправка письма пользователю
    // sendEmail($_POST['userEmail'], "Ваша заявка на сеанс татуировки", $userMessage);

    // // Подготовка сообщения для администратора
    // $adminMessage = "Новая заявка на сеанс татуировки:\n\n";
    // $adminMessage .= "Имя клиента: $clientName\n $clientsurName\n";
    // $adminMessage .= "Тема татуировки: $tattooTheme\n";
    // $adminMessage .= "Дата записи: $tattooDate";
    // $adminMessage .= "Сообщение (если есть): $message";

    // // Отправка письма администратору
    // sendEmail("workisvet@mail.ru", "Новая заявка на сеанс татуировки", $adminMessage);

}

// Функция для отправки электронной почты
// function sendEmail($recipient, $subject, $messagee) {
//     $mail = new PHPMailer\PHPMailer\PHPMailer();
    
//     $mail->isSMTP();   
//     $mail->CharSet = "UTF-8";
//     $mail->SMTPAuth   = true;

//     try {
//         // Настройки для отправки через SMTP
//         $mail->Host = 'smtp.yandex.ru';
//         $mail->SMTPAuth = true;
//         $mail->Username = 'padl1za@yandex.ru';
//         $mail->Password = 'wxumpmdignblbzdi';
//         $mail->SMTPSecure = 'ssl';
//         $mail->Port = 465;

//         // Отправитель
//         $mail->setFrom('padl1za@yandex.ru', 'Тату-студия "Втату"');

//         // Получатель
//         $mail->addAddress($recipient);

//         // Тема и содержание письма
//         $mail->Subject = $subject;
//         $mail->Body = $messagee;

//         // Отправка письма
//         $mail->send();
//     } catch (Exception $e) {
//         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//     }
// }

?>