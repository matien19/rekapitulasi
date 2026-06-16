<?php

class Kecamatan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('kecamatan_model');
        $this->load->model('kabupaten_model');
        $this->load->model('provinsi_model');
    }

    // ================= TAMPIL =================
    public function index()
    {
        $data['kecamatan'] = $this->kecamatan_model->tampil_data();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/kecamatan', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= INPUT =================
    public function input()
    {
        $data['provinsi'] = $this->provinsi_model->tampil_data();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/kecamatan_form', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= SIMPAN =================
    public function simpan()
    {
        $data = [
            'nama_kecamatan' => $this->input->post('nama_kecamatan'),
            'id_kabupaten'   => $this->input->post('id_kabupaten')
        ];

        $this->kecamatan_model->insert_data($data);

        redirect('index.php/administrator/kecamatan');
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $data['kecamatan'] = $this->kecamatan_model->edit_data($id);

        $data['provinsi'] = $this->provinsi_model->tampil_data();

        $data['kabupaten'] = $this->kabupaten_model
            ->get_by_provinsi($data['kecamatan']->id_provinsi);

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/kecamatan_edit', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= UPDATE =================
    public function update()
    {
        $id = $this->input->post('id_kecamatan');

        $data = [
            'nama_kecamatan' => $this->input->post('nama_kecamatan'),
            'id_kabupaten'   => $this->input->post('id_kabupaten')
        ];

        $this->kecamatan_model->update_data($id, $data);

        redirect('index.php/administrator/kecamatan');
    }

    // ================= HAPUS =================
    public function hapus($id)
    {
        $this->kecamatan_model->hapus_data($id);

        redirect('index.php/administrator/kecamatan');
    }

    // ================= AJAX =================
    public function get_kabupaten()
    {
        $id_provinsi = $this->input->post('id_provinsi');

        $data = $this->kabupaten_model
            ->get_by_provinsi($id_provinsi);

        echo json_encode($data);
    }
}