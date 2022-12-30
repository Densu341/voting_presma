<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Voting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('candidate_model');
        $this->load->model('Vote_model');
        $this->load->model('Voters_model');
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
        if (!$this->form_validation->run()) {
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

    public function resultVote()
    {
        $vote['candidate'] = $this->input->post('id_candidate');
        $nim = $this->input->post('nim');

        $voters = $this->Voters_model->get_voters_by_nim($nim);

        if (!$voters) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gunakan Nim Yang sesuai!</div>');
            redirect('voting');
        } else {
            if($voters['value'] == 1){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf anda tidak bisa melakukan voting, karena kesempatan sudah digunakan!!</div>');
                redirect('voting');
            } else {
                $datavoting = [
                    'id_voters' => $voters['id_voters'],
                    'id_candidate' => $vote['candidate'],
                    'take'  => date("Y-m-d", time())
                ];

                $data_voters = [
                    'id' => $voters['id_voters'],
                    'value' => 1
                ];

                $this->Vote_model->add_result($datavoting);
                $this->Voters_model->wasVote($data_voters);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Terima kasih telah memberikan suara!</div>');
                redirect('voting');
                }
        }
    }
}
