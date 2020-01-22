<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Murid extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Murid';
        $data['murid'] = $this->Murid_model->getAllMahasiswa();

        if ($this->input->post('keyword')) {
            $data['murid'] = $this->Murid_model->cariDataMahasiswa();
        }

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

    public function detailMurid($id)
    {
        $data['judul'] = 'Detail Data Mahasiswa';
        $data['murid'] = $this->Murid_model->getAllMahasiswaById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('murid/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubahMurid($id)
    {
        $data['judul'] = 'Form Ubah Data Murid';
        $data['murid'] = $this->Murid_model->getAllMahasiswaById($id);
        $data['jurusan'] = ['Rekayasa Perangkat Lunak', 'Multimedia', 'Tekhnik Komputer Jaringan', 'Tekhnik Bisnis Sepeda Montor'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nisn', 'Nisn', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('murid/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Murid_model->ubahDataMurid();
            $this->session->set_flashdata('pesan', 'Diubah');
            redirect('Murid');
        }
    }
}
