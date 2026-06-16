<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caleg_model extends CI_Model {

    // ================= TAMPIL =================
    public function tampil_data()
    {
        $this->db->select('
            caleg.*,
            dapil.nama_dapil,
            kabupaten.nama_kabupaten
        ');

        $this->db->from('caleg');

        $this->db->join(
            'dapil',
            'dapil.id_dapil = caleg.id_dapil'
        );

        $this->db->join(
            'kabupaten',
            'kabupaten.id_kabupaten = dapil.id_kabupaten'
        );

        return $this->db->get()->result();
    }

    // ================= INSERT =================
    public function insert_data($data)
    {
        return $this->db->insert('caleg', $data);
    }

    // ================= EDIT =================
    public function edit_data($id)
    {
        $this->db->select('
            caleg.*,
            dapil.id_kabupaten
        ');

        $this->db->from('caleg');

        $this->db->join(
            'dapil',
            'dapil.id_dapil = caleg.id_dapil'
        );

        $this->db->where('caleg.id_caleg', $id);

        return $this->db->get()->row();
    }

    // ================= UPDATE =================
    public function update_data($id, $data)
    {
        return $this->db
            ->where('id_caleg', $id)
            ->update('caleg', $data);
    }

    // ================= HAPUS =================
    public function hapus_data($id)
    {
        return $this->db
            ->where('id_caleg', $id)
            ->delete('caleg');
    }
}