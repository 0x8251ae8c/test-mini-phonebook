<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Test\Mini\Phonebook\Phonebook;
use Test\Mini\Phonebook\Validator;

$flash = [];
$params = ['name' => '', 'phoneNumber' => ''];

// Запрос на добавление контакта в БД
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $params['name'] = $_POST['name'];
    $params['phoneNumber'] = $_POST['phoneNumber'];

    $validator = new Validator();

    // Верификация параметров запроса
    // Параметр 'name' не должен быть пустым, не должен состоять из одних пробелов
    // Параметр 'phoneNumber' не должен быть пустым, должен состоять из одних цифр
    if ($validator->isValid($params['name']) && $validator->isValidPhoneNumber($params['phoneNumber'])) {
        $phonebook = Phonebook::getInstance();
        $phonebook->addContact($params['name'], $params['phoneNumber']);

        $flash['color'] = 'green';
        $flash['message'] = 'Новый контакт успешно добавлен';
        $params = ['name' => '', 'phoneNumber' => ''];
    } else {
        $flash['color'] = 'red';
        $flash['message'] = 'Проверьте правильность заполнения полей';
    }
}

include(__DIR__ . "/../templates/add.phtml");
