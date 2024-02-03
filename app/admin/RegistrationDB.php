<?php
namespace app\admin;

use core\DataBase;

class RegistrationDB extends DataBase
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
        if($result->num_rows === 0){
            return true;
        }else{
            return false;
        }
    }
    public function insertUserData($login, $email, $password)
    {
        $insert = "INSERT INTO `user_data`(
            `login`, 
            `email`, 
            `password`
        ) VALUES (
            '{$login}',
            '{$email}',
            '{$password}'
        );";
        $result = $this->db->query($insert);
        return $result;
    }
}