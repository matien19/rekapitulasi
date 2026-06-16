<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suara_model extends CI_Model {

    public function insert_batch($data)
    {
        return $this->db->insert_batch(
            'suara',
            $data
        );
    }

}