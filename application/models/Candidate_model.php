<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Candidate_model extends CI_Model
{
    public function get_candidate()
    {
        $this->db->select('*');
        $this->db->from('candidate');
        $this->db->join('prodi', 'prodi.id_prodi = candidate.id_prodi');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_prodi()
    {
        $result = $this->db->get('prodi')->result();
        return $result;
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './assets/img/candidate/';
        $config['allowed_types']        = 'svg|gif|jpg|png';
        $config['file_name']            = $this->input->post('id_candidate');
        $config['overwrite']            = true;
        $config['max_size']             = 2048; // 2MB
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    public function add_candidate()
    {
        $data = [
            'nim' => $this->input->post('nim'),
            'nama_candidate' => $this->input->post('nama_candidate'),
            'id_prodi' => $this->input->post('id_prodi'),
            'foto' => $this->_uploadImage(),
            'visi' => $this->input->post('visi'),
            'misi' => $this->input->post('misi'),
        ];
        $this->db->insert('candidate', $data);
    }

    public function get_candidate_by_id($id_candidate)
    {
        $this->db->select('*');
        $this->db->from('candidate');
        $this->db->join('prodi', 'prodi.id_prodi = candidate.id_prodi');
        $this->db->where('id_candidate', $id_candidate);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function delete_candidate($id_candidate)
    {
        $this->db->where('id_candidate', $id_candidate);
        $this->db->delete('candidate');
    }
}
