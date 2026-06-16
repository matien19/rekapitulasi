<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Login_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    // ================= HALAMAN LOGIN =================
    public function index()
    {
        $this->load->view('templates_administrator/header');
        $this->load->view('administrator/login');
        $this->load->view('templates_administrator/footer');
    }

    // ================= PROSES LOGIN =================
    public function proses_login()
    {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required'
        );

        $this->form_validation->set_rules(
            'password',
            'Password',
            'required'
        );

        // ================= VALIDASI GAGAL =================
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates_administrator/header');
            $this->load->view('administrator/login');
            $this->load->view('templates_administrator/footer');

        } else {

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // ==================================================
            // LOGIN ADMIN & KORDES DARI TABEL USERS
            // ==================================================
            $user = $this->Login_model
                         ->cek_login_users($username, $password);

            if ($user) {

                $this->session->set_userdata([
                    'id_user'   => $user->id_user,
                    'nama'      => $user->nama,
                    'username'  => $user->username,
                    'role'      => $user->role,
                    'id_desa'   => $user->id_desa,
                    'id_tps'    => $user->id_tps,
                    'logged_in' => TRUE
                ]);

                // ================= ADMIN =================
                if ($user->role == 'admin') {

                    redirect('index.php/administrator/dashboard');
                }

                // ================= KORDINATOR DESA =================
                elseif ($user->role == 'kordinator_desa') {

                    redirect('index.php/kordes');
                }

                // ================= SAKSI JIKA ADA DI USERS =================
                elseif ($user->role == 'saksi') {

                    redirect('index.php/saksi');
                }

                return;
            }

            // ==================================================
            // LOGIN KHUSUS TABEL SAKSI
            // ==================================================
            $saksi = $this->Login_model
                          ->cek_login_saksi($username, $password);

            if ($saksi) {

                $this->session->set_userdata([
                    'id_saksi'  => $saksi->id_saksi,
                    'nama'      => $saksi->nama_saksi,
                    'username'  => $saksi->username,
                    'role'      => 'saksi',
                    'id_tps'    => $saksi->id_tps,
                    'logged_in' => TRUE
                ]);

                redirect('index.php/saksi');
                return;
            }

            // ================= LOGIN GAGAL =================
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger">
                    Username atau Password salah
                </div>'
            );

            redirect('index.php/administrator/auth');
        }
    }

    // ================= LOGOUT =================
    public function logout()
{
    $this->session->unset_userdata('id_user');
    $this->session->unset_userdata('nama');
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('role');
    $this->session->unset_userdata('id_desa');
    $this->session->unset_userdata('id_tps');
    $this->session->unset_userdata('logged_in');

    $this->session->sess_destroy();

    redirect('index.php/administrator/auth');
}
}