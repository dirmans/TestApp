<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News_model extends CI_Model
{

    // FUNGSI GET NEWS
    public function getAllNews()
    {
        return $this->db->get('news')->result_array();
    }

     public function getSomeNews()
    {
        return $this->db->query('SELECT * FROM news limit 4')->result_array();
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

    // FUNGSI READMORE
    public function readmore($id_news)
    {
        return $this->db->query('SELECT news.title, news.content, news.image as gambar, news.create_by, news.create_date, user.image as gambar2, user.name FROM news inner join user on news.create_by = user.name where id_news ="'.$id_news.'"')->result_array(); 
    }
}