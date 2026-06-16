<?php

class Dapil extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Dapil_model');
        $this->load->model('Kabupaten_model');
    }

    // ================= LIST =================
    public function index()
    {
        $data['dapil'] = $this->Dapil_model->tampil_data();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/dapil', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= FORM INPUT =================
    public function input()
    {
        $data['kabupaten'] = $this->Kabupaten_model->tampil_data();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/dapil_form', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= SIMPAN =================
    public function simpan()
    {
        $data = [
            'id_kabupaten' => $this->input->post('id_kabupaten'),
            'nama_dapil'   => $this->input->post('nama_dapil'),
            'kategori'     => $this->input->post('kategori')
        ];

        $this->Dapil_model->insert_data($data);

        redirect('index.php/administrator/dapil');
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $data['dapil'] = $this->Dapil_model->edit_data($id);

        $data['kabupaten'] = $this->Kabupaten_model->tampil_data();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/dapil_edit', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= UPDATE =================
    public function update()
    {
        $id = $this->input->post('id_dapil');

        $data = [
            'id_kabupaten' => $this->input->post('id_kabupaten'),
            'nama_dapil'   => $this->input->post('nama_dapil'),
            'kategori'     => $this->input->post('kategori')
        ];

        $this->Dapil_model->update_data($id, $data);

        redirect('index.php/administrator/dapil');
    }

    // ================= HAPUS =================
    public function hapus($id)
    {
        $this->Dapil_model->hapus_data($id);

        redirect('index.php/administrator/dapil');
    }
}