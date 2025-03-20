<?php

namespace Models;

/**
 * Class UserModel
 *
 * Цей клас представляє модель користувача, яка взаємодіє з даними користувача.
 * Він надає методи для управління інформацією користувача, такі як отримання,
 * оновлення та видалення записів користувачів.
 *
 * @property int $id Унікальний ідентифікатор користувача.
 * @property string $name Ім'я користувача.
 * @property string $email Адреса електронної пошти користувача.
 * @property string $password Хешований пароль користувача.
 * @property string $created_at Часова мітка створення користувача.
 * @property string $updated_at Часова мітка останнього оновлення користувача.
 */

class UserModel
{
    private $id;
    private $name;
    private $email;
    private $password;

    public function __construct($id, $name, $email, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}
