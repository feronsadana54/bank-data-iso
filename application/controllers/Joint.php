<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Joint extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->model('inspect_model', 'inspect');
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

    public function tampil_perdata($id)
    {
        $data['title'] = 'Kategori file';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // $data['judul'] = $this->inspect->get_user_judul();
        $data['judul'] = $this->db->get_where('user_judul', ['id_judul' => $id])->row_array();
        // $data['kategori'] = $this->inspect->get_kategori_judul($uri);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('join/kategori_file', $data);
        $this->load->view('templates/footer');
    }

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
        $data['getjudul'] = $this->inspect->ambilDataJudul();

        $this->form_validation->set_rules('bisnis_area', 'Bisnis Area', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kategori/triwulan', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']          = './uploads/triwulan/';
            $config['allowed_types']        = 'doc|docx|xls|xlsx|pdf';
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
                    'id_judul' => $this->input->post('id_judul'),
                    'bisnis_area' => $this->input->post('bisnis_area'),
                    'file' => $this->upload->data('file_ext'),
                    'tanggal' => date("Y-m-d"),
                    'id_kategori' => $this->input->post('id_kategori'),
                ];


                $this->db->insert('user_file', $data);
                redirect('joint/iso');
            }
        }
    }



    public function perbulan()
    {
        $data['title'] = 'Halaman Perbulan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['getjudul'] = $this->inspect->ambilDataJudul();
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
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('nama_berkas')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('kategori/perbulan', $error);
            } else {
                $data = [
                    'nama_berkas' => $this->upload->data('file_name'),
                    'id_judul' => $this->input->post('id_judul'),
                    'bisnis_area' => $this->input->post('bisnis_area'),
                    'file' => $this->upload->data('file_ext'),
                    'tanggal' => date("Y-m-d"),
                    'id_kategori' => $this->input->post('id_kategori'),
                ];

                $this->db->insert('user_file', $data);
                redirect('joint/iso');
            }
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
        $data['judul'] = $this->db->get('user_judul')->result_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('join/inputiso', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'judul' => $this->input->post('judul')
            ];

            $this->db->insert('user_judul', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>ISO berhasil ditambah!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('joint/inputiso');
        }
    }

    function hapus_iso($id)
    {
        $this->load->model('inspect_model', 'inspect');
        $this->inspect->hapus_data_iso($id);
        $id = $this->input->post('id');
        redirect('joint/inputiso');
    }

    public function edit_iso($id)
    {
        $this->load->model('Inspect_model', 'inspect');
        $data['title'] = 'Edit ISO';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['data'] = $this->db->get_where('user_judul', ['id_judul' => $id])->row_array();
        $where = array('id_judul' => $id);
        $data['judul'] = $this->inspect->edit_data($where, 'user_judul')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('join/edit_data', $data);
        $this->load->view('templates/footer');
    }

    public function update_iso()
    {
        $this->load->model('Inspect_model', 'inspect');
        $id = $this->input->post('id_judul');
        $data = $this->inspect->getDataByIdISO($id)->row();
        $judul = $this->input->post('judul');

        $data = array(
            'judul' => $judul
        );

        $where = array(
            'id_judul' => $id
        );


        $this->inspect->update_data($where, $data, 'user_judul');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>ISO berhasil diupdate</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('joint/inputiso');
    }

    public function tampil_data_triwulan()
    {
        $data['title'] = 'Data Komputer';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('inspect_model', 'inspect');
        $uri = $this->uri->segment(3);
        $data['judul'] = $this->inspect->get_kategori_judul_triwulan($uri);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/komputer', $data);
        $this->load->view('templates/footer');
    }

    public function edit_data_triwulan($id)
    {
        $data['title'] = 'Edit Data Triwulan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['temp'] = $this->inspect->getDataById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/edit_triwulan', $data);
        $this->load->view('templates/footer');
    }

    public function update_triwulan()
    {
        $id = $this->input->post('id');
        $bisnis_area = $this->input->post('bisnis_area');
        $nama_berkas = $_FILES['nama_berkas']['name'];
        $id_judul = $this->input->post('id_judul');
        $config['upload_path']          = './uploads/triwulan/';
        $config['allowed_types']        = 'doc|docx|xls|xlsx|pdf';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('nama_berkas')) {
            $data = array(
                'bisnis_area' => $bisnis_area
            );



            $where = array(
                'id' => $id
            );

            

            $this->inspect->update_data($where, $data, 'user_file');
            redirect('joint/tampil_data_triwulan/'. $id_judul);
        } else {
            $item = $this->inspect->getDataByIdtriwulan($id)->row();
            if ($item->nama_berkas != null) {
                $target = './uploads/triwulan/' . $item->nama_berkas;
                unlink($target);
            }
            $nama_berkas = $this->upload->data('file_name');
            $data = array(
                'bisnis_area' => $bisnis_area,
                'nama_berkas' => $nama_berkas,
            );

            $where = array(
                'id' => $id
            );

            $this->inspect->update_data($where, $data, 'user_file');
            redirect('joint/tampil_data_triwulan/'. $id_judul);
        }
    }
    
    public function download_triwulan($id)
    {
        $data = $this->db->get_where('user_file', ['id' => $id])->row_array();
        $low = force_download('uploads/triwulan/' . $data['nama_berkas'], NULL);
        var_dump($low);
        die;
    }

    public function hapus_data_triwulan($id)
    {
        $this->load->model('inspect_model', 'inspect');
        $this->db->where('id', $id);

        $data = $this->inspect->getDataByIdtriwulan($id)->row();
        $nama = './uploads/triwulan/' . $data->nama_berkas;

       

        if (is_readable($nama) && unlink($nama)) //fungsi untuk membaca file
        {
            $this->inspect->hapus_data_triwulan($id);
            redirect('joint/tampil_data_triwulan/' . $data->id_judul);
        } else if (!is_readable($nama)) {
            $this->inspect->hapus_data_triwulan($id);
            redirect('joint/tampil_data_triwulan/' . $data->id_judul);
        } else {
            echo 'gagal';
        }
    }

    function edit_perbulan($id)
    {
        $data['title'] = 'Edit Iso Perbulan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['data'] = $this->inspect->getDataById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/edit_perbulan', $data);
        $this->load->view('templates/footer');
    }

    public function update_perbulan()
    {
        $id = $this->input->post('id');
        $bisnis_area = $this->input->post('bisnis_area');
        $id_judul = $this->input->post('id_judul');
        $nama_berkas = $_FILES['nama_berkas']['name'];
        $config['upload_path']          = './uploads/perbulan/';
        $config['allowed_types']        = 'doc|docx|xls|xlsx|pdf';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('nama_berkas')) {
            $data = array(
                'bisnis_area' => $bisnis_area
            );

            $where = array(
                'id' => $id
            );
            $this->inspect->update_data($where, $data, 'user_file');
            redirect('joint/tampil_data_perbulan/'. $id_judul);
        } else {
            $item = $this->inspect->getDataByIdtriwulan($id)->row();
            if ($item->nama_berkas != null) {
                $target = './uploads/perbulan/' . $item->nama_berkas;
                unlink($target);
            }
            $nama_berkas = $this->upload->data('file_name');
            $data = array(
                'bisnis_area' => $bisnis_area,
                'nama_berkas' => $nama_berkas,
            );

            $where = array(
                'id' => $id
            );

            $this->inspect->update_data($where, $data, 'user_file');
            redirect('joint/tampil_data_perbulan/'. $id_judul);
        }
    }

    public function tampil_data_perbulan()
    {
        $data['title'] = 'Data Komputer';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('inspect_model', 'inspect');
        $uri = $this->uri->segment(3);
        $data['judul'] = $this->inspect->get_kategori_judul_perbulan($uri);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/perbulan', $data);
        $this->load->view('templates/footer');
    }

    public function download_perbulan($id)
    {
        $data = $this->db->get_where('user_file', ['id' => $id])->row_array();
        force_download('uploads/perbulan/' . $data['nama_berkas'], NULL);
    }

    public function hapus_data_perbulan($id)
    {
        $this->load->model('inspect_model', 'inspect');
        $this->db->where('id', $id);

        $data = $this->inspect->getDataByIdtriwulan($id)->row();
        $nama = './uploads/perbulan/' . $data->nama_berkas;

        if (is_readable($nama) && unlink($nama)) //fungsi untuk membaca file
        {
            $this->inspect->hapus_data_triwulan($id);
            redirect('joint/tampil_data_perbulan/'. $data->id_judul);
        } else if (!is_readable($nama)) {
            $this->inspect->hapus_data_triwulan($id);
            redirect('joint/tampil_data_perbulan/'. $data->id_judul);
        } else {
            echo 'gagal';
        }
    }

    
    public function search()
    {
        $data['title'] = 'Data Komputer';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $keywordawal = $this->input->post('keywordawal');
        $data['judul'] = $this->inspect->get_date($keywordawal);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/search_tanggal', $data);
        $this->load->view('templates/footer');
    }

    public function searchperbulan()
    {
        $data['title'] = 'Data Komputer';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $keyword = $this->input->post('keyword');
        $data['data'] = $this->inspect->get_keywordperbulan($keyword);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/perbulan', $data);
        $this->load->view('templates/footer');
    }
}
