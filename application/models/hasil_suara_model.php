<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_suara_model extends CI_Model {

    // ================= AMBIL HASIL SUARA =================
    public function get_hasil()
    {
        return $this->db

            ->select('
                suara.id_suara,
                suara.id_tps,
                suara.id_caleg,
                suara.jumlah_suara,
                suara.kategori,
                suara.id_dapil,
                suara.created_at,
                suara.foto,

                tps.nama_tps,

                caleg.nama_caleg,
                caleg.partai,
                caleg.foto AS foto_caleg
            ')

            ->from('suara')

            ->join(
                'tps',
                'tps.id_tps = suara.id_tps',
                'left'
            )

            ->join(
                'caleg',
                'caleg.id_caleg = suara.id_caleg',
                'left'
            )

            ->order_by(
                'suara.id_suara',
                'DESC'
            )

            ->get()

            ->result();
    }
}