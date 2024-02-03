<?php
namespace core;

use mysqli;

abstract class Database
{
    protected $db;
    public function __construct($host, $user, $password, $database)
    {
        $this->db = new mysqli($host, $user, $password, $database);
    }

    public function selectNumRows($table)
    {
        $select = "SELECT COUNT(`id`) as `rows` FROM `{$table}`";
        $result = $this->db->query($select);
        $data = $result->fetch_assoc();
        return $data;
    }
}