<?php

class Tps extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('tps_model');
        $this->load->model('desa_model');
        $this->load->model('kecamatan_model');
        $this->load->model('kabupaten_model');
        $this->load->model('provinsi_model');
    }

    // ================= TAMPIL =================
    public function index()
    {
        $data['tps'] = $this->tps_model->tampil_data();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/tps', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= INPUT =================
    public function input()
    {
        $data['provinsi'] = $this->provinsi_model->tampil_data();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/tps_form', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= SIMPAN =================
    public function simpan()
    {
        $data = [
            'nama_tps' => $this->input->post('nama_tps'),
            'id_desa'  => $this->input->post('id_desa')
        ];

        $this->tps_model->insert_data($data);

        redirect('index.php/administrator/tps');
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $data['tps'] = $this->tps_model->edit_data($id);

        $data['provinsi'] = $this->provinsi_model->tampil_data();

        $data['kabupaten'] = $this->kabupaten_model
            ->get_by_provinsi($data['tps']->id_provinsi);

        $data['kecamatan'] = $this->kecamatan_model
            ->get_by_kabupaten($data['tps']->id_kabupaten);

        $data['desa'] = $this->desa_model
            ->get_by_kecamatan($data['tps']->id_kecamatan);

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/tps_edit', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= UPDATE =================
    public function update()
    {
        $id = $this->input->post('id_tps');

        $data = [
            'nama_tps' => $this->input->post('nama_tps'),
            'id_desa'  => $this->input->post('id_desa')
        ];

        $this->tps_model->update_data($id, $data);

        redirect('index.php/administrator/tps');
    }

    // ================= HAPUS =================
    public function hapus($id)
    {
        $this->tps_model->hapus_data($id);

        redirect('index.php/administrator/tps');
    }

    // ================= AJAX =================
    public function get_kabupaten()
    {
        $id_provinsi = $this->input->post('id_provinsi');

        echo json_encode(
            $this->kabupaten_model->get_by_provinsi($id_provinsi)
        );
    }

    public function get_kecamatan()
    {
        $id_kabupaten = $this->input->post('id_kabupaten');

        echo json_encode(
            $this->kecamatan_model->get_by_kabupaten($id_kabupaten)
        );
    }

    public function get_desa()
    {
        $id_kecamatan = $this->input->post('id_kecamatan');

        echo json_encode(
            $this->desa_model->get_by_kecamatan($id_kecamatan)
        );
    }
}