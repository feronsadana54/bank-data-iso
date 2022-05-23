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

    function getDataByIdISO($id)
    {
        return $this->db->get_where('user_judul', ['id_judul' => $id]);
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

    function get_kategori_judul_triwulan($id)
    {
        $kategori = "SELECT * 
        FROM `user_file` JOIN `user_judul`
        ON `user_judul`.`id_judul` = `user_file`.`id_judul`
        LEFT JOIN `user_kategori_judul`
        ON `user_kategori_judul`.`id_kategori` = `user_file`.`id_kategori`
        WHERE `user_judul`.`id_judul` = $id
        AND
         `user_file`.`id_kategori` = 1
        ORDER BY `user_file`.`id` ASC
        ";

        
        $val = $this->db->query($kategori)->result_array();
        return $val;
    }

    function get_kategori_judul_perbulan($id)
    {
        $kategori = "SELECT * 
        FROM `user_file` JOIN `user_judul`
        ON `user_judul`.`id_judul` = `user_file`.`id_judul`
        LEFT JOIN `user_kategori_judul`
        ON `user_kategori_judul`.`id_kategori` = `user_file`.`id_kategori`
        WHERE `user_judul`.`id_judul` = $id
        AND
         `user_file`.`id_kategori` = 2
        ORDER BY `user_file`.`id` ASC
        ";

        
        $val = $this->db->query($kategori)->result_array();
        return $val;
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

    function ambilDataJudul()
    {
        $query = $this->db->get('user_judul')->result_array();
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

    public function hapus_data_iso($id)
    {
        $hasil = $this->db->query("DELETE FROM user_judul WHERE id_judul ='$id'");
        return $hasil;
    }
    
    

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('user_file');
        $this->db->where('id_kategori', '1');
        $this->db->order_by('id', 'ASC');
        $this->db->or_like('nama_berkas', $keyword);
        $this->db->or_like('bisnis_area', $keyword);
        $this->db->or_like('id_judul', $keyword);
        $this->db->or_like('tanggal', $keyword);

        // var_dump($this->db->get()->result());
        $val =  $this->db->get()->result_array();
        var_dump($val);
        die;
    }

    public function get_date($keywordawal)
    {
        $this->db->select('*');
        $this->db->from('user_file');
        $this->db->join('user_judul', 'user_file.id_judul = user_judul.id_judul');
        $this->db->join('user_kategori_judul', 'user_file.id_kategori = user_kategori_judul.id_kategori');
        $this->db->where('tanggal', $keywordawal);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_keywordperbulan($keyword)
    {
        $this->db->select('*');
        $this->db->from('user_file');
        $this->db->or_like('nama_berkas', $keyword);
        $this->db->or_like('bisnis_area', $keyword);
        $this->db->or_like('id_judul', $keyword);
        $this->db->or_like('tanggal', $keyword);
        $this->db->where('id_kategori', '2');
        $this->db->order_by('id', 'ASC');

        // var_dump($this->db->get()->result());
        $val =  $this->db->get()->result_array();
        var_dump($val);
        die;
    }
}
