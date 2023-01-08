<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Welcome to E-Voting';
        $this->load->view('index', $data);
    }

    public function download()
    {
        force_download('assets/downloads/Voting-presma.apk', NULL);
    }
}
