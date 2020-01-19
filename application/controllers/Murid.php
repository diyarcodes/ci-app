<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Murid extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Murid';
        $data['murid'] = $this->Mahasiswa_model->getAllMahasiswa();

        $this->load->view('templates/header', $data);
        $this->load->view('murid/index', $data);
        $this->load->view('templates/footer');
    }
}
