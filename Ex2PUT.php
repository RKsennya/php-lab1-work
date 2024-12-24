<?php
// URL для PUT-запроса
$url = "http://sandbox.com/cars/1";

// Данные для отправки
$data = json_encode([
    'make' => 'Toyota',
    'model' => 'Corolla',
    'year' => 2021
]);

// Инициализация cURL
$ch = curl_init($url);

// Установка заголовков
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "User-Agent:Rudac Xenia"
]);

// Установка параметров для PUT-запроса
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

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
