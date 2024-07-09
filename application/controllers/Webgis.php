<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Webgis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sekolah');
    }

    public function index()
    {
        $data['title'] = 'Web GIS Sekolah';
        $data['sekolah'] = $this->m_sekolah->tampil();
        $data['isi'] = 'webgis/index';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('front_end/v_wrapper', $data, FALSE);
    }

    public function list_sekolah()
    {
        $data['title'] = 'List Sekolah';
        $data['sekolah'] = $this->m_sekolah->tampil();
        $data['isi'] = 'webgis/list_sekolah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('front_end/v_wrapper', $data, FALSE);
    }

    public function about()
    {
        $data['title'] = 'About';
        $data['isi'] = 'webgis/about';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('front_end/v_wrapper', $data, FALSE);
    }

    public function detail($id_sekolah)
    {
        $data['title'] = 'Detail Sekolah';
        $data['sekolah'] = $this->m_sekolah->detail($id_sekolah);
        $data['isi'] = 'webgis/detail';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('front_end/v_wrapper', $data, FALSE);
    }
}
