<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    public function index()
    {
        $data['title'] = 'Data User';
        $data['data_user'] = $this->m_user->tampil();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function input()
    {
        $this->form_validation->set_rules('name', 'Nama User', 'required', array(
            'required' => '%s Harus Diisi!'
        ));
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => '%s Harus Diisi!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi!'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Input User';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/input', $data);
            $this->load->view('templates/footer');
            $this->load->helper('form');
        } else {
            $data = array(
                'name'      => $this->input->post('name'),
                'email'     => $this->input->post('email'),
                'image'         => 'default.jpg',
                'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id'       => 1,
                'is_active'     => 1,
                'date_created'  => time()
            );
            $this->m_user->simpan($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan!');
            redirect('user/input');
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('name', 'Nama User', 'required', array(
            'required' => '%s Harus Diisi!'
        ));
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => '%s Harus Diisi!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi!'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit User';
            $data['data_user'] = $this->m_user->detail($id);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
            $this->load->helper('form');
        } else {
            $data = array(
                'id'            => $id,
                'name'          => $this->input->post('name'),
                'email'         => $this->input->post('email'),
                'image'         => 'default.jpg',
                'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id'       => 1,
                'is_active'     => 1,
                'date_created'  => time()
            );
            $this->m_user->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan!');
            redirect('user');
        }
    }

    public function hapus($id)
    {
        $data = array('id' => $id);
        $this->m_user->hapus($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
        redirect('user');
    }
}
