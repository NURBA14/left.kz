<?php
namespace app\admin;

use core\DataBase;

class LoginDB extends DataBase
{
    public function __construct($host, $user, $password, $database)
    {
        parent::__construct($host, $user, $password, $database);
    }

    public function selectUserData($login, $email, $password)
    {
        $select = "SELECT 
            `id`, 
            `login`, 
            `email`, 
            `password` 
        FROM `user_data` WHERE `login` = '{$login}' AND `email` = '{$email}' AND `password` = '{$password}';";
        $result = $this->db->query($select);
        return $result;
    }

}