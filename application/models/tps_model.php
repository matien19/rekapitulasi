<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tps_model extends CI_Model {

    // ================= TAMPIL DATA =================
    public function tampil_data()
    {
        $this->db->select('
            tps.id_tps,
            tps.nama_tps,

            desa.id_desa,
            desa.nama_desa,

            kecamatan.id_kecamatan,
            kecamatan.nama_kecamatan,

            kabupaten.id_kabupaten,
            kabupaten.nama_kabupaten,

            provinsi.id_provinsi,
            provinsi.nama_provinsi
        ');

        $this->db->from('tps');

        $this->db->join(
            'desa',
            'desa.id_desa = tps.id_desa'
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
        return $this->db->insert('tps', $data);
    }

    // ================= EDIT =================
    public function edit_data($id)
    {
        $this->db->select('
            tps.*,

            desa.id_kecamatan,

            kecamatan.id_kabupaten,

            kabupaten.id_provinsi
        ');

        $this->db->from('tps');

        $this->db->join(
            'desa',
            'desa.id_desa = tps.id_desa'
        );

        $this->db->join(
            'kecamatan',
            'kecamatan.id_kecamatan = desa.id_kecamatan'
        );

        $this->db->join(
            'kabupaten',
            'kabupaten.id_kabupaten = kecamatan.id_kabupaten'
        );

        $this->db->where('tps.id_tps', $id);

        return $this->db->get()->row();
    }

    // ================= UPDATE =================
    public function update_data($id, $data)
    {
        return $this->db
            ->where('id_tps', $id)
            ->update('tps', $data);
    }

    // ================= HAPUS =================
    public function hapus_data($id)
    {
        return $this->db
            ->where('id_tps', $id)
            ->delete('tps');
    }

    // ================= AJAX TPS =================
    public function get_by_desa($id_desa)
    {
        return $this->db
            ->get_where('tps', [
                'id_desa' => $id_desa
            ])
            ->result();
    }

}