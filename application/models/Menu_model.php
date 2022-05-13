<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*,`user_menu`.`menu`
                FROM `user_sub_menu` JOIN `user_menu`
                ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        ";
        return $this->db->query($query)->result_array();
    }

    public function hapus_data($id)
    {

        $hasil = $this->db->query("DELETE FROM user_menu WHERE id='$id'");
        return $hasil;
    }

    public function hapus_data_sub($id)
    {
        $hasil = $this->db->query("DELETE FROM user_sub_menu WHERE id='$id'");
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

    function getDataById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('user_menu');
    }
}
