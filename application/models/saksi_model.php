<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saksi_model extends CI_Model {

    // ================= TAMPIL SEMUA DATA =================
    public function tampil_data()
    {
        $this->db->select('
            saksi.*,
            provinsi.nama_provinsi,
            kabupaten.nama_kabupaten,
            kecamatan.nama_kecamatan,
            desa.nama_desa,
            tps.nama_tps
        ');

        $this->db->from('saksi');

        $this->db->join('provinsi', 'provinsi.id_provinsi = saksi.id_provinsi', 'left');
        $this->db->join('kabupaten', 'kabupaten.id_kabupaten = saksi.id_kabupaten', 'left');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = saksi.id_kecamatan', 'left');
        $this->db->join('desa', 'desa.id_desa = saksi.id_desa', 'left');
        $this->db->join('tps', 'tps.id_tps = saksi.id_tps', 'left');

        return $this->db->get()->result();
    }

    // ================= FILTER DATA =================
    public function filter_data($provinsi = null, $kabupaten = null, $kecamatan = null, $desa = null, $tps = null)
    {
        $this->db->select('
            saksi.*,
            provinsi.nama_provinsi,
            kabupaten.nama_kabupaten,
            kecamatan.nama_kecamatan,
            desa.nama_desa,
            tps.nama_tps
        ');

        $this->db->from('saksi');

        $this->db->join('provinsi', 'provinsi.id_provinsi = saksi.id_provinsi', 'left');
        $this->db->join('kabupaten', 'kabupaten.id_kabupaten = saksi.id_kabupaten', 'left');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = saksi.id_kecamatan', 'left');
        $this->db->join('desa', 'desa.id_desa = saksi.id_desa', 'left');
        $this->db->join('tps', 'tps.id_tps = saksi.id_tps', 'left');

        if (!empty($provinsi)) {
            $this->db->where('saksi.id_provinsi', $provinsi);
        }
        if (!empty($kabupaten)) {
            $this->db->where('saksi.id_kabupaten', $kabupaten);
        }
        if (!empty($kecamatan)) {
            $this->db->where('saksi.id_kecamatan', $kecamatan);
        }
        if (!empty($desa)) {
            $this->db->where('saksi.id_desa', $desa);
        }
        if (!empty($tps)) {
            $this->db->where('saksi.id_tps', $tps);
        }

        return $this->db->get()->result();
    }

    // ================= INSERT =================
    public function insert_data($data)
    {
        return $this->db->insert('saksi', $data);
    }

    // ================= EDIT =================
    public function edit_data($id)
    {
        return $this->db->get_where('saksi', [
            'id_saksi' => $id
        ])->row();
    }

    // ================= UPDATE =================
    public function update_data($id, $data)
    {
        return $this->db->where('id_saksi', $id)
                        ->update('saksi', $data);
    }

    // ================= DELETE =================
    public function hapus_data($id)
    {
        return $this->db->where('id_saksi', $id)
                        ->delete('saksi');
    }

    // ================= SAKSI PER TPS (UNTUK LOGIN SAKSI) =================
    public function get_by_tps($id_tps)
    {
        return $this->db->get_where('saksi', [
            'id_tps' => $id_tps
        ])->result();
    }

    // ================= LOGIN CHECK (OPSIONAL BISA DIPAKAI) =================
    public function cek_login($username, $password)
    {
        return $this->db->get_where('saksi', [
            'username' => $username,
            'password' => $password
        ]);
    }
    // ================= DATA SAKSI BERDASARKAN TPS LOGIN =================
public function get_saksi_by_tps($id_tps)
{
    $this->db->select('
        saksi.nama_saksi,
        saksi.nik,
        desa.nama_desa,
        tps.nama_tps
    ');

    $this->db->from('saksi');

    $this->db->join('desa', 'desa.id_desa = saksi.id_desa');
    $this->db->join('tps', 'tps.id_tps = saksi.id_tps');

    // filter sesuai TPS login
    $this->db->where('saksi.id_tps', $id_tps);

    return $this->db->get()->result();
}
// ================= DATA KORDES BERDASARKAN DESA =================
public function get_kordes_by_desa($id_desa)
{
    $this->db->select('
        users.nama,
        users.username,
        users.role,
        desa.nama_desa
    ');

    $this->db->from('users');

    $this->db->join('desa', 'desa.id_desa = users.id_desa');

    // hanya role kordes
    $this->db->where('users.role', 'kordinator_desa');

    // filter desa sesuai login
    $this->db->where('users.id_desa', $id_desa);

    return $this->db->get()->result();
}
}