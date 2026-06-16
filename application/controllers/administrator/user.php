<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->database();

        // Cek Login
        if (!$this->session->userdata('logged_in')) {
            redirect('index.php/administrator/auth');
        }
    }

    // ================= DATA USER =================
    public function index()
    {
        $data['title'] = 'Manajemen User';
        $data['users'] = $this->User_model->tampil_data();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/user/index', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= FORM TAMBAH =================
    public function tambah()
    {
        $data['title'] = 'Tambah User';
        $data['provinsi'] = $this->db->get('provinsi')->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/user/tambah', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= SIMPAN USER =================
    public function simpan()
    {
        $role = $this->input->post('role');

        $data = array(
            'nama'      => $this->input->post('nama'),
            'username'  => $this->input->post('username'),
            'password'  => $this->input->post('password'),
            'role'      => $role,
            'id_desa'   => ($role == 'kordinator_desa')
                            ? $this->input->post('id_desa')
                            : NULL
        );

        $this->User_model->insert_data($data);

        $this->session->set_flashdata('success', 'User berhasil ditambahkan');
        redirect('index.php/administrator/user');
    }

    // ================= FORM EDIT =================
    public function edit($id_user)
    {
        $data['title'] = 'Edit User';
        $data['provinsi'] = $this->db->get('provinsi')->result();
        $data['user'] = $this->User_model->get_by_id($id_user);

        if (!$data['user']) {
            show_404();
        }

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/user/edit', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= UPDATE USER =================
    public function update()
    {
        $id_user = $this->input->post('id_user');
        $role    = $this->input->post('role');

        $data = array(
            'nama'      => $this->input->post('nama'),
            'username'  => $this->input->post('username'),
            'role'      => $role,
            'id_desa'   => ($role == 'kordinator_desa')
                            ? $this->input->post('id_desa')
                            : NULL
        );

        // Update password hanya jika diisi
        if (!empty($this->input->post('password'))) {
            $data['password'] = $this->input->post('password');
        }

        $this->User_model->update_data(
            array('id_user' => $id_user),
            $data
        );

        $this->session->set_flashdata('success', 'User berhasil diupdate');
        redirect('index.php/administrator/user');
    }

    // ================= HAPUS USER =================
    public function hapus($id_user)
    {
        $this->User_model->hapus_data(array(
            'id_user' => $id_user
        ));

        $this->session->set_flashdata('success', 'User berhasil dihapus');
        redirect('index.php/administrator/user');
    }

    // ================= AJAX KABUPATEN =================
    public function get_kabupaten()
    {
        $id_provinsi = $this->input->post('id_provinsi');

        $kabupaten = $this->db
            ->where('id_provinsi', $id_provinsi)
            ->order_by('nama_kabupaten', 'ASC')
            ->get('kabupaten')
            ->result();

        echo json_encode($kabupaten);
    }

    // ================= AJAX KECAMATAN =================
    public function get_kecamatan()
    {
        $id_kabupaten = $this->input->post('id_kabupaten');

        $kecamatan = $this->db
            ->where('id_kabupaten', $id_kabupaten)
            ->order_by('nama_kecamatan', 'ASC')
            ->get('kecamatan')
            ->result();

        echo json_encode($kecamatan);
    }

    // ================= AJAX DESA =================
    public function get_desa()
    {
        $id_kecamatan = $this->input->post('id_kecamatan');

        $desa = $this->db
            ->where('id_kecamatan', $id_kecamatan)
            ->order_by('nama_desa', 'ASC')
            ->get('desa')
            ->result();

        echo json_encode($desa);
    }
     // ================= EXSPORT USER DATA =================
     public function export_csv()
{
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data_users.csv');

    $output = fopen('php://output', 'w');

    // Header Excel
    fputcsv($output, [
        'Nama',
        'Username',
        'Role',
        'Desa',
        'TPS',
        'Tanggal Dibuat'
    ]);

    $data = $this->db
        ->select('
            users.nama,
            users.username,
            users.role,
            desa.nama_desa,
            tps.nama_tps,
            users.created_at
        ')
        ->from('users')
        ->join('desa', 'desa.id_desa = users.id_desa', 'left')
        ->join('tps', 'tps.id_tps = users.id_tps', 'left')
        ->order_by('users.id_user', 'ASC')
        ->get()
        ->result();

    foreach($data as $d)
    {
        fputcsv($output, [
            $d->nama,
            $d->username,
            $d->role,
            $d->nama_desa,
            $d->nama_tps,
            $d->created_at
        ]);
    }

    fclose($output);
    exit;
}

}