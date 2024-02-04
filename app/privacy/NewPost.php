<?php
namespace app\privacy;

use core\Database;

class NewPost extends Database
{
    public function __construct($host, $user, $password, $database)
    {
        parent::__construct($host, $user, $password, $database);
    }

    public function insertPost($author_id, $header, $mini_description, $full_description, $img_600, $img_272){
        $insert = "INSERT INTO `posts`(
                `author_id`, 
                `header`, 
                `mini_description`, 
                `full_description`, 
                `img_600-300`, 
                `img_272-250`
            ) VALUES (
                '{$author_id}',
                '{$header}',
                '{$mini_description}',
                '{$full_description}',
                '{$img_600}',
                '{$img_272}'
            );";
        $result = $this->db->query($insert);
        return $result;
    }

}