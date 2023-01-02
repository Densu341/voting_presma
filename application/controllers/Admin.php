<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('role_model');
        $this->load->model('candidate_model');
        $this->load->model('prodi_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->role_model->getrole();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function addrole()
    {
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Role';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['role'] = $this->role_model->getrole();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->role_model->add_role();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New role added!</div>');
            redirect('admin/role');
        }
    }

    public function editrole()
    {
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Role';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['role'] = $this->role_model->getrole();
            $data['role'] = $this->role_model->get_role_by_id();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->role_model->update_role();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role has been updated!</div>');
            redirect('admin/role');
        }
    }

    public function deleterole($role_id)
    {
        $this->role_model->delete_role($role_id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role has been deleted!</div>');
        redirect('admin/role');
    }

    public function roleaccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['role_id' => $role_id])->row_array();
        $this->db->where('menu_id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }

    public function candidate()
    {
        $data['title'] = 'Candidate';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['candidate'] = $this->candidate_model->get_candidate();
        $data['prodi'] = $this->prodi_model->getProdi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/candidate', $data);
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
            $data['prodi'] = $this->prodi_model->get_prodi();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/candidate', $data);
            $this->load->view('templates/footer');
        } else {
            $this->candidate_model->add_candidate();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New candidate added!</div>');
            redirect('admin/candidate');
        }
    }

    public function editcandidate()
    {
        $data['title'] = 'Data Candidate';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['candidate'] = $this->candidate_model->get_candidate();
        $data['candidate'] = $this->candidate_model->get_candidate_by_id('1');
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
            $this->load->view('admin/candidate', $data);
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

            $update = [
                'nama_candidate' => $nama_candidate,
                'id_prodi' => $id_prodi,
                'visi' => $visi,
                'misi' => $misi
            ];

            $this->db->set($update);
            $this->db->where('nim', $nim);
            $this->db->update('candidate');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Candidate has been updated!</div>');
            redirect('admin/candidate');
        }
    }


    public function deletecandidate($id_candidate)
    {
        $this->candidate_model->delete_candidate($id_candidate);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Candidate has been deleted!</div>');
        redirect('admin/candidate');
    }
}
