<?php

/**
 * 
 */
class News_model extends CI_Model
{
    function archives($table)
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get($table);
        return $query->result();
    }

    function delete_news($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
