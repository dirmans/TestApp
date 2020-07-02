<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{

    // FUNGSI GET
    function getAllProduct()
    {
        return $this->db->get('product')->result_array();
    }

    function getProdcutByActive()
    {
        return $this->db->get_where('product', ['status' => '1']);
    }

    // FUNGSI INSERT
    function insertProduct($data)
    {
        return $this->db->insert('product', $data);
    }

    // FUNGSI UPDATE
    function updateProduct($data, $code)
    {
        $this->db->set($data);
        $this->db->where('code_product', $code);
        $this->db->update('product');
    }

    // FUNGSI DELETE
    function deleteProduct($id)
    {
        $this->db->where('id_product', $id);
        return $this->db->delete('product');
    }
}
