<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Suara_model');
        $this->load->model('Saksi_model'); 
        $this->load->library('session');

       // ================= ANTI CACHE =================
    $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    $this->output->set_header("Cache-Control: post-check=0, pre-check=0", FALSE);
    $this->output->set_header("Pragma: no-cache");
    $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

    // ================= LOGIN =================
    if (!$this->session->userdata('logged_in'))
    {
        redirect('index.php/administrator/auth');
    }

    // ================= ROLE =================
    if ($this->session->userdata('role') != 'saksi')
    {
        $this->session->sess_destroy();
        redirect('index.php/administrator/auth');
    }
    }

    // ================= DASHBOARD =================
    public function index()
    {
        $data['title'] = 'Dashboard Saksi';
        $data['nama']  = $this->session->userdata('nama');

        $this->load->view('templates_saksi/header', $data);
        $this->load->view('templates_saksi/sidebar', $data);
        $this->load->view('saksi/dashboard', $data);
        $this->load->view('templates_saksi/footer', $data);
    }

    // ================= PILIH KATEGORI =================
    public function pilih_kategori()
    {
        $id_tps = $this->session->userdata('id_tps');

        // AMBIL KATEGORI YANG SUDAH INPUT
        $input = $this->db
            ->select('caleg.kategori')
            ->from('suara')
            ->join('caleg', 'caleg.id_caleg = suara.id_caleg')
            ->where('suara.id_tps', $id_tps)
            ->group_by('caleg.kategori')
            ->get()
            ->result();

        $sudah_input = [];

        foreach($input as $i){

            $sudah_input[] = $i->kategori;
        }

        $data['sudah_input'] = $sudah_input;

        $data['title'] = 'Pilih Kategori';

        $this->load->view('templates_saksi/header', $data);
        $this->load->view('templates_saksi/sidebar', $data);
        $this->load->view('saksi/pilih_kategori', $data);
        $this->load->view('templates_saksi/footer', $data);
    }

    // ================= INPUT SUARA =================
    public function input_suara($kategori = null)
    {
        if(!$kategori){

            redirect('index.php/saksi/pilih_kategori');
        }

        // ================= SLUG URL =================
        if($kategori == 'dpr-ri'){

            $kategori_db = 'DPR RI';

        } elseif($kategori == 'dprd-provinsi'){

            $kategori_db = 'DPRD PROVINSI';

        } elseif($kategori == 'dprd-kabupaten'){

            $kategori_db = 'DPRD KABUPATEN';

        } else {

            show_404();
        }

        $id_tps = $this->session->userdata('id_tps');

        // ================= AMBIL TPS =================
        $tps = $this->db
            ->select('
                tps.*,
                desa.id_dapil
            ')
            ->from('tps')
            ->join('desa', 'desa.id_desa = tps.id_desa')
            ->where('tps.id_tps', $id_tps)
            ->get()
            ->row();

        if(!$tps){

            show_404();
        }

        $id_dapil = $tps->id_dapil;

        // ================= CEK SUDAH INPUT =================
        $cek = $this->db
            ->select('suara.id_suara')
            ->from('suara')
            ->join('caleg', 'caleg.id_caleg = suara.id_caleg')
            ->where('suara.id_tps', $id_tps)
            ->where('caleg.kategori', $kategori_db)
            ->get()
            ->row();

        if($cek){

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger">
                    Kategori sudah diinput
                </div>'
            );

            redirect('index.php/saksi/pilih_kategori');
        }

        // ================= AMBIL CALEG =================

        // DPR RI
        if($kategori_db == 'DPR RI'){

            $data['caleg'] = $this->db
                ->where('kategori', 'DPR RI')
                ->order_by('id_caleg', 'ASC')
                ->get('caleg')
                ->result();
        }

        // DPR PROVINSI
        elseif($kategori_db == 'DPRD PROVINSI'){

            $data['caleg'] = $this->db
                ->where('kategori', 'DPRD PROVINSI')
                ->order_by('id_caleg', 'ASC')
                ->get('caleg')
                ->result();
        }

        // DPRD KABUPATEN BERDASARKAN DAPIL
        elseif($kategori_db == 'DPRD KABUPATEN'){

            $data['caleg'] = $this->db
                ->where('kategori', 'DPRD KABUPATEN')
                ->where('id_dapil', $id_dapil)
                ->order_by('id_caleg', 'ASC')
                ->get('caleg')
                ->result();
        }

        $data['kategori'] = $kategori_db;
        $data['title']    = 'Input Suara';

        $this->load->view('templates_saksi/header', $data);
        $this->load->view('templates_saksi/sidebar', $data);
        $this->load->view('saksi/input_suara', $data);
        $this->load->view('templates_saksi/footer', $data);
    }

    // ================= SIMPAN =================
