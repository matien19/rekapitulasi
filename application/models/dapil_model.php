<?php

class Dapil_model extends CI_Model {

    // ================= TAMPIL =================
    public function tampil_data()
    {
        $this->db->select('
            dapil.*,
            kabupaten.nama_kabupaten
        ');

        $this->db->from('dapil');

        $this->db->join(
            'kabupaten',
            'kabupaten.id_kabupaten = dapil.id_kabupaten'
        );

        return $this->db->get()->result();
    }

    // ================= INSERT =================
    public function insert_data($data)
    {
        return $this->db->insert('dapil', $data);
    }

    // ================= EDIT =================
    public function edit_data($id)
    {
        return $this->db->get_where('dapil', [
            'id_dapil' => $id
        ])->row();
    }

    // ================= UPDATE =================
    public function update_data($id, $data)
    {
        return $this->db
            ->where('id_dapil', $id)
            ->update('dapil', $data);
    }

    // ================= HAPUS =================
    public function hapus_data($id)
    {
        return $this->db
            ->where('id_dapil', $id)
            ->delete('dapil');
    }

    // ================= AJAX =================
    public function get_by_kabupaten($id_kabupaten)
    {
        return $this->db->get_where('dapil', [
            'id_kabupaten' => $id_kabupaten
        ])->result();
    }
}