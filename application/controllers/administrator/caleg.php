<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caleg extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('caleg_model');
        $this->load->model('dapil_model');
        $this->load->model('kabupaten_model');
    }

    // ================= TAMPIL =================
    public function index()
    {
        $data['caleg'] = $this->caleg_model->tampil_data();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/caleg', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= FORM INPUT =================
    public function input()
    {
        $data['kabupaten'] = $this->kabupaten_model->tampil_data();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/caleg_form', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= SIMPAN =================
    public function simpan()
    {
        $config['upload_path']   = FCPATH . 'uploads/caleg/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload');
        $this->upload->initialize($config);

        // upload foto
        if($this->upload->do_upload('foto'))
        {
            $upload = $this->upload->data();

            $foto = $upload['file_name'];
        }
        else
        {
            echo $this->upload->display_errors();
            die;
        }

        $data = [

            'id_dapil'   => $this->input->post('id_dapil'),
            'nama_caleg' => $this->input->post('nama_caleg'),
            'partai'     => $this->input->post('partai'),
            'kategori'   => $this->input->post('kategori'),
            'foto'       => $foto

        ];

        $this->caleg_model->insert_data($data);

        redirect('index.php/administrator/caleg');
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $data['caleg'] = $this->caleg_model->edit_data($id);

        $data['kabupaten'] = $this->kabupaten_model->tampil_data();

        $data['dapil'] = $this->dapil_model
            ->get_by_kabupaten($data['caleg']->id_kabupaten);

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/caleg_edit', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= UPDATE =================
    public function update()
    {
        $id = $this->input->post('id_caleg');

        $config['upload_path']   = FCPATH . 'uploads/caleg/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload');
        $this->upload->initialize($config);

        // upload foto baru
        if($this->upload->do_upload('foto'))
        {
            $upload = $this->upload->data();

            $foto = $upload['file_name'];

            $data = [

                'id_dapil'   => $this->input->post('id_dapil'),
                'nama_caleg' => $this->input->post('nama_caleg'),
                'partai'     => $this->input->post('partai'),
                'kategori'   => $this->input->post('kategori'),
                'foto'       => $foto

            ];
        }
        else
        {
            $data = [

                'id_dapil'   => $this->input->post('id_dapil'),
                'nama_caleg' => $this->input->post('nama_caleg'),
                'partai'     => $this->input->post('partai'),
                'kategori'   => $this->input->post('kategori')

            ];
        }

        $this->caleg_model->update_data($id, $data);

        redirect('index.php/administrator/caleg');
    }

    // ================= HAPUS =================
    public function hapus($id)
    {
        $this->caleg_model->hapus_data($id);

        redirect('index.php/administrator/caleg');
    }

    // ================= AJAX DAPIL =================
    public function get_dapil()
    {
        $id_kabupaten = $this->input->post('id_kabupaten');

        $data = $this->dapil_model
            ->get_by_kabupaten($id_kabupaten);

        echo json_encode($data);
    }
}