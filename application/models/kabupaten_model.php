<?php

class Kabupaten_model extends CI_Model {

    // ================= TAMPIL =================
    public function tampil_data()
    {
        $this->db->select('
            kabupaten.*,
            provinsi.nama_provinsi
        ');

        $this->db->from('kabupaten');

        $this->db->join(
            'provinsi',
            'provinsi.id_provinsi = kabupaten.id_provinsi'
        );

        return $this->db->get()->result();
    }

    // ================= INSERT =================
    public function insert_data($data)
    {
        return $this->db->insert('kabupaten', $data);
    }

    // ================= EDIT =================
    public function edit_data($id)
    {
        return $this->db
            ->get_where('kabupaten', [
                'id_kabupaten' => $id
            ])
            ->row();
    }

    // ================= UPDATE =================
    public function update_data($id, $data)
    {
        return $this->db
            ->where('id_kabupaten', $id)
            ->update('kabupaten', $data);
    }

    // ================= HAPUS =================
    public function hapus_data($id)
    {
        return $this->db
            ->where('id_kabupaten', $id)
            ->delete('kabupaten');
    }

    // ================= AJAX =================
    public function get_by_provinsi($id_provinsi)
    {
        return $this->db
            ->get_where('kabupaten', [
                'id_provinsi' => $id_provinsi
            ])
            ->result();
    }
}