<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Murid_model extends CI_Model
{
    public function getAllMahasiswa()
    {
        return $this->db->get('murid')->result_array();
    }

    public function getAllMahasiswaById($id)
    {
        return $this->db->get_where('murid', ['id' => $id])->row_array();
    }

    public function tambahDataMurid()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nisn" => $this->input->post('nisn', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan')
        ];

        $this->db->insert('murid', $data);
    }

    public function hapusDataMurid($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('murid');
    }

    public function ubahDataMurid()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nisn" => $this->input->post('nisn', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('murid', $data);
    }

    public function cariDataMahasiswa()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('jurusan', $keyword);
        return $this->db->get('murid')->result_array();
    }
}
