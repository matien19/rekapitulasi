<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kordes extends CI_Controller {

    public function __construct()
{
    parent::__construct();

    $this->load->model('Suara_model');
    $this->load->library('session');
    $this->load->database();

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
    if ($this->session->userdata('role') != 'kordinator_desa')
    {
        $this->session->sess_destroy();
        redirect('index.php/administrator/auth');
    }
}

    // ================= DASHBOARD =================
    public function index()
    {
        $data['title'] = 'Dashboard Kordes';
        $data['nama']  = $this->session->userdata('nama');

        $this->load->view('templates_kordes/header', $data);
        $this->load->view('templates_kordes/sidebar', $data);
        $this->load->view('kordes/dashboard', $data);
        $this->load->view('templates_kordes/footer', $data);
    }

   // ================= PILIH TPS =================
public function pilih_tps()
{
    $id_desa = $this->session->userdata('id_desa');

    $tps = $this->db
        ->select('
            tps.*,
            desa.nama_desa
        ')
        ->from('tps')
        ->join('desa', 'desa.id_desa = tps.id_desa')
        ->where('tps.id_desa', $id_desa)
        ->order_by('tps.nama_tps', 'ASC')
        ->get()
        ->result();

    foreach($tps as $t){

        // ================= CEK ADA SAKSI =================
        $cek_saksi = $this->db
            ->where('id_tps', $t->id_tps)
            ->get('saksi')
            ->row();

        // ================= CEK SUARA =================
        $kategori = $this->db
            ->select('kategori')
            ->from('suara')
            ->where('id_tps', $t->id_tps)
            ->group_by('kategori')
            ->get()
            ->result();

        $jumlah_kategori = count($kategori);

        // ================= BELUM ADA SAKSI =================
        if(!$cek_saksi){

            $t->status_input = 'belum_ada_saksi';

        }

        // ================= ADA SAKSI TAPI BELUM INPUT =================
        elseif($cek_saksi && $jumlah_kategori == 0){

            $t->status_input = 'saksi_belum_input';

        }

        // ================= SUDAH LENGKAP =================
        elseif($jumlah_kategori >= 3){

            $t->status_input = 'selesai';

        }

        // ================= MASIH PROSES =================
        else{

            $t->status_input = 'proses';
        }
    }

    $data['tps'] = $tps;
    $data['title'] = 'Pilih TPS';

    $this->load->view('templates_kordes/header', $data);
    $this->load->view('templates_kordes/sidebar', $data);
    $this->load->view('kordes/pilih_tps', $data);
    $this->load->view('templates_kordes/footer', $data);
}
    // ================= PILIH KATEGORI =================
    public function pilih_kategori($id_tps = null)
    {
        if(!$id_tps){

            redirect('index.php/kordes/pilih_tps');
        }

        // ================= CEK ADA SAKSI =================
       $cek_saksi = $this->db
       ->where('id_tps', $id_tps)
       ->get('saksi')
       ->row();

        if($cek_saksi){

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger">
                    TPS ini sudah memiliki akun saksi
                </div>'
            );

            redirect('index.php/kordes/pilih_tps');
            return;
        }

        // ================= KATEGORI SUDAH INPUT =================
        $input = $this->db
            ->select('kategori')
            ->from('suara')
            ->where('id_tps', $id_tps)
            ->group_by('kategori')
            ->get()
            ->result();

        $sudah_input = [];

        foreach($input as $i){

            $sudah_input[] = $i->kategori;
        }

        $data['id_tps']      = $id_tps;
        $data['sudah_input'] = $sudah_input;
        $data['title']       = 'Pilih Kategori';

        $this->load->view('templates_kordes/header', $data);
        $this->load->view('templates_kordes/sidebar', $data);
        $this->load->view('kordes/pilih_kategori', $data);
        $this->load->view('templates_kordes/footer', $data);
    }

    // ================= INPUT SUARA =================
    public function input_suara($id_tps = null, $kategori = null)
    {
        if(!$id_tps || !$kategori){

            redirect('index.php/kordes/pilih_tps');
        }

        // SLUG
        if($kategori == 'dpr-ri'){

            $kategori_db = 'DPR RI';

        } elseif($kategori == 'dprd-provinsi'){

            $kategori_db = 'DPRD PROVINSI';

        } elseif($kategori == 'dprd-kabupaten'){

            $kategori_db = 'DPRD KABUPATEN';

        } else {

            show_404();
        }

        $id_desa = $this->session->userdata('id_desa');

        // TPS
        $tps = $this->db
            ->select('
                tps.*,
                desa.id_dapil
            ')
            ->from('tps')
            ->join('desa', 'desa.id_desa = tps.id_desa')
            ->where('tps.id_tps', $id_tps)
            ->where('tps.id_desa', $id_desa)
            ->get()
            ->row();

        if(!$tps){

            show_404();
        }

        $id_dapil = $tps->id_dapil;

        // CEK SUDAH INPUT
        $cek = $this->db
            ->where('id_tps', $id_tps)
            ->where('kategori', $kategori_db)
            ->get('suara')
            ->row();

        if($cek){

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger">
                    Kategori sudah diinput
                </div>'
            );

            redirect('index.php/kordes/pilih_kategori/'.$id_tps);
            return;
        }

        // DPR RI
        if($kategori_db == 'DPR RI'){

            $data['caleg'] = $this->db
                ->where('kategori', 'DPR RI')
                ->order_by('id_caleg', 'ASC')
                ->get('caleg')
                ->result();
        }

        // DPRD PROVINSI
        elseif($kategori_db == 'DPRD PROVINSI'){

            $data['caleg'] = $this->db
                ->where('kategori', 'DPRD PROVINSI')
                ->order_by('id_caleg', 'ASC')
                ->get('caleg')
                ->result();
        }

        // DPRD KABUPATEN
        else {

            $data['caleg'] = $this->db
                ->where('kategori', 'DPRD KABUPATEN')
                ->where('id_dapil', $id_dapil)
                ->order_by('id_caleg', 'ASC')
                ->get('caleg')
                ->result();
        }

        $data['tps']      = $tps;
        $data['id_tps']   = $id_tps;
        $data['id_dapil'] = $id_dapil;
        $data['kategori'] = $kategori_db;
        $data['title']    = 'Input Suara';

        $this->load->view('templates_kordes/header', $data);
        $this->load->view('templates_kordes/sidebar', $data);
        $this->load->view('kordes/input_suara', $data);
        $this->load->view('templates_kordes/footer', $data);
    }

   // ================= SIMPAN =================
public function simpan()
{
    $id_tps   = $this->input->post('id_tps');
    $id_dapil = $this->input->post('id_dapil');
    $kategori = $this->input->post('kategori');

    $id_caleg = $this->input->post('id_caleg');
    $jumlah   = $this->input->post('jumlah_suara');

    // ================= CEK SUDAH INPUT =================
    $cek = $this->db
        ->where('id_tps', $id_tps)
        ->where('kategori', $kategori)
        ->get('suara')
        ->row();

    if($cek)
    {
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger">
                Kategori sudah diinput
            </div>'
        );

        redirect('index.php/kordes/pilih_kategori/'.$id_tps);
        return;
    }

    // ================= UPLOAD FOTO =================
    $foto = '';

    if(!empty($_FILES['foto']['name']))
    {
        $config['upload_path']   = './uploads/suara/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['encrypt_name']  = TRUE;
        $config['max_size']      = 5000;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if($this->upload->do_upload('foto'))
        {
            $upload = $this->upload->data();
            $foto   = $upload['file_name'];
        }
        else
        {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger">'
                .$this->upload->display_errors().
                '</div>'
            );

            redirect('index.php/kordes/pilih_kategori/'.$id_tps);
            return;
        }
    }

    // ================= DATA SUARA =================
    $data = [];

    foreach($id_caleg as $i => $c)
    {
        $data[] = [

            'id_tps'       => $id_tps,
            'id_dapil'     => $id_dapil,
            'id_caleg'     => $c,
            'kategori'     => $kategori,
            'jumlah_suara' => $jumlah[$i],
            'foto'         => $foto

        ];
    }

    // ================= INSERT =================
    $this->Suara_model->insert_batch($data);

    $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success">
            Data suara berhasil disimpan
        </div>'
    );

    redirect('index.php/kordes/pilih_kategori/'.$id_tps);
}

    // ================= LOGOUT =================
    public function logout()
    {
        $this->session->sess_destroy();

        redirect('index.php/administrator/auth');
    }
   // ================= LIST DATA KORDES =================
