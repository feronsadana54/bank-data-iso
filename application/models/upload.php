<?php
defined('BASEPATH') or exit('No direct script access allowed');

class upload extends CI_Model
{
    public function uploaddoc()
    {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '2000';
        $config['upload_path'] = './uploads/ ';
        $config['overwrite'] = true;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $data = $this->upload->data('file_name');
            $this->db->set('file', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Upload gagal!
                  </div>');
            redirect('user');
        }
    }
}
