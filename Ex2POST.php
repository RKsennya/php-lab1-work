<?php
// URL для POST-запроса
$url = "http://sandbox.com/cars";

// Параметры для отправки
$data = [
    'make' => 'Toyota',
    'model' => 'Corolla',
    'year' => 2020
];

// Инициализация cURL
$ch = curl_init($url);

// Установка заголовков
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/x-www-form-urlencoded",
    "User-Agent: Rudac Xenia"
]);

// Установка параметров для POST-запроса
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

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
