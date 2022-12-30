<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends CI_Model
{
    public function getrole()
    {
        $this->db->select('*');
        $this->db->from('user_role');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_role()
    {
        $data = [
            'role' => $this->input->post('role'),
        ];
        $this->db->insert('user_role', $data);
    }

    public function get_role_by_id($role_id)
    {
        $this->db->select('*');
        $this->db->from('user_role');
        $this->db->where('role_id', $role_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_role()
    {
        $data = [
            'role' => $this->input->post('role'),
        ];
        $this->db->where('role_id', $this->input->post('role_id'));
        $this->db->update('user_role', $data);
    }

    public function delete_role($role_id)
    {
        $this->db->where('role_id', $role_id);
        $this->db->delete('user_role');
    }
}
