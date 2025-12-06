<?php
// Проверяем метод POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Получаем значения полей
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $eventDate = $_POST['event-date'];
    $eventType = $_POST['event-type'];
    $additionalInfo = $_POST['additional-info'];

    // Проверяем обязательные поля
    if (!empty($name) && !empty($email) && !empty($phone) && !empty($eventDate) && !empty($eventType)) {
        // Формируем тело письма
        $to = "more6890@mail.ru"; //
        $subject = "Заявка на заказ выступления";
        $headers = "From: {$email}\r\nReply-To: {$email}";
        $content = "
            Имя: {$name}<br>
            Телефон: {$phone}<br>
            E-mail: {$email}<br>
            Желаемая дата мероприятия: {$eventDate}<br>
            Тип мероприятия: {$eventType}<br>
            Дополнительная информация:<br>
            {$additionalInfo}
        ";

        // Отправляем письмо
        mail($to, $subject, $content, $headers);
        header("Location: thanks.html");
        exit();
    } else {
        echo '<p>Ошибка: Все поля обязательны для заполнения.</p>';
    }
}
?>
