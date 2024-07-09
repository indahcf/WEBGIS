<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekolah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sekolah');
    }

    public function index()
    {
        $data['title'] = 'Data Sekolah';
        $data['sekolah'] = $this->m_sekolah->tampil();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sekolah/index', $data);
        $this->load->view('templates/footer');
        $this->load->helper('form');
    }

    public function input()
    {
        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required', array(
            'required' => '%s Harus Diisi!'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
            'required' => '%s Harus Diisi!'
        ));
        $this->form_validation->set_rules('status_sekolah', 'Status Sekolah', 'required', array(
            'required' => '%s Harus Diisi!'
        ));
        $this->form_validation->set_rules('kepala_sekolah', 'Kepala Sekolah', 'required', array(
            'required' => '%s Harus Diisi!'
        ));
        $this->form_validation->set_rules('latitude', 'Latitude', 'required', array(
            'required' => '%s Harus Diisi!'
        ));
        $this->form_validation->set_rules('longitude', 'Longitude', 'required', array(
            'required' => '%s Harus Diisi!'
        ));
        $this->form_validation->set_rules('ket', 'Keterangan', 'required', array(
            'required' => '%s Harus Diisi!'
        ));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size'] = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                $data['title'] = 'Input Sekolah';
                $data['error_upload'] = $this->upload->display_errors();
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('sekolah/input', $data);
                $this->load->view('templates/footer');
                $this->load->helper('form');
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source image'] = './gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_sekolah'      => $this->input->post('nama_sekolah'),
                    'alamat'            => $this->input->post('alamat'),
                    'status_sekolah'    => $this->input->post('status_sekolah'),
                    'kepala_sekolah'    => $this->input->post('kepala_sekolah'),
                    'latitude'          => $this->input->post('latitude'),
                    'longitude'         => $this->input->post('longitude'),
                    'ket'               => $this->input->post('ket'),
                    'gambar'            => $upload_data['uploads']['file_name'],
                );
                $this->m_sekolah->simpan($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan!');
                redirect('sekolah/input');
            }
        }

        $data['title'] = 'Input Sekolah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sekolah/input', $data);
        $this->load->view('templates/footer');
        $this->load->helper('form');
    }

    public function edit($id_sekolah)
    {
        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required', array(
            'required' => '%s Harus Diisi!'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
            'required' => '%s Harus Diisi!'
        ));
        $this->form_validation->set_rules('status_sekolah', 'Status Sekolah', 'required', array(
            'required' => '%s Harus Diisi!'
        ));
        $this->form_validation->set_rules('kepala_sekolah', 'Kepala Sekolah', 'required', array(
            'required' => '%s Harus Diisi!'
        ));
        $this->form_validation->set_rules('latitude', 'Latitude', 'required', array(
            'required' => '%s Harus Diisi!'
        ));
        $this->form_validation->set_rules('longitude', 'Longitude', 'required', array(
            'required' => '%s Harus Diisi!'
        ));
        $this->form_validation->set_rules('ket', 'Keterangan', 'required', array(
            'required' => '%s Harus Diisi!'
        ));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size'] = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                $data['title'] = 'Edit Sekolah';
                $data['error_upload'] = $this->upload->display_errors();
                $data['sekolah'] = $this->m_sekolah->detail($id_sekolah);
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('sekolah/edit', $data);
                $this->load->view('templates/footer');
                $this->load->helper('form');
            } else {
                //edit dengan ubah gambar
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source image'] = './gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_sekolah'        => $id_sekolah,
                    'nama_sekolah'      => $this->input->post('nama_sekolah'),
                    'alamat'            => $this->input->post('alamat'),
                    'status_sekolah'    => $this->input->post('status_sekolah'),
                    'kepala_sekolah'    => $this->input->post('kepala_sekolah'),
                    'latitude'          => $this->input->post('latitude'),
                    'longitude'         => $this->input->post('longitude'),
                    'ket'               => $this->input->post('ket'),
                    'gambar'            => $upload_data['uploads']['file_name'],
                );
                $this->m_sekolah->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diedit!');
                redirect('sekolah');
            }

            //edit tanpa ubah gambar
            $data = array(
                'id_sekolah'        => $id_sekolah,
                'nama_sekolah'      => $this->input->post('nama_sekolah'),
                'alamat'            => $this->input->post('alamat'),
                'status_sekolah'    => $this->input->post('status_sekolah'),
                'kepala_sekolah'    => $this->input->post('kepala_sekolah'),
                'latitude'          => $this->input->post('latitude'),
                'longitude'         => $this->input->post('longitude'),
                'ket'               => $this->input->post('ket'),
            );
            $this->m_sekolah->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit!');
            redirect('sekolah');
        }

        $data['title'] = 'Edit Sekolah';
        $data['sekolah'] = $this->m_sekolah->detail($id_sekolah);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sekolah/edit', $data);
        $this->load->view('templates/footer');
        $this->load->helper('form');
    }

    public function hapus($id_sekolah)
    {
        $data = array('id_sekolah' => $id_sekolah);
        $this->m_sekolah->hapus($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
        redirect('sekolah');
    }
}
