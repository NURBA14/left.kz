<?php
namespace app;

use core\Database;

class ContactDB extends Database
{
    public function __construct($host, $user, $password, $database)
    {
        parent::__construct($host, $user, $password, $database);
    }

    public function insertContact($name, $email, $text)
    {
        $insert = "INSERT INTO `contact_data`(`name`, `email`, `text`) VALUES ('{$name}', '{$email}', '{$text}')";
        $result = $this->db->query($insert);
        return $result;
    }

}