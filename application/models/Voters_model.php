<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Voters_model extends CI_Model
{
    public function get_voters()
    {
        $this->db->select('*');
        $this->db->from('voters');
        $this->db->join('prodi', 'prodi.id_prodi = voters.id_prodi');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_prodi()
    {
        $result = $this->db->get('prodi')->result();
        return $result;
    }

    public function add_voters()
    {
        $data = [
            'nim' => $this->input->post('nim'),
            'nama_voters' => $this->input->post('nama_voters'),
            'id_prodi' => $this->input->post('id_prodi'),
        ];
        $this->db->insert('voters', $data);
    }

    public function get_voters_by_id($id_voters)
    {
        $this->db->select('*');
        $this->db->from('voters');
        $this->db->join('prodi', 'prodi.id_prodi = voters.id_prodi');
        $this->db->where('id_voters', $id_voters);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_voters()
    {
        $data = [
            'nim' => $this->input->post('nim'),
            'nama_voters' => $this->input->post('nama_voters'),
            'id_prodi' => $this->input->post('id_prodi'),
        ];
        $this->db->where('id_voters', $this->input->post('id_voters'));
        $this->db->update('voters', $data);
    }

    public function delete_voters($id_voters)
    {
        $this->db->where('id_voters', $id_voters);
        $this->db->delete('voters');
    }
}
