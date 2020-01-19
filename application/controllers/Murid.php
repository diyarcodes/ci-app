<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Murid extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Murid';
        $data['murid'] = $this->Murid_model->getAllMahasiswa();

        $this->load->view('templates/header', $data);
        $this->load->view('murid/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambahMurid()
    {
        $data['judul'] = 'Form Tambah Data Murid';
        $data['murid'] = $this->Murid_model->getAllMahasiswa();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nisn', 'Nisn', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('murid/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Murid_model->tambahDataMurid();
            $this->session->set_flashdata('pesan', 'Ditambahkan');
            redirect('Murid');
        }
    }

    public function hapusMurid($id)
    {
        $this->Murid_model->hapusDataMurid($id);
        $this->session->set_flashdata('pesan', 'Dihapus');
        redirect('Murid');
    }
}
