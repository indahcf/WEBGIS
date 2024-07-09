<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }

    public function simpan($data)
    {
        $this->db->insert('user', $data);
    }

    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('user', $data);
    }

    public function hapus($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('user', $data);
    }
}
