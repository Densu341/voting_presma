<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faculty_model extends CI_Model
{
    public function getFaculty()
    {
        $this->db->select('*');
        $this->db->from('fakultas');
        $this->db->order_by('nama_fakultas', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getFaculty_By_Id($id)
    {
        return $this->db->get_where('fakultas', ['id_fakultas' => $id])->row_array();
    }

    public function add_Faculty()
    {
        $data = [
            "id_fakultas" => $this->input->post('id_fakultas', true),
            "nama_fakultas" => $this->input->post('nama_fakultas', true)
        ];

        $this->db->insert('fakultas', $data);
    }

    public function update_Faculty()
    {
        $data = [
            "id_fakultas" => $this->input->post('id_fakultas', true),
            "nama_fakultas" => $this->input->post('nama_fakultas', true)
        ];

        $this->db->where('id_fakultas', $this->input->post('id_fakultas'));
        $this->db->update('fakultas', $data);
    }

    public function delete_Faculty($id_fakultas)
    {
        $this->db->where('id_fakultas', $id_fakultas);
        $this->db->delete('fakultas');
    }
}
