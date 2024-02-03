<?php
namespace app;

use core\Database;

class BlogDB extends Database
{
    public function __construct($host, $user, $password, $database)
    {
        parent::__construct($host, $user, $password, $database);
    }
    
    public function selectBlog($off)
    {
        $select = "
        SELECT 
            posts.id,
            posts.author_id,
            posts.header,
            user_data.login,
            posts.mini_description,
            `img_272-250`,
            posts.date
        FROM `posts`, `user_data` WHERE `author_id` = user_data.id ORDER BY posts.id DESC LIMIT 4 OFFSET {$off}";
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