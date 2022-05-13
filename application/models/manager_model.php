<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager_model extends CI_Model
{
    function hitungSemuaData()
    {
        return $this->db->get('db_inject')->num_rows();
    }

    function getUrutData($limit, $start)
    {
        $this->db->order_by('tahun', 'ASC');
        return $this->db->get('db_inject', $limit, $start)->result();
    }
}
