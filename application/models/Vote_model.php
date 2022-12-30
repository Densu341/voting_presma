<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Vote_model extends CI_Model
{
    public function get_result()
    {
        $this->db->select('*');
        $this->db->from('result');
        $this->db->join('voters', 'voters.id_voters = result.id_voters');
        $this->db->join('candidate', 'candidate.id_candidate = result.id_candidate');
        return $this->db->get()->result_array();
    }

    public function add_result($data)
    {
        $this->db->insert('result', $data);
    }
}