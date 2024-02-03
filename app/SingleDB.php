<?php
namespace app;

use core\Database;

class SingleDB extends Database
{
    public function __construct($host, $user, $password, $database)
    {
        parent::__construct($host, $user, $password, $database);
    }
    public function selectOnePost($post_id)
    {
        $select = "SELECT 
            posts.id, 
            posts.author_id, 
            user_data.id as `user_id`,
            user_data.login,
            posts.header, 
            posts.mini_description, 
            posts.full_description, 
            posts.`img_600-300`,
            posts.date
        FROM `posts`, `user_data` WHERE posts.author_id = user_data.id AND posts.id = {$post_id};";
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
    public function selectComments($post_id)
    {
        $select = "SELECT 
        user_comment.id,
        user_comment.post_id,
        user_comment.name,
        user_comment.text,
        user_comment.date
    FROM `user_comment`, `posts` WHERE user_comment.post_id = posts.id AND user_comment.post_id = {$post_id} ORDER BY `id` DESC;";
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
    public function insertComment($post_id, $name, $text)
    {
        $insert = "INSERT INTO `user_comment`(`post_id`, `name`, `text`) VALUES ('{$post_id}', '$name', '$text')";
        $result = $this->db->query($insert);
        return $result;
    }

    public function selectId($id)
    {
        $select = "SELECT id FROM `posts` WHERE id = {$id}";
        $result = $this->db->query($select);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_row()) {
                $data = $row;
            }
        }
        if (isset($data)) {
            return ($data);
        }
    }

}