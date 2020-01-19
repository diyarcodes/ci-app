<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Murid_model extends CI_Model
{
    public function getAllMahasiswa()
    {
        return $this->db->get('murid')->result_array();
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
}
