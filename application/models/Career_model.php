<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Career_model extends CI_Model
{

    // FUNGSI GET CAREER
    function getAllCareer()
    {
        return $this->db->get('career')->result_array();
    }

    // FUNGSI INSERT CAREER
    function insertCareer($data)
    {
        return $this->db->insert('career', $data);
    }

    // FUNGSI UPDATE CAREER
    function updateCareer($data, $id)
    {
        $this->db->set($data);
        $this->db->where('id_career', $id);
        return $this->db->update('career');
    }
}
