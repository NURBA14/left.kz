<?php
namespace app;

use core\Database;

class HomeDB extends Database
{
    public function __construct($host, $user, $password, $database)
    {
        parent::__construct($host, $user, $password, $database);
    }

    public function selectPost()
    {
        $select = "SELECT `id`, `header`, `img_272-250` FROM `posts` ORDER BY `id` DESC LIMIT 6";
        $result = $this->db->query($select);
        if ($result->num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[$row["id"]] = $row;
            }
        }
        if (isset($data)) {
            return ($data);
        }
    }
}