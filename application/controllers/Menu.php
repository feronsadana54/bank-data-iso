<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        cek_login();
    }
    public function index()
    {
        $data['title'] = 'Menu management';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['menu'] = $this->db->get_where('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Menu berhasil ditambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('menu');
        }
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Submenu berhasil ditambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('menu/submenu');
        }
    }

    function hapus($id)
    {
        $this->load->model('Menu_model', 'menu');
        $this->load->model('Menu_model');
        $this->menu->hapus_data_sub($id);
        $id = $this->input->post('id');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Submenu berhasil dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('Menu/submenu');
    }


    public function edit_submenu($id)
    {
        $this->load->model('Menu_model', 'menu');
        $data['title'] = 'Edit Submenu';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['data'] = $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['user_sub'] = $this->menu->get_sub_menu($id);
        $data['uri'] = $this->uri->segment(3);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/edit_sub', $data);
        $this->load->view('templates/footer');
    }

    public function updatesubmenu()
    {
        $this->load->model('Menu_model', 'menu');
        $id = $this->input->post('id');
        $data = $this->menu->getDataById($id)->row();
        $menu_id = $this->input->post('menu_id');
        $title = $this->input->post('title');
        $url = $this->input->post('url');
        $icon = $this->input->post('icon');

        $data = array(
            'menu_id' => $menu_id,
            'title' => $title,
            'url' => $url,
            'icon' => $icon
        );

        $where = array(
            'id' => $id
        );

        $this->menu->update_data($where, $data, 'user_sub_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Submenu berhasil diupdate</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('menu/submenu');
    }

    public function edit($id)
    {
        $this->load->model('Menu_model', 'menu');
        $data['title'] = 'Edit Menu Management';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['data'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();
        $where = array('id' => $id);
        $data['user_menu'] = $this->menu->edit_data($where, 'user_menu')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/edit_menu', $data);
        $this->load->view('templates/footer');
    }



    public function updatemenu()
    {
        $this->load->model('Menu_model', 'menu');
        $id = $this->input->post('id');
        $data = $this->menu->getDataById($id)->row();
        $menu = $this->input->post('menu');

        $data = array(
            'menu' => $menu
        );

        $where = array(
            'id' => $id
        );

        $this->menu->update_data($where, $data, 'user_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Menu berhasil diupdate</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('menu');
    }
}
