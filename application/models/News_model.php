<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News_model extends CI_Model
{

    public function getAllNews()
    {
        return $this->db->get('news')->result_array();
    }

    public function archives($table)
    {
        $this->db->order_by("id_news", "desc");
        $query = $this->db->get($table);
        return $query->result();
    }

    public function insertNews($data)
    {
        return $this->db->insert('news', $data);
    }
}
