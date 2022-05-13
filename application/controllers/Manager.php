<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        cek_login();
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('manager/index', $data);
        $this->load->view('templates/footer');
    }

    public function kategori_file()
    {
        $data['title'] = 'Kategori file';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = $this->db->get('user_judul');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('manager/kategori_file', $data);
        $this->load->view('templates/footer');
    }

    public function data_triwulan()
    {
        $data['title'] = 'Data Triwulan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('inspect_model', 'inspect');
        $data['data'] = $this->inspect->ambilDataKomputer();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('manager/data_triwulan', $data);
        $this->load->view('templates/footer');
    }

    public function data_perbulan()
    {
        $data['title'] = 'Data Perbulan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('inspect_model', 'inspect');
        $data['data'] = $this->inspect->ambilDataBulanan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('manager/data_perbulan', $data);
        $this->load->view('templates/footer');
    }
}
