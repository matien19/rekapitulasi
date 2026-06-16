<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_suara extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Hasil_suara_model');
        $this->load->library('session');

        // LOGIN
        if (!$this->session->userdata('logged_in')) {

            redirect('index.php/administrator/auth');
        }

        // ADMIN ONLY
        if ($this->session->userdata('role') != 'admin') {

            redirect('index.php/administrator/auth');
        }
    }

    // ================= INDEX =================
    public function index()
    {
        $data['hasil'] = $this->Hasil_suara_model->get_hasil();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/hasil_suara', $data);
        $this->load->view('templates_administrator/footer');
    }
}