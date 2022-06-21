<?php

namespace Test\Mini\Phonebook;

class Validator
{
    public function __construct()
    {
        ;
    }

    public function isValid($value)
    {
        if (empty($value)) {
            return false;
        }

        if (strlen(trim($value)) === 0) {
            return false;
        }

        return true;
    }

    public function isValidPhoneNumber($value)
    {
        if (!$this->isValid($value)) {
            return false;
        }

        $onlyNumbers = filter_var(
            $value,
            FILTER_VALIDATE_REGEXP,
            ['options' => ['regexp' => "/^[0-9]*$/"]]
        );

        if (strlen($onlyNumbers) > 0) {
            return true;
        }

        return false;
    }
}
