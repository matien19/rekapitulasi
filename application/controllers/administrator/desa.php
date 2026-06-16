<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('desa_model');
        $this->load->model('kecamatan_model');
        $this->load->model('kabupaten_model');
        $this->load->model('provinsi_model');
        $this->load->model('dapil_model'); // tambah
    }

    // ================= TAMPIL =================
    public function index()
    {
        $data['desa'] = $this->desa_model->tampil_data();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/desa', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= INPUT =================
    public function input()
    {
        $data['provinsi'] = $this->provinsi_model->tampil_data();

        // ambil dapil DPRD Kabupaten saja
        $data['dapil'] = $this->db
            ->where('kategori', 'DPRD KABUPATEN')
            ->order_by('nama_dapil', 'ASC')
            ->get('dapil')
            ->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/desa_form', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= SIMPAN =================
    public function simpan()
    {
        $data = [
            'nama_desa'    => $this->input->post('nama_desa'),
            'id_kecamatan' => $this->input->post('id_kecamatan'),
            'id_dapil'     => $this->input->post('id_dapil')
        ];

        $this->desa_model->insert_data($data);

        redirect('index.php/administrator/desa');
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $data['desa'] = $this->desa_model->edit_data($id);

        $data['provinsi'] = $this->provinsi_model->tampil_data();

        $data['kabupaten'] = $this->kabupaten_model
            ->get_by_provinsi($data['desa']->id_provinsi);

        $data['kecamatan'] = $this->kecamatan_model
            ->get_by_kabupaten($data['desa']->id_kabupaten);

        $data['dapil'] = $this->db
            ->where('kategori', 'DPRD KABUPATEN')
            ->order_by('nama_dapil', 'ASC')
            ->get('dapil')
            ->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/desa_edit', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= UPDATE =================
    public function update()
    {
        $id = $this->input->post('id_desa');

        $data = [
            'nama_desa'    => $this->input->post('nama_desa'),
            'id_kecamatan' => $this->input->post('id_kecamatan'),
            'id_dapil'     => $this->input->post('id_dapil')
        ];

        $this->desa_model->update_data($id, $data);

        redirect('index.php/administrator/desa');
    }

    // ================= HAPUS =================
    public function hapus($id)
    {
        $this->desa_model->hapus_data($id);

        redirect('index.php/administrator/desa');
    }

    // ================= AJAX =================
    public function get_kabupaten()
    {
        $id_provinsi = $this->input->post('id_provinsi');

        $data = $this->kabupaten_model
            ->get_by_provinsi($id_provinsi);

        echo json_encode($data);
    }

    public function get_kecamatan()
    {
        $id_kabupaten = $this->input->post('id_kabupaten');

        $data = $this->kecamatan_model
            ->get_by_kabupaten($id_kabupaten);

        echo json_encode($data);
    }
}