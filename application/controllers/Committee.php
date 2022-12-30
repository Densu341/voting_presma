<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Committee extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('voters_model');
        $this->load->model('candidate_model');
        $this->load->model('faculty_model');
        $this->load->model('prodi_model');
        $this->load->model('vote_model');
        $this->load->model('Result_model');
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('committee/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('name', 'Username', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('committee/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|svg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('committee');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('committee/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('committee/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('committee/changepassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('committee/changepassword');
                }
            }
        }
    }

    //menu voters
    public function voters()
    {
        $data['title'] = 'Data Voters';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['voters'] = $this->voters_model->get_voters();
        $data['prodi'] = $this->db->get('prodi')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('committee/voters', $data);
        $this->load->view('templates/footer');
    }

    public function addvoters()
    {
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim|is_unique[voters.nim]', [
            'is_unique' => 'This NIM has already registered!'
        ]);
        $this->form_validation->set_rules('nama_voters', 'Nama', 'required|trim');
        $this->form_validation->set_rules('id_prodi', 'Prodi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Voters';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['voters'] = $this->voters_model->get_voters();
            $data['prodi'] = $this->db->get('prodi')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('committee/voters', $data);
            $this->load->view('templates/footer');
        } else {
            $this->voters_model->add_voters();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New voters added!</div>');
            redirect('committee/voters');
        }
    }

    public function editvoters()
    {
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim');
        $this->form_validation->set_rules('nama_voters', 'Nama', 'required|trim');
        $this->form_validation->set_rules('id_prodi', 'Prodi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Voters';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['voters'] = $this->voters_model->get_voters();
            $data['voters'] = $this->voters_model->get_voters_by_id();
            $data['prodi'] = $this->db->get('prodi')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('committee/voters', $data);
            $this->load->view('templates/footer');
        } else {
            $this->voters_model->update_voters();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Voters has been updated!</div>');
            redirect('committee/voters');
        }
    }

    public function deletevoters($id_voters)
    {
        $this->voters_model->delete_voters($id_voters);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Voters has been deleted!</div>');
        redirect('committee/voters');
    }
    //end menu voters

    //menu kandidat
    public function candidate()
    {
        $data['title'] = 'Data Candidate';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['candidate'] = $this->candidate_model->get_candidate();
        $data['prodi'] = $this->db->get('prodi')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('committee/candidate', $data);
        $this->load->view('templates/footer');
    }

    public function addcandidate()
    {
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim|is_unique[candidate.nim]', [
            'is_unique' => 'This NIM has already registered!'
        ]);
        $this->form_validation->set_rules('nama_candidate', 'Nama', 'required|trim');
        $this->form_validation->set_rules('id_prodi', 'Prodi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Candidate';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['candidate'] = $this->candidate_model->get_candidate();
            $data['prodi'] = $this->db->get('prodi')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('committee/candidate', $data);
            $this->load->view('templates/footer');
        } else {
            $this->candidate_model->add_candidate();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New candidate added!</div>');
            redirect('committee/candidate');
        }
    }

    public function editcandidate()
    {
        $data['title'] = 'Data Candidate';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['candidate'] = $this->candidate_model->get_candidate();
        $data['candidate'] = $this->candidate_model->get_candidate_by_id();
        $data['prodi'] = $this->db->get('prodi')->result_array();
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim');
        $this->form_validation->set_rules('nama_candidate', 'Nama', 'required|trim');
        $this->form_validation->set_rules('id_prodi', 'Prodi', 'required|trim');
        $this->form_validation->set_rules('visi', 'Visi', 'required|trim');
        $this->form_validation->set_rules('misi', 'Misi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('committee/candidate', $data);
            $this->load->view('templates/footer');
        } else {
            $nim = $this->input->post('nim');
            $nama_candidate = $this->input->post('nama_candidate');
            $id_prodi = $this->input->post('id_prodi');
            $visi = $this->input->post('visi');
            $misi = $this->input->post('misi');
            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['foto']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|svg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/candidate/';
                $config['file_name'] = $nim;
                $config['overwrite'] = true;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    $old_image = $data['candidate']['foto'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/candidate/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('nama_candidate', $nama_candidate);
            $this->db->where('nim', $nim);
            $this->db->update('candidate');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Candidate has been updated!</div>');
            redirect('committee/candidate');
        }
    }

    public function deletecandidate($id_candidate)
    {
        $this->candidate_model->delete_candidate($id_candidate);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Candidate has been deleted!</div>');
        redirect('committee/candidate');
    }
    //end menu kandidat

    //menu fakultas
    public function faculty()
    {
        $data['title'] = 'Data Faculty';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['faculty'] = $this->faculty_model->getFaculty();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('committee/faculty', $data);
        $this->load->view('templates/footer');
    }

    public function addfaculty()
    {
        $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required|trim|is_unique[fakultas.nama_fakultas]', [
            'is_unique' => 'This faculty has already registered!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Faculty';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['faculty'] = $this->faculty_model->getFaculty();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('committee/faculty', $data);
            $this->load->view('templates/footer');
        } else {
            $this->faculty_model->add_Faculty();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New faculty added!</div>');
            redirect('committee/faculty');
        }
    }

    public function editfaculty()
    {
        $data['title'] = 'Data Faculty';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['faculty'] = $this->faculty_model->getFaculty();
        $data['faculty'] = $this->faculty_model->getFaculty_By_Id();
        $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('committee/faculty', $data);
            $this->load->view('templates/footer');
        } else {
            $this->faculty_model->update_Faculty();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Faculty has been updated!</div>');
            redirect('committee/faculty');
        }
    }

    public function deletefaculty($id_fakultas)
    {
        $this->faculty_model->delete_Faculty($id_fakultas);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Faculty has been deleted!</div>');
        redirect('committee/faculty');
    }
    //end menu fakultas

    //menu prodi
    public function prodi()
    {
        $data['title'] = 'Data Prodi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['prodi'] = $this->prodi_model->getProdi();
        $data['faculty'] = $this->faculty_model->getFaculty();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('committee/prodi', $data);
        $this->load->view('templates/footer');
    }

    public function addprodi()
    {
        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required|trim|is_unique[prodi.nama_prodi]', [
            'is_unique' => 'This prodi has already registered!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Prodi';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['prodi'] = $this->prodi_model->getProdi();
            $data['faculty'] = $this->faculty_model->getFaculty();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('committee/prodi', $data);
            $this->load->view('templates/footer');
        } else {
            $this->prodi_model->add_Prodi();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New prodi added!</div>');
            redirect('committee/prodi');
        }
    }

    public function editprodi()
    {
        $data['title'] = 'Data Prodi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['prodi'] = $this->prodi_model->getProdi();
        $data['faculty'] = $this->faculty_model->getFaculty();
        $data['prodi'] = $this->prodi_model->getProdi_By_Id();
        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('committee/prodi', $data);
            $this->load->view('templates/footer');
        } else {
            $this->prodi_model->update_Prodi();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Prodi has been updated!</div>');
            redirect('committee/prodi');
        }
    }

    public function deleteprodi($id_prodi)
    {
        $this->prodi_model->delete_Prodi($id_prodi);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Prodi has been deleted!</div>');
        redirect('committee/prodi');
    }
    //end menu prodi

    //hasil voting
    public function result()
    {
        $data['title'] = 'Hasil Voting';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['result'] = $this->vote_model->get_result();
        $data['candidate'] = $this->candidate_model->get_candidate();

        $data['persentase'] = $this->Result_model->get_result();

        $data['jml'] = COUNT($data['persentase']);


        // var_dump($data['persentase']);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('committee/result', $data);
        $this->load->view('templates/footer');
    }
    //end hasil voting
}
