<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inspect_model extends CI_Model
{
    public function hapus_data($id)
    {

        $hasil = $this->db->query("DELETE FROM db_inject WHERE id='$id'");
        return $hasil;
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function update_data_triwulan($data, $table)
    {
        $this->db->update($table, $data);
    }

    function getDataById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('db_inject');
    }
    function getDataByIdPerbulan($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('user_data_perbulan');
    }

    function updateFilePerbulan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function urutDataPerbulan()
    {
        $this->db->order_by('bulan', 'ASC');
        return $this->db->get('user_data_perbulan')->result();
    }

    function ambilDataKomputer()
    {
        $query = $this->db->get('data_triwulan')->result_array();
        return $query;
    }
    function ambilDataBulanan()
    {
        $query = $this->db->get('user_data_perbulan')->result_array();
        return $query;
    }

    function ambilDataTriwulan()
    {
        $query = $this->db->get_where('user_judul', ['kategori_id' => '1'])->result_array();
        return $query;
    }
    function ambilDataPerbulan()
    {
        $query = $this->db->get_where('user_judul', ['kategori_id' => '2'])->result_array();
        return $query;
    }

    function getUrutDataPerbulan($limit, $start)
    {
        $this->db->order_by('user_data_perbulan', 'ASC');
        return $this->db->get('judul_file', $limit, $start)->result();
    }

    function hitungSemuaData()
    {
        return $this->db->get('db_inject')->num_rows();
    }

    public function getSubKate()
    {
        $query = "SELECT `user_judul`.*,`user_kategori_judul`.`kategori`
                FROM `user_judul` JOIN `user_kategori_judul`
                ON `user_judul`.`kategori_id` = `user_kategori_judul`.`id`
        ";
        return $this->db->query($query)->result_array();
    }

    function getDataByIdKat()
    {
        $this->db->where('kategori_id');
        return $this->db->get('user_judul');
    }

    function getDataByIdTriwulan($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('data_triwulan');
    }

    public function hapus_data_Triwulan($id)
    {

        $hasil = $this->db->query("DELETE FROM data_triwulan WHERE id='$id'");
        return $hasil;
    }
    public function hapus_data_Perbulan($id)
    {

        $hasil = $this->db->query("DELETE FROM user_data_perbulan WHERE id='$id'");
        return $hasil;
    }


    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('data_triwulan');
        $this->db->or_like('nama_berkas', $keyword);
        $this->db->or_like('judul_file', $keyword);
        $this->db->or_like('tanggal', $keyword);
        $this->db->or_like('bussinnes_area', $keyword);

        // var_dump($this->db->get()->result());
        return $this->db->get()->result_array();
    }
    public function get_keywordperbulan($keyword)
    {
        $this->db->select('*');
        $this->db->from('user_data_perbulan');
        $this->db->or_like('nama_berkas', $keyword);
        $this->db->or_like('bisnis_area', $keyword);
        $this->db->or_like('judul_file', $keyword);
        $this->db->or_like('tanggal', $keyword);

        // var_dump($this->db->get()->result());
        return $this->db->get()->result_array();
    }
}
