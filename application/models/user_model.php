<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    // ================= TAMPIL USER =================
    public function tampil_data()
    {
        $this->db->select('
            users.*,
            desa.nama_desa
        ');

        $this->db->from('users');

        $this->db->join(
            'desa',
            'desa.id_desa = users.id_desa',
            'left'
        );

        return $this->db->get()->result();
    }

    // ================= GET DESA =================
    public function get_desa()
    {
        return $this->db->get('desa')->result();
    }

    // ================= INSERT USER =================
    public function insert_data($data)
    {
        return $this->db->insert('users', $data);
    }

    // ================= GET USER BY ID =================
    public function get_by_id($id_user)
    {
        $this->db->select('
            users.*,
            desa.nama_desa,
            desa.id_kecamatan,
            kecamatan.nama_kecamatan,
            kecamatan.id_kabupaten,
            kabupaten.nama_kabupaten,
            kabupaten.id_provinsi,
            provinsi.nama_provinsi
        ');

        $this->db->from('users');

        $this->db->join('desa', 'desa.id_desa = users.id_desa', 'left');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = desa.id_kecamatan', 'left');
        $this->db->join('kabupaten', 'kabupaten.id_kabupaten = kecamatan.id_kabupaten', 'left');
        $this->db->join('provinsi', 'provinsi.id_provinsi = kabupaten.id_provinsi', 'left');

        $this->db->where('users.id_user', $id_user);

        return $this->db->get()->row();
    }

    // ================= UPDATE USER =================
    public function update_data($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('users', $data);
    }

    // ================= HAPUS USER =================
    public function hapus_data($where)
    {
        $this->db->where($where);
        return $this->db->delete('users');
    }

}