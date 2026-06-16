<?php

class Provinsi_model extends CI_Model {

    // tampil
    public function tampil_data()
    {
        return $this->db->get('provinsi')->result();
    }

    // insert
    public function insert_data($data)
    {
        return $this->db->insert('provinsi', $data);
    }

    // edit
    public function edit_data($id)
    {
        return $this->db
            ->get_where('provinsi', ['id_provinsi' => $id])
            ->row();
    }

    // update
    public function update_data($id, $data)
    {
        return $this->db
            ->where('id_provinsi', $id)
            ->update('provinsi', $data);
    }

    // hapus
    public function hapus_data($id)
    {
        return $this->db
            ->where('id_provinsi', $id)
            ->delete('provinsi');
    }
}