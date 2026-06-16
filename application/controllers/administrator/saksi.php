<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('saksi_model');
        $this->load->model('provinsi_model');
        $this->load->model('kabupaten_model');
        $this->load->model('kecamatan_model');
        $this->load->model('desa_model');
        $this->load->model('tps_model');

    }

    // ================= INDEX =================
    public function index()
    {
        $data['saksi'] = $this->saksi_model->tampil_data();
        $data['provinsi'] = $this->provinsi_model->tampil_data();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/saksi', $data);
        $this->load->view('templates_administrator/footer');
    }

    // ================= INPUT =================
    public function input()
    {
        $data['provinsi'] = $this->provinsi_model->tampil_data();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/saksi_form', $data);
        $this->load->view('templates_administrator/footer');
    }

  // ================= SIMPAN (NO MD5) =================
public function simpan()
{
    $nama_saksi = trim($this->input->post('nama_saksi'));
    $nik        = trim($this->input->post('nik'));
    $no_hp      = trim($this->input->post('no_hp'));
    $username   = trim($this->input->post('username'));

    // ================= VALIDASI NAMA =================
    if (empty($nama_saksi))
    {
        echo "<script>
                alert('Nama saksi wajib diisi');
                window.history.back();
              </script>";
        return;
    }

    // ================= CEK NAMA DUPLIKAT =================
    $cek_nama = $this->db->get_where('saksi', [
        'nama_saksi' => $nama_saksi
    ])->row();

    if ($cek_nama)
    {
        echo "<script>
                alert('Nama saksi sudah pernah terdaftar');
                window.history.back();
              </script>";
        return;
    }

    // ================= CEK TPS =================
    $cek_tps = $this->db->get_where('saksi', [
        'id_tps' => $this->input->post('id_tps')
    ])->row();

    if ($cek_tps)
    {
        echo "<script>
                alert('TPS sudah memiliki saksi');
                window.history.back();
              </script>";
        return;
    }

    // ================= CEK USERNAME =================
    $cek_username = $this->db->get_where('saksi', [
        'username' => $username
    ])->row();

    if ($cek_username)
    {
        echo "<script>
                alert('Username sudah digunakan');
                window.history.back();
              </script>";
        return;
    }

    // ================= CEK NIK DUPLIKAT =================
    $cek_nik = $this->db->get_where('saksi', [
        'nik' => $nik
    ])->row();

    if ($cek_nik)
    {
        echo "<script>
                alert('NIK sudah pernah terdaftar');
                window.history.back();
              </script>";
        return;
    }

    // ================= VALIDASI NIK =================
    if (!preg_match('/^[0-9]{16}$/', $nik))
    {
        echo "<script>
                alert('NIK yang dimasukkan tidak valid. NIK harus tepat 16 digit angka');
                window.history.back();
              </script>";
        return;
    }

    // ================= CEK NO HP DUPLIKAT =================
    $cek_hp = $this->db->get_where('saksi', [
        'no_hp' => $no_hp
    ])->row();

    if ($cek_hp)
    {
        echo "<script>
                alert('Nomor HP sudah pernah terdaftar');
                window.history.back();
              </script>";
        return;
    }

    // ================= VALIDASI NO HP =================
    if (!preg_match('/^[0-9]{11,14}$/', $no_hp))
    {
        echo "<script>
                alert('Nomor HP yang dimasukkan tidak valid. Nomor HP harus 11 sampai 14 digit angka');
                window.history.back();
              </script>";
        return;
    }

    $data = [
        'nama_saksi'   => $nama_saksi,
        'nik'          => $nik,
        'no_hp'        => $no_hp,
        'id_provinsi'  => $this->input->post('id_provinsi'),
        'id_kabupaten' => $this->input->post('id_kabupaten'),
        'id_kecamatan' => $this->input->post('id_kecamatan'),
        'id_desa'      => $this->input->post('id_desa'),
        'id_tps'       => $this->input->post('id_tps'),
        'username'     => $username,
        'password'     => $this->input->post('password')
    ];

    $this->saksi_model->insert_data($data);

    echo "<script>
            alert('Data saksi berhasil disimpan');
            window.location='" . site_url('index.php/administrator/saksi') . "';
          </script>";
}
   // ================= EDIT =================
