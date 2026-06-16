<?php

class Kabupaten extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('kabupaten_model');
        $this->load->model('provinsi_model');
    }

    // ================= TAMPIL =================
    public function index()
    {
        $data['kabupaten'] = $this->kabupaten_model->tampil_data();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/kabupaten', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= FORM INPUT =================
    public function input()
    {
        $data['provinsi'] = $this->provinsi_model->tampil_data();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/kabupaten_form', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= SIMPAN =================
    public function simpan()
    {
        $data = [
            'id_provinsi'    => $this->input->post('id_provinsi'),
            'nama_kabupaten' => $this->input->post('nama_kabupaten')
        ];

        $this->kabupaten_model->insert_data($data);

        redirect('index.php/administrator/kabupaten');
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $data['kabupaten'] = $this->kabupaten_model->edit_data($id);
        $data['provinsi']  = $this->provinsi_model->tampil_data();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/kabupaten_edit', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= UPDATE =================
    public function update()
    {
        $id = $this->input->post('id_kabupaten');

        $data = [
            'id_provinsi'    => $this->input->post('id_provinsi'),
            'nama_kabupaten' => $this->input->post('nama_kabupaten')
        ];

        $this->kabupaten_model->update_data($id, $data);

        redirect('index.php/administrator/kabupaten');
    }

    // ================= HAPUS =================
    public function hapus($id)
    {
        $this->kabupaten_model->hapus_data($id);

        redirect('index.php/administrator/kabupaten');
    }

    // ================= AJAX =================
    public function get_kabupaten()
    {
        $id_provinsi = $this->input->post('id_provinsi');

        $data = $this->kabupaten_model->get_by_provinsi($id_provinsi);

        echo json_encode($data);
    }
}