<?php
namespace app\admin;

use core\Database;

class ProfileDB extends Database
{
    public function __construct($host, $user, $password, $database)
    {
        parent::__construct($host, $user, $password, $database);
    }

    public function selectUserPosts($id)
    {
        $select = "SELECT 
            posts.id, 
            posts.author_id, 
            posts.header, 
            posts.mini_description, 
            posts.full_description, 
            posts.`img_272-250`, 
            posts.date
        FROM `posts`, `user_data` WHERE posts.author_id = user_data.id AND posts.author_id = {$id};";
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
    public function selectUserInfo($id){
        $select = "SELECT 
            `id`, 
            `login` 
        FROM `user_data` WHERE id = {$id};";
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