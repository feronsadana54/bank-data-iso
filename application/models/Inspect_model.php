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
        return $this->db->get_where('user_file', ['id' => $id])->result();
    }

    function getDataByIdPerbulan($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('user_data_perbulan');
    }

    function get_user_judul()
    {
        return $this->db->get('user_judul')->result();
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

    function get_data_twiwulan()
    {
        $query = $this->db->get_where('user_file', ['id_kategori' => '1'])->result_array();
        return $query;
    }

    

    function get_triwulan()
    {
        $this->db->select('*');
        $this->db->from('user_file');
        $this->db->join('user_judul', 'user_file.id_judul = user_judul.id_judul');
        $this->db->join('user_kategori_judul', 'user_file.id_kategori = user_kategori_judul.id_kategori');
        $this->db->where('user_file.id_kategori', '1');
        $this->db->order_by('user_file.id', 'ASC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    function get_perbulan()
    {
        $this->db->select('*');
        $this->db->from('user_file');
        $this->db->join('user_judul', 'user_file.id_judul = user_judul.id_judul');
        $this->db->join('user_kategori_judul', 'user_file.id_kategori = user_kategori_judul.id_kategori');
        $this->db->where('user_file.id_kategori', '2');
        $this->db->order_by('user_file.id', 'ASC');
        $query = $this->db->get()->result_array();
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
        return $this->db->get('user_file');
    }

    function get_data_by_id_triwulan($id)
    {
        $this->db->select('*');
        $this->db->from('user_file');
        $this->db->join('user_judul', 'user_file.id_judul = user_judul.id_judul');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query;
    }

    public function hapus_data_Triwulan($id)
    {
        $hasil = $this->db->query("DELETE FROM user_file WHERE id='$id'");
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
