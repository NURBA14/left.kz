<?php
namespace app;

use core\Database;

class GalleryDB extends Database
{
    public function __construct($host, $user, $password, $database)
    {
        parent::__construct($host, $user, $password, $database);
    }

    public function selectGallery($off)
    {
        $select = "SELECT `id`, `header`, `mini_description`, `img_600-300` FROM `gallery` ORDER BY `id` DESC LIMIT 4 OFFSET {$off}";
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