public function edit($id)
{
    $where = ['id_saksi' => $id];

    // ambil data saksi
    $data['saksi'] = $this->db->get_where('saksi', $where)->row();

    if (!$data['saksi']) {
        show_404();
        return;
    }

    // data wilayah untuk dropdown
    $this->load->model('provinsi_model');
    $this->load->model('kabupaten_model');
    $this->load->model('kecamatan_model');
    $this->load->model('desa_model');
    $this->load->model('tps_model');

    $data['provinsi'] = $this->provinsi_model->tampil_data();

    // 🔥 TAMBAHAN: ambil data dropdown yang sudah terpilih (biar tidak kosong)
    $data['kabupaten'] = $this->kabupaten_model->get_by_provinsi($data['saksi']->id_provinsi);
    $data['kecamatan'] = $this->kecamatan_model->get_by_kabupaten($data['saksi']->id_kabupaten);
    $data['desa']      = $this->desa_model->get_by_kecamatan($data['saksi']->id_kecamatan);
    $data['tps']       = $this->tps_model->get_by_desa($data['saksi']->id_desa);

    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/saksi_edit', $data);
    $this->load->view('templates_administrator/footer');
}

  // ================= UPDATE =================
public function update()
{
    $id       = $this->input->post('id_saksi');
    $nik      = trim($this->input->post('nik'));
    $no_hp    = trim($this->input->post('no_hp'));
    $username = trim($this->input->post('username'));
    $id_tps   = $this->input->post('id_tps');

    // ================= VALIDASI NIK =================
    if (!preg_match('/^[0-9]{16}$/', $nik))
    {
        echo "<script>
                alert('NIK harus tepat 16 digit angka');
                window.history.back();
              </script>";
        return;
    }

    // ================= VALIDASI NO HP =================
    if (!preg_match('/^[0-9]{11,14}$/', $no_hp))
    {
        echo "<script>
                alert('Nomor HP harus 11 sampai 14 digit angka');
                window.history.back();
              </script>";
        return;
    }

    // ================= CEK NIK DUPLIKAT =================
    $cek_nik = $this->db
        ->where('nik', $nik)
        ->where('id_saksi !=', $id)
        ->get('saksi')
        ->row();

    if ($cek_nik)
    {
        echo "<script>
                alert('NIK sudah terdaftar');
                window.history.back();
              </script>";
        return;
    }

    // ================= CEK USERNAME DUPLIKAT =================
    $cek_username = $this->db
        ->where('username', $username)
        ->where('id_saksi !=', $id)
        ->get('saksi')
        ->row();

    if ($cek_username)
    {
        echo "<script>
                alert('Username sudah digunakan');
                window.history.back();
              </script>";
        return;
    }

    // ================= CEK TPS DUPLIKAT =================
    $cek_tps = $this->db
        ->where('id_tps', $id_tps)
        ->where('id_saksi !=', $id)
        ->get('saksi')
        ->row();

    if ($cek_tps)
    {
        echo "<script>
                alert('TPS sudah memiliki saksi');
                window.history.back();
              </script>";
        return;
    }

    // ================= AMBIL DATA LAMA (INI YANG KURANG) =================
    $data_lama = $this->db
        ->where('id_saksi', $id)
        ->get('saksi')
        ->row();

    // ================= PASSWORD LOGIC =================
    $password = $this->input->post('password');

    if ($password == '') {
        $password = $data_lama->password; // pakai password lama
    }

    $data = [
        'nama_saksi'   => $this->input->post('nama_saksi'),
        'nik'          => $nik,
        'no_hp'        => $no_hp,
        'id_provinsi'  => $this->input->post('id_provinsi') ?: $data_lama->id_provinsi,
        'id_kabupaten' => $this->input->post('id_kabupaten') ?: $data_lama->id_kabupaten,
        'id_kecamatan' => $this->input->post('id_kecamatan') ?: $data_lama->id_kecamatan,
        'id_desa'      => $this->input->post('id_desa') ?: $data_lama->id_desa,
        'id_tps'       => $id_tps,
        'username'     => $username,

        // 🔥 FIX: pakai password hasil logic
        'password'     => $password
    ];

    $this->saksi_model->update_data($id, $data);

    echo "<script>
            alert('Data saksi berhasil diperbarui');
            window.location='".site_url('index.php/administrator/saksi')."';
          </script>";
}
    // ================= HAPUS =================
    public function hapus($id)
    {
        $this->saksi_model->hapus_data($id);
        redirect('index.php/administrator/saksi');
    }

    // ================= AJAX KABUPATEN =================
    public function get_kabupaten()
    {
        echo json_encode(
            $this->kabupaten_model->get_by_provinsi(
                $this->input->post('id_provinsi')
            )
        );
    }

    // ================= AJAX KECAMATAN =================
    public function get_kecamatan()
    {
        echo json_encode(
            $this->kecamatan_model->get_by_kabupaten(
                $this->input->post('id_kabupaten')
            )
        );
    }

    // ================= AJAX DESA =================
    public function get_desa()
    {
        echo json_encode(
            $this->desa_model->get_by_kecamatan(
                $this->input->post('id_kecamatan')
            )
        );
    }

    // ================= AJAX TPS =================
    public function get_tps()
    {
        echo json_encode(
            $this->tps_model->get_by_desa(
                $this->input->post('id_desa')
            )
        );
    }

    // ================= FILTER SAKSI =================
    public function filter_saksi()
    {
        $id_provinsi  = $this->input->post('id_provinsi');
        $id_kabupaten = $this->input->post('id_kabupaten');
        $id_kecamatan = $this->input->post('id_kecamatan');
        $id_desa      = $this->input->post('id_desa');
        $id_tps       = $this->input->post('id_tps');

        $this->db->select('
            saksi.*,
            provinsi.nama_provinsi,
            kabupaten.nama_kabupaten,
            kecamatan.nama_kecamatan,
            desa.nama_desa,
            tps.nama_tps
        ');

        $this->db->from('saksi');

        $this->db->join('provinsi', 'provinsi.id_provinsi = saksi.id_provinsi');
        $this->db->join('kabupaten', 'kabupaten.id_kabupaten = saksi.id_kabupaten');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = saksi.id_kecamatan');
        $this->db->join('desa', 'desa.id_desa = saksi.id_desa');
        $this->db->join('tps', 'tps.id_tps = saksi.id_tps');

        if ($id_provinsi)  $this->db->where('saksi.id_provinsi', $id_provinsi);
        if ($id_kabupaten) $this->db->where('saksi.id_kabupaten', $id_kabupaten);
        if ($id_kecamatan) $this->db->where('saksi.id_kecamatan', $id_kecamatan);
        if ($id_desa)      $this->db->where('saksi.id_desa', $id_desa);
        if ($id_tps)       $this->db->where('saksi.id_tps', $id_tps);

        echo json_encode($this->db->get()->result());
    }
      // ================= EXSPOR DATA SAKSI =================
      public function export_csv()
{
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="data_saksi.csv"');

    $output = fopen('php://output', 'w');

    // Header kolom
    fputcsv($output, [
        'Nama Saksi',
        'NIK',
        'No HP',
        'Username',
        'Provinsi',
        'Kabupaten',
        'Kecamatan',
        'Desa',
        'TPS'
    ]);

    $data = $this->db
        ->select('
            saksi.*,
            provinsi.nama_provinsi,
            kabupaten.nama_kabupaten,
            kecamatan.nama_kecamatan,
            desa.nama_desa,
            tps.nama_tps
        ')
        ->from('saksi')
        ->join('provinsi','provinsi.id_provinsi=saksi.id_provinsi','left')
        ->join('kabupaten','kabupaten.id_kabupaten=saksi.id_kabupaten','left')
        ->join('kecamatan','kecamatan.id_kecamatan=saksi.id_kecamatan','left')
        ->join('desa','desa.id_desa=saksi.id_desa','left')
        ->join('tps','tps.id_tps=saksi.id_tps','left')
        ->get()
        ->result();

    foreach ($data as $row)
    {
        fputcsv($output, [
            $row->nama_saksi,
            $row->nik,
            $row->no_hp,
            $row->username,
            $row->nama_provinsi,
            $row->nama_kabupaten,
            $row->nama_kecamatan,
            $row->nama_desa,
            $row->nama_tps
        ]);
    }

    fclose($output);
    exit;
}
}