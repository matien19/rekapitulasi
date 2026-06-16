<?php

class Desa_model extends CI_Model {

    // ================= TAMPIL =================
    public function tampil_data()
    {
        $this->db->select('
            desa.*,
            dapil.nama_dapil,
            kecamatan.nama_kecamatan,
            kabupaten.nama_kabupaten,
            provinsi.nama_provinsi
        ');

        $this->db->from('desa');

        $this->db->join(
            'dapil',
            'dapil.id_dapil = desa.id_dapil',
            'left'
        );

        $this->db->join(
            'kecamatan',
            'kecamatan.id_kecamatan = desa.id_kecamatan'
        );

        $this->db->join(
            'kabupaten',
            'kabupaten.id_kabupaten = kecamatan.id_kabupaten'
        );

        $this->db->join(
            'provinsi',
            'provinsi.id_provinsi = kabupaten.id_provinsi'
        );

        return $this->db->get()->result();
    }

    // ================= INSERT =================
    public function insert_data($data)
    {
        return $this->db->insert('desa', $data);
    }

    // ================= EDIT =================
    public function edit_data($id)
    {
        $this->db->select('
            desa.*,
            kecamatan.id_kabupaten,
            kabupaten.id_provinsi
        ');

        $this->db->from('desa');

        $this->db->join(
            'kecamatan',
            'kecamatan.id_kecamatan = desa.id_kecamatan'
        );

        $this->db->join(
            'kabupaten',
            'kabupaten.id_kabupaten = kecamatan.id_kabupaten'
        );

        $this->db->where('desa.id_desa', $id);

        return $this->db->get()->row();
    }

    // ================= UPDATE =================
    public function update_data($id, $data)
    {
        return $this->db
            ->where('id_desa', $id)
            ->update('desa', $data);
    }

    // ================= HAPUS =================
    public function hapus_data($id)
    {
        return $this->db
            ->where('id_desa', $id)
            ->delete('desa');
    }

    // ================= AJAX =================
    public function get_by_kecamatan($id_kecamatan)
    {
        return $this->db
            ->where('id_kecamatan', $id_kecamatan)
            ->get('desa')
            ->result();
    }
}