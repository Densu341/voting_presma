<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi_model extends CI_Model
{
    public function getProdi()
    {
        $this->db->select('*');
        $this->db->from('prodi');
        $this->db->join('fakultas', 'fakultas.id_fakultas = prodi.id_fakultas');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getFaculty()
    {
        $this->db->select('*');
        $this->db->from('fakultas');
        $this->db->order_by('nama_fakultas', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getProdi_By_Id($id)
    {
        return $this->db->get_where('prodi', ['id_prodi' => $id])->row_array();
    }

    public function add_Prodi()
    {
        $data = [
            "id_prodi" => $this->input->post('id_prodi', true),
            "nama_prodi" => $this->input->post('nama_prodi', true),
            "id_fakultas" => $this->input->post('id_fakultas', true)
        ];

        $this->db->insert('prodi', $data);
    }

    public function update_Prodi()
    {
        $data = [
            "id_prodi" => $this->input->post('id_prodi', true),
            "nama_prodi" => $this->input->post('nama_prodi', true),
            "id_fakultas" => $this->input->post('id_fakultas', true)
        ];

        $this->db->where('id_prodi', $this->input->post('id_prodi'));
        $this->db->update('prodi', $data);
    }

    public function delete_Prodi($id_prodi)
    {
        $this->db->where('id_prodi', $id_prodi);
        $this->db->delete('prodi');
    }
}
