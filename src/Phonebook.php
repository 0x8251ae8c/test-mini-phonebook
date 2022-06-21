<?php

namespace Test\Mini\Phonebook;

class Phonebook
{
    private static $sql = null;
    private static $instance = null;

    private function __construct()
    {
        ;
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        if (!isset(self::$sql)) {
            $config = include __DIR__.'/../config/config.php';
            self::$sql = new \MySqli($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
        }
        return self::$instance;
    }

    public function getContacts()
    {
        return self::$sql->query("SELECT * FROM users ORDER BY name");
    }

    public function deleteContact($id)
    {
        return self::$sql->query("DELETE FROM users WHERE id=$id");
    }

    public function addContact($name, $phoneNumber)
    {
        return self::$sql->query("INSERT INTO users (name, phone_number) VALUES ('$name', '$phoneNumber')");
    }
}
