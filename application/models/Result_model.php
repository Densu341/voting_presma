<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Result_model extends CI_Model
{
    public function get_result()
    {
        $this->db->select('candidate.id_candidate, candidate.name, candidate.photo, COUNT(vote.id_candidate) AS total_vote');
        $this->db->from('candidate');
        $this->db->join('vote', 'vote.id_candidate = candidate.id_candidate', 'left');
        $this->db->group_by('candidate.id_candidate');
        $this->db->order_by('total_vote', 'DESC');
        return $this->db->get()->result_array();
    }
}
