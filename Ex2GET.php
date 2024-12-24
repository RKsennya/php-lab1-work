<?php
// URL для GET-запроса
$url = "http://sandbox.com";

// Инициализация cURL
$ch = curl_init($url);

// Установка заголовков
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "User-Agent: Rudac Xenia"  // Ваше имя и фамилия
]);

// Установка параметров для GET-запроса
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Выполнение запроса
$response = curl_exec($ch);

// Проверка на ошибки
if(curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    echo "Ответ от сервера:\n";
    echo $response;
}

// Закрытие cURL
curl_close($ch);
?>
