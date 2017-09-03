<?php

namespace Mvc\Application\Models;

use Mvc\Core\Base\BaseModel;

/**
 * Created by PhpStorm.
 * User: misha
 * Date: 02.09.17
 * Time: 13:55
 */
class User extends BaseModel
{
    public $currentTable = 'user';

    public $login;
    public $name;
    public $password;
    public $email;
    public $role;

    const ROLE_ADMIN = 'admin';

    public static function signin($data)
    {
        if (array_key_exists('login', $data) && array_key_exists('password', $data)) {
            $params = [
                'login' => $data['login'],
                'password' => self::generatePassword($data['password'])
            ];
            $user = User::find('user')->getRecord('*', 'WHERE login = :login && password = :password', $params)->one();
            if ($user) {
                $_SESSION['user'] = $user;
                return $user;
            }
            return ['error' => 'Логин или пароль введены неверно'];
        } else {
            return ['error' => 'login and password required'];
        }

    }

    /**
     * @param $password
     * @return string
     */
    public static function generatePassword($password)
    {
        return hash('sha256', $password);
    }

    /**+
     * @return bool
     */
    public static function isAdmin($user)
    {
        return (!empty($user->role) && $user->role == self::ROLE_ADMIN);
    }
}