<?php

class Kecamatan_model extends CI_Model {

    // tampil
    public function tampil_data()
    {
        $this->db->select('
            kecamatan.*,
            kabupaten.nama_kabupaten,
            provinsi.nama_provinsi
        ');

        $this->db->from('kecamatan');

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

    // insert
    public function insert_data($data)
    {
        return $this->db->insert('kecamatan', $data);
    }

    // edit
    public function edit_data($id)
    {
        $this->db->select('
            kecamatan.*,
            kabupaten.id_provinsi
        ');

        $this->db->from('kecamatan');

        $this->db->join(
            'kabupaten',
            'kabupaten.id_kabupaten = kecamatan.id_kabupaten'
        );

        $this->db->where('kecamatan.id_kecamatan', $id);

        return $this->db->get()->row();
    }

    // update
    public function update_data($id, $data)
    {
        return $this->db
            ->where('id_kecamatan', $id)
            ->update('kecamatan', $data);
    }

    // hapus
    public function hapus_data($id)
    {
        return $this->db
            ->where('id_kecamatan', $id)
            ->delete('kecamatan');
    }

    // ajax
    public function get_by_kabupaten($id_kabupaten)
    {
        return $this->db
            ->get_where('kecamatan', [
                'id_kabupaten' => $id_kabupaten
            ])
            ->result();
    }
}