public function simpan()
{
    $id_tps   = $this->session->userdata('id_tps');
    $kategori = $this->input->post('kategori');

    // ================= AMBIL DAPIL =================
    $tps = $this->db
        ->select('desa.id_dapil')
        ->from('tps')
        ->join('desa', 'desa.id_desa = tps.id_desa')
        ->where('tps.id_tps', $id_tps)
        ->get()
        ->row();

    $id_dapil = $tps->id_dapil;

    $id_caleg = $this->input->post('id_caleg');
    $jumlah   = $this->input->post('jumlah_suara');

    // ================= CEK SUDAH INPUT =================
    $cek = $this->db
        ->select('suara.id_suara')
        ->from('suara')
        ->join('caleg', 'caleg.id_caleg = suara.id_caleg')
        ->where('suara.id_tps', $id_tps)
        ->where('caleg.kategori', $kategori)
        ->get()
        ->row();

    if($cek)
    {
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger">
                Kategori sudah diinput
            </div>'
        );

        redirect('index.php/saksi/pilih_kategori');
    }

    // ================= UPLOAD FOTO =================
    $foto = '';

    if(!empty($_FILES['foto']['name']))
    {
        $config['upload_path']   = './uploads/suara/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['encrypt_name']  = TRUE;
        $config['max_size']      = 4096;

        $this->load->library('upload', $config);

        if($this->upload->do_upload('foto'))
        {
            $upload = $this->upload->data();
            $foto   = $upload['file_name'];
        }
        else
        {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger">'.
                $this->upload->display_errors().
                '</div>'
            );

            redirect('index.php/saksi/input_suara');
        }
    }

    // ================= SIMPAN SUARA =================
    $data = [];

    foreach($id_caleg as $i => $c)
    {
        log_message('debug', "ID Caleg: $c, Jumlah Suara: [$i]");
        $data[] = [

            'id_tps'       => $id_tps,
            'id_dapil'     => $id_dapil,
            'id_caleg'     => $c,
            'kategori'     => $kategori,
            'jumlah_suara' => $jumlah[$i],
            'foto'         => $foto

        ];
    }

    $this->Suara_model->insert_batch($data);

    $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success">
            Data suara berhasil disimpan
        </div>'
    );

    redirect('index.php/saksi/pilih_kategori');
}

    // ================= LOGOUT =================
    public function logout()
    {
        $this->session->sess_destroy();

        redirect('index.php/administrator/auth');
    }
 // ================= LIST DATA SAKSI =================
public function data_suara()
{
    $data['title'] = 'Data Saksi';

    $this->load->model('Saksi_model');

    // ambil id_tps dari session login
    $id_tps = $this->session->userdata('id_tps');

    // kirim ke model
    $data['saksi'] = $this->Saksi_model->get_saksi_by_tps($id_tps);

    // load view
    $this->load->view('templates_saksi/header', $data);
    $this->load->view('templates_saksi/sidebar', $data);
    $this->load->view('saksi/data_suara', $data);
    $this->load->view('templates_saksi/footer');
}
// ================= HASIL SUARA TPS =================
public function hasil_suara()
{
    $id_tps = $this->session->userdata('id_tps');

    $data['hasil'] = $this->db
        ->select('
            suara.*,
            suara.foto AS foto_bukti,
            caleg.nama_caleg,
            caleg.partai,
            caleg.foto AS foto_caleg
        ')
        ->from('suara')
        ->join('caleg', 'caleg.id_caleg = suara.id_caleg')
        ->where('suara.id_tps', $id_tps)
        ->order_by('suara.id_suara', 'ASC')
        ->get()
        ->result();

    $data['title'] = 'Hasil Suara';

    $this->load->view('templates_saksi/header', $data);
    $this->load->view('templates_saksi/sidebar', $data);
    $this->load->view('saksi/hasil_suara', $data);
    $this->load->view('templates_saksi/footer');
}
// ================= EDIT SUARA =================
public function edit_suara($id)
{
    $id_tps = $this->session->userdata('id_tps');

    $data['suara'] = $this->db
        ->select('
            suara.*,
            caleg.nama_caleg,
            caleg.partai
        ')
        ->from('suara')
        ->join('caleg','caleg.id_caleg=suara.id_caleg')
        ->where('suara.id_suara', $id)
        ->where('suara.id_tps', $id_tps)
        ->get()
        ->row();

    if(!$data['suara']){
        show_404();
    }

    $this->load->view('templates_saksi/header');
    $this->load->view('templates_saksi/sidebar');
    $this->load->view('saksi/edit_suara', $data);
    $this->load->view('templates_saksi/footer');
}
// ================= UPDATE SUARA =================
public function update_suara()
{
    $id = $this->input->post('id_suara');

    // Ambil data lama
    $suara = $this->db
        ->get_where('suara', ['id_suara' => $id])
        ->row();

    $data = [
        'jumlah_suara' => $this->input->post('jumlah_suara')
    ];

    // Jika upload foto baru
    if (!empty($_FILES['foto']['name']))
    {
        $config['upload_path']   = './uploads/suara/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;
        $config['file_name']     = time();

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto'))
        {
            // Hapus foto lama
            if (!empty($suara->foto) &&
                file_exists('./uploads/suara/'.$suara->foto))
            {
                unlink('./uploads/suara/'.$suara->foto);
            }

            $upload = $this->upload->data();

            $data['foto'] = $upload['file_name'];
        }
    }

    $this->db->where('id_suara', $id);
    $this->db->update('suara', $data);

    $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success">
            Data suara berhasil diupdate
        </div>'
    );

    redirect('index.php/saksi/hasil_suara');
}
}