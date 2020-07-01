<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News_model extends CI_Model
{

    // FUNGSI GET NEWS
    public function getAllNews()
    {
        return $this->db->get('news')->result_array();
    }

    // FUNGSI INSERT NEWS
    public function insertNews($data)
    {
        return $this->db->insert('news', $data);
    }

    // FUNGSI UPDATE NEWS
    public function updateNews($data, $id_news)
    {
        $this->db->set($data);
        $this->db->where('id_news', $id_news);
        return $this->db->update('news');
    }

    // FUNGSI DELETE NEWS
    public function deleteNews($id)
    {
        $this->db->where('id_news', $id);
        return $this->db->delete('news');
    }
}
