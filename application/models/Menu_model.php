<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getmenu()
    {
        $this->db->select('*');
        $this->db->from('user_menu');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_menu()
    {
        $data = [
            'menu' => $this->input->post('menu'),
        ];
        $this->db->insert('user_menu', $data);
    }

    public function get_menu_by_id($menu_id)
    {
        $this->db->select('*');
        $this->db->from('user_menu');
        $this->db->where('menu_id', $menu_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_menu()
    {
        $data = [
            'menu' => $this->input->post('menu'),
        ];
        $this->db->where('menu_id', $this->input->post('menu_id'));
        $this->db->update('user_menu', $data);
    }

    public function delete_menu($menu_id)
    {
        $this->db->where('menu_id', $menu_id);
        $this->db->delete('user_menu');
    }

    public function getsubmenu()
    {
        $this->db->select('*');
        $this->db->from('sub_menu');
        $this->db->join('user_menu', 'user_menu.menu_id = sub_menu.menu_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function addsubmenu()
    {
        $data = [
            'title' => $this->input->post('title'),
            'menu_id' => $this->input->post('menu_id'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
        ];
        $this->db->insert('sub_menu', $data);
    }

    public function getsubmenu_by_id($sub_id)
    {
        $this->db->select('*');
        $this->db->from('sub_menu');
        $this->db->join('user_menu', 'user_menu.menu_id = sub_menu.menu_id');
        $this->db->where('sub_id', $sub_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_submenu()
    {
        $data = [
            'title' => $this->input->post('title'),
            'menu_id' => $this->input->post('menu_id'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
        ];
        $this->db->where('sub_id', $this->input->post('sub_id'));
        $this->db->update('sub_menu', $data);
    }

    public function delete_submenu($sub_id)
    {
        $this->db->where('sub_id', $sub_id);
        $this->db->delete('sub_menu');
    }
}
