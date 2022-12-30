<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Voting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('candidate_model');
        $this->load->model('vote_model');
    }

    public function index()
    {
        $data['title'] = 'Mobile Voting';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['candidate'] = $this->candidate_model->get_candidate();
        $this->load->view('templates/header', $data);
        $this->load->view('voting/index', $data);
        $this->load->view('templates/footer');
    }

    public function getvote($id_candidate)
    {
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim|numeric|matches[voters.nim]', [
            'required' => 'NIM harus diisi!',
            'numeric' => 'NIM harus berupa angka!',
            'matches' => 'NIM tidak terdaftar!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Mobile Voting';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['candidate'] = $this->candidate_model->get_candidate_by_id($id_candidate);
            $this->load->view('templates/header', $data);
            $this->load->view('voting/getvote', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Vote_model->add_result();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Terima kasih telah memberikan suara!</div>');
            redirect('voting');
        }
    }
}
