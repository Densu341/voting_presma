<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Result_model extends CI_Model
{
    public function get_result()
    {
        $this->db->select('candidate.id_candidate, candidate.nama_candidate, candidate.foto, COUNT(result.id_candidate) AS total_vote');
        $this->db->from('candidate');
        $this->db->join('result', 'result.id_candidate = candidate.id_candidate', 'left');
        $this->db->group_by('candidate.id_candidate');
        $this->db->order_by('total_vote', 'DESC');
        return $this->db->get()->result_array();
    }
}
