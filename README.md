# Мини-Справочник
Тестовое задание на стажера PHP Dev в Teamlab.pro

## Установка
```shell
git clone https://github.com/0x8251ae8c/test-mini-phonebook.git
cd test-mini-phonebook
make install
```
Дополнительно нужно создать файл ./config/config.php с конфигурацией подключения к БД:
```php
<?php

return [
    'db_name' => 'database_name', // Имя базы данных
    'db_host' => 'localhost',     // Имя сервера
    'db_user' => 'user_name',     // Имя пользователя
    'db_pass' => 'password',      // Пароль
];
```

## Запуск сервера
```shell
make localhost
```
