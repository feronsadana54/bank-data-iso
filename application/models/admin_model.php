<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_model extends CI_Model
{
    public function hapus_data($id)
    {

        $hasil = $this->db->query("DELETE FROM user WHERE id='$id'");
        return $hasil;
    }

    public function getSubAkun()
    {
        $query = "SELECT `user`.*,`user_role`.`role`
                FROM `user` JOIN `user_role`
                ON `user`.`role_id` = `user_role`.`id`
        ";
        return $this->db->query($query)->result_array();
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
        return $this->db->get('user');
    }
}
