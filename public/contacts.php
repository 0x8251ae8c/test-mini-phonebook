<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Test\Mini\Phonebook\Phonebook;

$flash = [];
$phonebook = Phonebook::getInstance();

// Запрос на удаление контакта из БД
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $contactId = $_POST['contactId'];
    if (!empty($contactId)) {
        $phonebook->deleteContact($contactId);

        $flash['color'] = 'green';
        $flash['message'] = 'Контакт успешно удалён';
    }
}

$contacts = $phonebook->getContacts();

include(__DIR__ . "/../templates/contacts.phtml");
