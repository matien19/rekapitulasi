<?php

class Provinsi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('provinsi_model');
    }

    // ================= TAMPIL DATA =================
    public function index()
    {
        $data['provinsi'] = $this->provinsi_model->tampil_data();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/provinsi', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= FORM INPUT =================
    public function input()
    {
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/provinsi_form');
        $this->load->view('templates_administrator/footer');
    }

    // ================= SIMPAN =================
    public function simpan()
    {
        $data = [
            'nama_provinsi' => $this->input->post('nama_provinsi')
        ];

        $this->provinsi_model->insert_data($data);

        redirect('index.php/administrator/provinsi');
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $data['provinsi'] = $this->provinsi_model->edit_data($id);

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/provinsi_edit', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= UPDATE =================
    public function update()
    {
        $id = $this->input->post('id_provinsi');

        $data = [
            'nama_provinsi' => $this->input->post('nama_provinsi')
        ];

        $this->provinsi_model->update_data($id, $data);

        redirect('index.php/administrator/provinsi');
    }

    // ================= HAPUS =================
    public function hapus($id)
    {
        $this->provinsi_model->hapus_data($id);

        redirect('index.php/administrator/provinsi');
    }
}