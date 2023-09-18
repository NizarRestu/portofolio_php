<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        if ($this->session->userdata('logged_in') != true) {
            redirect(base_url().'auth/login');
        }
    }

	public function index()
	{
        $data['siswa'] = $this-> m_model->get_data('siswa')->result();
		$this->load->view('page/siswa', $data);
	}
    public function tambah_siswa()
	{
        $data['kelas'] = $this-> m_model->get_data('kelas')->result();
		$this->load->view('action/tambah_siswa',$data);
	}
    public function ubah_siswa($id)
	{
        $data['siswa'] = $this-> m_model->get_by_id('siswa' , 'id' , $id)->result();
        $data['kelas'] = $this-> m_model->get_data('kelas')->result();
		$this->load->view('action/ubah_siswa',$data);
	}

    public function  hapus_siswa($id) {
        $this -> m_model->delete('siswa' , 'id' , $id);
        redirect(base_url('siswa'));
    }
    public function aksi_tambah_siswa()
    {
        $data = [
            'nama_siswa' => $this->input->post('nama'),
            'nisn' => $this->input->post('nisn'),
            'gender' => $this->input->post('gender'),
            'id_kelas' => $this->input->post('id_kelas'),
        ];

        $this->m_model->add('siswa', $data);
        redirect(base_url('siswa'));
    }

    public function aksi_ubah_siswa()
    {
        $data =  [
            'nama_siswa' => $this->input->post('nama'),
            'nisn' => $this->input->post('nisn'),
            'gender' => $this->input->post('gender'),
            'id_kelas' => $this->input->post('id_kelas'),
        ];
        $eksekusi = $this->m_model->update('siswa', $data, array('id'=>$this->input->post('id')));
        if($eksekusi) {
            $this->session->set_flashdata('sukses' , 'berhasil');
            redirect(base_url('siswa'));
        } else {
            $this->session->set_flashdata('error' , 'gagal...');
            redirect(base_url('siswa/ubah_siswa/'.$this->input->post('id')));
        }
    }
}