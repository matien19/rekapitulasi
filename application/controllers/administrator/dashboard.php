<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

   public function __construct()
{
    parent::__construct();

    $this->load->database();
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

    // ================= ROLE ADMIN =================
    if ($this->session->userdata('role') != 'admin')
    {
        $this->session->sess_destroy();
        redirect('index.php/administrator/auth');
    }
}
    public function index()
    {
        // ================= TOTAL TPS =================
        $data['total_tps'] = $this->db->count_all('tps');

        // ================= TOTAL SAKSI =================
        $data['total_saksi'] = $this->db->count_all('saksi');

        // ================= TOTAL SUARA =================
        $suara = $this->db
            ->select_sum('jumlah_suara')
            ->get('suara')
            ->row();

        $data['total_suara'] = $suara->jumlah_suara ? $suara->jumlah_suara : 0;

        // =====================================================
        // TOTAL SUARA PER KATEGORI
        // =====================================================

        // DPR RI
        $dprri = $this->db
            ->select_sum('suara.jumlah_suara', 'total')
            ->from('suara')
            ->join('caleg', 'caleg.id_caleg = suara.id_caleg')
            ->where('caleg.kategori', 'DPR RI')
            ->get()
            ->row();

        $data['total_dpr_ri'] = $dprri->total ? $dprri->total : 0;

        // DPRD PROVINSI
        $provinsi = $this->db
            ->select_sum('suara.jumlah_suara', 'total')
            ->from('suara')
            ->join('caleg', 'caleg.id_caleg = suara.id_caleg')
            ->where('caleg.kategori', 'DPRD PROVINSI')
            ->get()
            ->row();

        $data['total_dprd_provinsi'] = $provinsi->total ? $provinsi->total : 0;

        // DPRD KABUPATEN
        $kabupaten = $this->db
            ->select_sum('suara.jumlah_suara', 'total')
            ->from('suara')
            ->join('caleg', 'caleg.id_caleg = suara.id_caleg')
            ->where('caleg.kategori', 'DPRD KABUPATEN')
            ->get()
            ->row();

        $data['total_dprd_kabupaten'] = $kabupaten->total ? $kabupaten->total : 0;

        // =====================================================
        // GRAFIK DPR RI
        // =====================================================

        $dpr_ri = $this->db
            ->select('
                caleg.nama_caleg,
                SUM(suara.jumlah_suara) as total_suara
            ')
            ->from('suara')
            ->join('caleg', 'caleg.id_caleg = suara.id_caleg')
            ->where('caleg.kategori', 'DPR RI')
            ->group_by('caleg.id_caleg')
            ->get()
            ->result_array();

        // ================= O(n log n) =================
        usort($dpr_ri, function($a, $b){

            return $b['total_suara'] <=> $a['total_suara'];
        });

        $data['dpr_ri'] = $dpr_ri;

        // =====================================================
        // GRAFIK DPRD PROVINSI
        // =====================================================

        $dprd_provinsi = $this->db
            ->select('
                caleg.nama_caleg,
                SUM(suara.jumlah_suara) as total_suara
            ')
            ->from('suara')
            ->join('caleg', 'caleg.id_caleg = suara.id_caleg')
            ->where('caleg.kategori', 'DPRD PROVINSI')
            ->group_by('caleg.id_caleg')
            ->get()
            ->result_array();

        // ================= O(n log n) =================
        usort($dprd_provinsi, function($a, $b){

            return $b['total_suara'] <=> $a['total_suara'];
        });

        $data['dprd_provinsi'] = $dprd_provinsi;

      // ================= GRAFIK DPRD KABUPATEN =================
$dprd_kabupaten_db = $this->db
    ->select('
        IFNULL(dapil.nama_dapil, "Tanpa Dapil") as nama_dapil,
        caleg.nama_caleg,
        SUM(suara.jumlah_suara) as total_suara
    ')
    ->from('suara')
    ->join('caleg', 'caleg.id_caleg = suara.id_caleg')
    ->join('dapil', 'dapil.id_dapil = caleg.id_dapil', 'left')
    ->where('caleg.kategori', 'DPRD KABUPATEN')
    ->group_by('caleg.id_caleg')
    ->get()
    ->result_array();


// ================= GROUP PER DAPIL =================
$dprd_kabupaten = [];

foreach($dprd_kabupaten_db as $d){

    $dapil = $d['nama_dapil'];

    $dprd_kabupaten[$dapil][] = [

        'nama_caleg'  => $d['nama_caleg'],
        'total_suara' => $d['total_suara']

    ];
}


// ================= SORT O(n log n) =================
foreach($dprd_kabupaten as $dapil => $caleg){

    usort($caleg, function($a, $b){

        return $b['total_suara'] - $a['total_suara'];

    });

    $dprd_kabupaten[$dapil] = $caleg;
}

$data['dprd_kabupaten'] = $dprd_kabupaten;

        // =====================================================
        // LOAD VIEW
        // =====================================================

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/dashboard', $data);
        $this->load->view('templates_administrator/footer');
    }
}