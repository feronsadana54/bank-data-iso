<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }


    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleaccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/roleaccess', $data);
        $this->load->view('templates/footer');
    }

    public function ubahaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Akses diubah!
      </div>');
    }


    public function edit($id)
    {
        $this->load->model('admin_model', 'admin');
        $data['title'] = 'Edit File';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['data'] = $this->db->get_where('user', ['id' => $id])->row_array();
        $where = array('id' => $id);
        $data['user_edit'] = $this->admin->edit_data($where, 'user')->result();
        $data['getAkun'] = $this->db->get('user')->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit_data', $data);
        $this->load->view('templates/footer');
    }

    public function editpassword($id)
    {
        $this->load->model('admin_model', 'admin');
        $data['title'] = 'Edit File';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['data'] = $this->db->get_where('user', ['id' => $id])->row_array();
        $where = array('id' => $id);
        $data['user_edit'] = $this->admin->edit_data($where, 'user')->result();
        $data['getAkun'] = $this->db->get('user')->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit_password', $data);
        $this->load->view('templates/footer');
    }

    // public function edit($id)
    // {
    //     $this->load->model('admin_model', 'admin');
    //     $where = array('id' => $id);
    //     $data['edit'] =  $this->admin->edit_data($where, 'user');
    //     $data['title'] = 'Edit Akun';
    //     $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    //     $data['getAkun'] = $this->db->get('user')->row_array();
    //     $data['role'] = $this->db->get('user_role')->result_array();


    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('admin/edit_data', $data);
    //     $this->load->view('templates/footer');
    // }

    public function update()
    {
        $this->load->model('admin_model', 'admin');
        $id = $this->input->post('id');
        $data = $this->admin->getDataById($id)->row();
        $name = $this->input->post('name');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $role_id =  $this->input->post('role_id');
        $data = array(
            'name' => $name,
            'username' => $username,
            'pass' => $password,
            'role_id' => $role_id
        );

        $where = array(
            'id' => $id
        );

        var_dump($id);

        $this->admin->update_data($where, $data, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun berhasil diupdate
          </div>');
        redirect('admin/manageakun');
    }
    public function updatepassword()
    {
        $this->load->model('admin_model', 'admin');
        $id = $this->input->post('id');
        $data = $this->admin->getDataById($id)->row();
        $password = $this->input->post('password');
        $data = array(
            'pass' => $password,
            'pass' => password_hash($password, PASSWORD_DEFAULT)
        );

        $where = array(
            'id' => $id
        );

        // var_dump($id);

        $this->admin->update_data($where, $data, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun berhasil diupdate
          </div>');
        redirect('admin/manageakun');
    }

    public function hapus_data($id = null)
    {
        $this->load->model('admin_model');
        $this->admin_model->hapus_data($id);
        $id = $this->input->post('id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun berhasil dihapus
          </div>');
        redirect('admin/manageakun');
    }

    public function manageAkun()
    {
        $data['title'] = 'Management Akun';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['manage'] = $this->db->get('user')->result_array();
        $this->load->model('admin_model', 'admin');

        $data['manageAkun'] = $this->admin->getSubAkun();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[5]|max_length[255]|is_unique[user.username]', [
            'is_unique' => 'username telah terpakai',
            'min_length' => 'minimal 5 kata'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password tidak sama',
            'min_length' => 'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/management_akun', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'pass' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('akun_id'),
                'image' => 'default.jpg',
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun berhasil ditambahkan
          </div>');
            redirect('admin/manageakun');
        }
    }
}