public function data_suara()
{
    $data['title'] = 'Data Kordes';

    $this->load->model('Saksi_model');

    // ambil desa login
    $id_desa = $this->session->userdata('id_desa');

    // data kordes
    $data['kordes'] = $this->Saksi_model->get_kordes_by_desa($id_desa);

    // load template kordes
    $this->load->view('templates_kordes/header', $data);
    $this->load->view('templates_kordes/sidebar', $data);

    // VIEW KHUSUS KORDES
    $this->load->view('kordes/data_suara', $data);

    $this->load->view('templates_kordes/footer');
}
// ================= HASIL SUARA SAKSI =================
public function hasil_suara_saksi()
{
    $id_desa = $this->session->userdata('id_desa');

    $data['hasil'] = $this->db
        ->select('
            suara.*,
            caleg.nama_caleg,
            caleg.partai,
            tps.nama_tps
        ')
        ->from('suara')
        ->join('caleg', 'caleg.id_caleg = suara.id_caleg')
        ->join('tps', 'tps.id_tps = suara.id_tps')
        ->where('tps.id_desa', $id_desa)
        ->order_by('tps.nama_tps', 'ASC')
        ->get()
        ->result();

    $data['title'] = 'Hasil Input Saksi';

    $this->load->view('templates_kordes/header', $data);
    $this->load->view('templates_kordes/sidebar', $data);
    $this->load->view('kordes/hasil_suara_saksi', $data);
    $this->load->view('templates_kordes/footer');
}
// ================= EDIT SUARA =================
public function edit_suara($id)
{
    $id_desa = $this->session->userdata('id_desa');

    $data['suara'] = $this->db
        ->select('
            suara.*,
            caleg.nama_caleg,
            caleg.partai,
            tps.nama_tps
        ')
        ->from('suara')
        ->join('caleg', 'caleg.id_caleg = suara.id_caleg')
        ->join('tps', 'tps.id_tps = suara.id_tps')
        ->where('suara.id_suara', $id)
        ->where('tps.id_desa', $id_desa)
        ->get()
        ->row();

    if (!$data['suara']) {
        show_404();
    }

    $data['title'] = 'Edit Suara';

    $this->load->view('templates_kordes/header', $data);
    $this->load->view('templates_kordes/sidebar', $data);
    $this->load->view('kordes/edit_suara', $data);
    $this->load->view('templates_kordes/footer');
}
// ================= UPDATE SUARA =================
public function update_suara()
{
    $id_suara = $this->input->post('id_suara');

    $suara = $this->db
        ->get_where('suara', ['id_suara' => $id_suara])
        ->row();

    $data = [
        'jumlah_suara' => $this->input->post('jumlah_suara')
    ];

    // Upload foto baru jika ada
    if (!empty($_FILES['foto']['name'])) {

        $config['upload_path']   = './uploads/suara/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;
        $config['file_name']     = time();

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {

            // Hapus foto lama
            if (!empty($suara->foto) && file_exists('./uploads/suara/'.$suara->foto)) {
                unlink('./uploads/suara/'.$suara->foto);
            }

            $upload = $this->upload->data();

            $data['foto'] = $upload['file_name'];
        }
    }

    $this->db->where('id_suara', $id_suara);
    $this->db->update('suara', $data);

    $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success">
            Data suara berhasil diperbarui
        </div>'
    );

    redirect('index.php/kordes/hasil_suara_saksi');
}
}