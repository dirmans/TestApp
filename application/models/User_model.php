<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    // FUNGSI GET DATA
    function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }

    function getUserByEmail($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }

    function getUserByActive($email)
    {
        return $this->db->get_where('user', ['email' => $email, 'user_active' => 1])->row_array();
    }

    function getUserTokenByToken($token)
    {
        return $this->db->get_where('user_token', ['token' => $token])->row_array();
    }

    // FUNGSI INSERT DATA
    function insertUser($data)
    {
        return $this->db->insert('user', $data);
    }

    function insertUserToken($user_token)
    {
        return $this->db->insert('user_token', $user_token);
    }

    // FUNGSI UPDATE DATA
    function updateUserActive($email)
    {
        $this->db->set('user_active', 1);
        $this->db->where('email', $email);
        $this->db->update('user');
    }

    function updatePassword($email, $password)
    {
        $this->db->set('password', $password);
        $this->db->where('email', $email);
        $this->db->update('user');
    }


    // FUNGSI DELETE DATA
    function deleteUserToken($email)
    {
        return $this->db->delete('user_token', ['email' => $email]);
    }

    function deleteUser($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->delete('user');
    }
}
