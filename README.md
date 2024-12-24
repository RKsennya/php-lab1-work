# Лабораторная работа по HTTP-запросам

## Задание 1. Анализ HTTP-запросов

1. Перейдите по следующему адресу: [http://sandbox.usm.md/login](http://sandbox.usm.md/login).
2. Откройте вкладку "Network" в инструментах разработчика браузера.
3. Введите неверные данные для входа (например, username: `student`, password: `studentpass`).
4. Проанализируйте запросы, которые были отправлены на сервер.

### Ответы на вопросы:
- **HTTP-метод**: POST
- **Заголовки запроса**: 
    - Content-Type
    - User-Agent
    - Accept
    - и другие...
- **Параметры запроса**: username, password
- **Код состояния**: 401 (Unauthorized)
- **Заголовки ответа**: Content-Type, Date, Server и другие...

5. Повторите шаги с правильными данными для входа (username: `admin`, password: `password`).

## Задание 2. Составление HTTP-запросов

### 2.1. GET-запрос

Составьте GET-запрос к серверу по адресу `http://sandbox.com`, указав в заголовке `User-Agent` ваше имя и фамилию.

Пример кода:

```php
<?php
// URL для GET-запроса
$url = "http://sandbox.com";

// Инициализация cURL
$ch = curl_init($url);

// Установка заголовков
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "User-Agent: Имя Фамилия"  // Ваше имя и фамилия
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

2.2. POST-запрос
Составьте POST-запрос к серверу по адресу http://sandbox.com/cars, указав в теле запроса следующие параметры:

<?php
// URL для POST-запроса
$url = "http://sandbox.com/cars";

// Данные для отправки в POST-запросе
$data = [
    'make' => 'Toyota',
    'model' => 'Corolla',
    'year' => 2020
];

// Инициализация cURL
$ch = curl_init($url);

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

2.3. PUT-запрос
Составьте PUT-запрос к серверу по адресу http://sandbox.com/cars/1, указав в заголовке User-Agent ваше имя и фамилию, в заголовке Content-Type значение application/json, и в теле запроса параметры:
<?php
// URL для PUT-запроса
$url = "http://sandbox.com/cars/1";

// Данные для отправки в PUT-запросе
$data = [
    'make' => 'Toyota',
    'model' => 'Corolla',
    'year' => 2021
];

// Инициализация cURL
$ch = curl_init($url);

// Установка заголовков
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'User-Agent: Ivan Ivanov',
    'Content-Type: application/json'
]);

// Установка параметров для PUT-запроса
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

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

Задание 3. Дополнительное задание. HTTP_Quest
Перейдите на сервер http://sandbox.usm.md/quest.
Отправьте POST-запрос с заголовком User-Agent как ваше имя и фамилия.

curl -X POST http://sandbox.usm.md/quest -H "User-Agent: Имя Фамилия"

Ответы на контрольные вопросы
Какой метод HTTP был использован для отправки запроса?
Для анализа запросов использовался метод POST для отправки данных.
Какие заголовки были отправлены в запросе?
В запросах были отправлены заголовки User-Agent, Content-Type, Authorization и другие в зависимости от запроса.
Какие параметры были отправлены в запросе?
В запросах отправлялись параметры, такие как username, password, make, model, и другие данные в теле запроса.
Какой код состояния был возвращен сервером?
В случае успешного запроса сервер может возвращать код состояния 200 (OK), 201 (Created), а для ошибок — 401 (Unauthorized), 404 (Not Found) и другие.


