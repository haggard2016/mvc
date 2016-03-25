<?php

/**
 * Created by PhpStorm.
 * User: PHP acedemy
 * Date: 24.03.2016
 * Time: 20:18
 */
class UserModel
{
    public function find($email, $password)
    {
        $db = DbConnection::getInstance()->getPdo();
        $sth = $db->prepare('SELECT * FROM user WHERE email = :email AND password = :password LIMIT 1');
        $sth->execute(compact('email', 'password'));
        return $sth->fetch(PDO::FETCH_ASSOC);
    }
}