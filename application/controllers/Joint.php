<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Joint extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->model('inspect_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Kategori file';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = $this->db->get('user_judul');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('join/kategori_file', $data);
        $this->load->view('templates/footer');
    }
    // public function index()
    // {
    //     $data['title'] = 'Kategori file';
    //     $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    //     // pagination
    //     $this->load->library('pagination');

    //     // config
    //     $config['base_url'] = 'http://localhost/cobaLogin/joint/kategori';
    //     $config['total_rows'] = $this->inspect_model->hitungSemuaData();
    //     $config['per_page'] = 12;
    //     $config['num_links'] = 3;

    //     // Style
    //     $config['full_tag_open'] = '<nav">
    //     <ul class="pagination justify-content-center">';
    //     $config['full_tag_close'] = '</ul>
    //     </nav>';


    //     $config['first_link'] = 'First';
    //     $config['first_tag_open'] = ' <li class="page-item">';
    //     $config['first_tag_close'] = ' </li>';

    //     $config['next_link'] = '&raquo';
    //     $config['next_tag_open'] = ' <li class="page-item">';
    //     $config['next_tag_close'] = ' </li>';

    //     $config['prev_link'] = '&laquo';
    //     $config['prev_tag_open'] = ' <li class="page-item">';
    //     $config['prev_tag_close'] = ' </li>';

    //     $config['cur_tag_open'] = ' <li class="page-item active"><a class="page-link" href="#">';
    //     $config['cur_tag_close'] = '</a></li>';

    //     $config['num_tag_open'] = ' <li class="page-item">';
    //     $config['num_tag_close'] = ' </li>';

    //     $config['attributes'] = array('class' => 'page-link');

    //     // inisialisasi
    //     $this->pagination->initialize($config);

    //     $data['start'] = $this->uri->segment(3);
    //     $data['inject'] = $this->inspect_model->getUrutData($config['per_page'], $data['start']);
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('join/kategori_file', $data);
    //     $this->load->view('templates/footer');
    // }

    public function ISO()
    {
        $data['judul'] = $this->db->get('user_judul')->result_array();

        $data['title'] = 'ISO';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('inspect_model', 'inspect');
        $data['judul'] = $this->db->get('user_judul')->result_array();
        $data['kategori'] = $this->db->get('user_kategori_judul')->result_array();



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('join/iso', $data);
            $this->load->view('templates/footer');
        }
    }

    public function halaman_triwulan()
    {
        $data['title'] = 'Halaman Triwulan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('inspect_model', 'inspect');
        $this->load->library('form_validation');
        $data['getjudul'] = $this->inspect->ambilDataTriwulan();

        $this->form_validation->set_rules('bussinnes_area', 'Bisnis Area', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kategori/triwulan', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']          = './uploads/triwulan/';
            $config['allowed_types']        = 'doc|docx|xls|xlsx|pdf';
            $config['max_size']             = 5000;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('kategori/triwulan', $error);
            } else {
                $data = [
                    'nama_berkas' => $this->upload->data('file_name'),
                    'judul_file' => $this->input->post('judul_file'),
                    'bussinnes_area' => $this->input->post('bussinnes_area'),
                    'file' => $this->upload->data('file_ext'),
                    'tanggal' => date('Y-m-d H:i:s')
                ];
                $this->db->insert('data_triwulan', $data);
                redirect('joint/iso');
            }
        }
    }



    public function perbulan()
    {
        $data['title'] = 'Halaman Perbulan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('inspect_model', 'inspect');
        $data['getjudul'] = $this->inspect->ambilDataPerbulan();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('bisnis_area', 'Bisnis Area', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kategori/perbulan', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']          = './uploads/perbulan/';
            $config['allowed_types']        = 'doc|docx|xls|xlsx|pdf';
            $config['max_size']             = 5000;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('kategori/perbulan', $error);
            } else {
                $data = [
                    'nama_berkas' => $this->upload->data('file_name'),
                    'judul_file' => $this->input->post('judul_file'),
                    'bisnis_area' => $this->input->post('bisnis_area'),
                    'file' => $this->upload->data('file_ext'),
                    'tanggal' => date('Y-m-d H:i:s')
                ];
                $this->db->insert('user_data_perbulan', $data);
                redirect('joint/iso');
            }
        }
    }

    public function hapus_data($id)
    {

        $this->db->where('id', $id);
        $data = $this->inspect_model->getDataById($id)->row();
        $nama = './uploads/' . $data->file;

        if (is_readable($nama) && unlink($nama)) //fungsi untuk membaca file
        {
            $this->inspect_model->hapus_data($id);
            redirect('joint/kategori');
        } else if (!is_readable($nama)) {
            $this->inspect_model->hapus_data($id);
            redirect('joint/kategori');
        } else {
            echo 'gagal';
        }
    }

    public function download($id)
    {
        $data = $this->db->get_where('db_inject', ['file' => $id])->row();
        force_download('uploads/' . $data->file, NULL);
    }



    public function inputIso()
    {
        $data['title'] = 'Input Iso';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('inspect_model', 'inspect');
        $data['judul'] = $this->db->get('user_kategori_judul')->result_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('join/inputiso', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'judul' => $this->input->post('judul'),
                'kategori_id' => $this->input->post('kategori')
            ];

            $this->db->insert('user_judul', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Submenu berhasil ditambahkan
          </div>');
            redirect('joint');
        }
    }

    public function tampil_data_triwulan()
    {
        $data['title'] = 'Data Komputer';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('inspect_model', 'inspect');
        $data['data'] = $this->inspect->ambilDataKomputer();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/komputer', $data);
        $this->load->view('templates/footer');
    }

    public function download_triwulan($id)
    {
        $data = $this->db->get_where('data_triwulan', ['nama_berkas' => $id])->row();
        force_download('uploads/triwulan/' . $data->nama_berkas, Null);
    }

    public function hapus_data_triwulan($id)
    {
        $this->load->model('inspect_model', 'inspect');
        $this->db->where('id', $id);

        $data = $this->inspect->getDataByIdtriwulan($id)->row();
        $nama = './uploads/triwulan/' . $data->file;

        if (is_readable($nama) && unlink($nama)) //fungsi untuk membaca file
        {
            $this->inspect_model->hapus_data_triwulan($id);
            redirect('joint');
        } else if (!is_readable($nama)) {
            $this->inspect_model->hapus_data_triwulan($id);
            redirect('joint');
        } else {
            echo 'gagal';
        }
    }

    function edit_perbulan($id)
    {
        $data['title'] = 'Edit Iso Perbulan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['data'] = $this->inspect_model->getDataByIdperbulan($id)->row();
        $where = array('id' => $id);
        $data['user_kat'] = $this->inspect_model->edit_data($where, 'user_data_perbulan')->result();
        $data['perbulan'] = $this->db->get('user_data_perbulan')->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/edit_perbulan', $data);
        $this->load->view('templates/footer');

        // $data['title'] = 'Edit Iso Perbulan';
        // $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // $this->load->model('inspect_model', 'inspect');
        // $data['perbulan'] = $this->db->get('user_data_perbulan')->row_array();
        // // if ($this->form_validation->run() == false) {
        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        // $this->load->view('data/edit_perbulan', $data);
        // $this->load->view('templates/footer');
        // } else {
        //     $data = [
        //         'title' => $this->input->post('title'),
        //         'menu_id' => $this->input->post('menu_id'),
        //         'url' => $this->input->post('url'),
        //         'icon' => $this->input->post('icon')
        //     ];

        //     $this->db->insert('user', $data);
        //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        //     Akun berhasil ditambahkan
        //   </div>');
        //     redirect('admin/manageakun');
        // }
    }

    public function update_perbulan()
    {
        $id = $this->input->post('id');
        $nama_file = $this->input->post('nama_file');
        $bisnis_area = $this->input->post('bisnis_area');
        $mengetahui = $this->input->post('mengetahui');
        $petugas = $this->input->post('petugas');


        $data = array(
            'nama_file' => $nama_file,
            'bisnis_area' => $bisnis_area,
            'mengetahui' => $mengetahui,
            'petugas' => $petugas,

        );

        $where = array(
            'id' => $id
        );

        $this->inspect_model->update_data($where, $data, 'user_data_perbulan');
        redirect('joint/tampil_perbulan');
    }

    public function edit_triwulan($id)
    {
        $data['title'] = 'Edit Iso Triwulan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['data'] = $this->inspect_model->getDataByIdTriwulan($id)->row();
        $where = array('id' => $id);
        $data['user_kat'] = $this->inspect_model->edit_data($where, 'data_triwulan')->result();
        $data['triwulan'] = $this->db->get('data_triwulan')->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/edit_triwulan', $data);
        $this->load->view('templates/footer');
    }


    public function update_triwulan()
    {
        $id = $this->input->post('id');
        $nama_file = $this->input->post('nama_file');
        $bussinnes_area = $this->input->post('bussinnes_area');
        $nomor_surat = $this->input->post('nomor_surat');
        $nama_mengetahui = $this->input->post('nama_mengetahui');



        $data = array(
            'nama_file' => $nama_file,
            'bussinnes_area' => $bussinnes_area,
            'nomor_surat' => $nomor_surat,
            'nama_mengetahui' => $nama_mengetahui


        );

        $where = array(
            'id' => $id
        );

        $this->inspect_model->update_data($where, $data, 'data_triwulan');
        redirect('joint/tampil_perbulan');
    }

    public function tampil_data_perbulan()
    {
        $data['title'] = 'Data Komputer';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('inspect_model', 'inspect');
        $data['data'] = $this->inspect->ambilDataBulanan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/perbulan', $data);
        $this->load->view('templates/footer');
    }

    public function download_perbulan($id)
    {
        $data = $this->db->get_where('user_data_perbulan', ['nama_berkas' => $id])->row();
        force_download('uploads/perbulan/' . $data->nama_berkas, Null);
    }

    public function hapus_data_perbulan($id)
    {
        $this->load->model('inspect_model', 'inspect');
        $this->db->where('id', $id);

        $data = $this->inspect->getDataByIdPerbulan($id)->row();
        $nama = './uploads/perbulan/' . $data->file;

        if (is_readable($nama) && unlink($nama)) //fungsi untuk membaca file
        {
            $this->inspect_model->hapus_data_Perbulan($id);
            redirect('joint');
        } else if (!is_readable($nama)) {
            $this->inspect_model->hapus_data_Perbulan($id);
            redirect('joint');
        } else {
            echo 'gagal';
        }
    }

    public function editPerbulan($id)
    {
        $id = $this->input->post('id');
        $data = $this->inspect_model->getDataByIdPerbulan($id)->row();
        // var_dump($data);
        // die;
        $nama = './uploads/perbulan/' . $data->file;
        // $x = is_readable($nama) && unlink($nama);

        if (is_readable($nama) && unlink($nama)) //fungsi untuk membaca file
        {
            $config['upload_path']          = './uploads/perbulan/';
            $config['allowed_types']        = 'doc|docx|xls|xlsx|pdf';
            $config['max_size']             = 5000;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());

                var_dump($error);
            } else {
                $data = [
                    // 'judul' => $this->input->post('judul'),
                    'file' => $this->upload->data('file_name'),
                    // 'bulan' => $this->input->post('bulan'),
                    // 'tahun' => $this->input->post('tahun'),
                    'format' => $this->upload->data('file_ext'),
                    'tanggal' => date('Y-m-d H:i:s')
                ];

                $this->inspect_model->updateFilePerbulan($id, $data);

                redirect('joint/kategori');
            }
        } else {
            echo "Gagal";
        }
    }
    public function search()
    {
        $data['title'] = 'Data Komputer';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $keyword = $this->input->post('keyword');
        $data['data'] = $this->inspect_model->get_keyword($keyword);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/komputer', $data);
        $this->load->view('templates/footer');
    }

    public function searchperbulan()
    {
        $data['title'] = 'Data Komputer';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $keyword = $this->input->post('keyword');
        $data['data'] = $this->inspect_model->get_keywordperbulan($keyword);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/perbulan', $data);
        $this->load->view('templates/footer');
    }
}
