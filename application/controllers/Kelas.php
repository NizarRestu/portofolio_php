<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

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
        $data['kelas'] = $this-> m_model->get_data('kelas')->result();
		$this->load->view('page/kelas', $data);
	}
    public function tambah_kelas()
	{
        $data['sekolah'] = $this-> m_model->get_data('sekolah')->result();
        $data['walikelas'] = $this-> m_model->get_data('guru')->result();
		$this->load->view('action/tambah_kelas',$data);
	}
    public function ubah_kelas($id)
	{
        $data['kelas'] = $this-> m_model->get_by_id('kelas' , 'id' , $id)->result();
        $data['sekolah'] = $this-> m_model->get_data('sekolah')->result();
        $data['walikelas'] = $this-> m_model->get_data('guru')->result();
		$this->load->view('action/ubah_kelas',$data);
	}

    public function  hapus_kelas($id) {
        $this -> m_model->delete('kelas' , 'id' , $id);
        redirect(base_url('kelas'));
    }
    public function aksi_tambah_kelas()
    {
        $data = [
            'tingkat_kelas' => $this->input->post('tingkat'),
            'jurusan_kelas' => $this->input->post('jurusan'),
            'id_sekolah' => $this->input->post('id_sekolah'),
            'id_walikelas' => $this->input->post('id_walikelas'),
        ];

        $this->m_model->add('kelas', $data);
        redirect(base_url('kelas'));
    }

    public function aksi_ubah_kelas()
    {
        $data = [
            'tingkat_kelas' => $this->input->post('tingkat'),
            'jurusan_kelas' => $this->input->post('jurusan'),
            'id_sekolah' => $this->input->post('id_sekolah'),
            'id_walikelas' => $this->input->post('id_walikelas'),
        ];
        $eksekusi = $this->m_model->update('kelas', $data, array('id'=>$this->input->post('id')));
        if($eksekusi) {
            $this->session->set_flashdata('sukses' , 'berhasil');
            redirect(base_url('kelas'));
        } else {
            $this->session->set_flashdata('error' , 'gagal...');
            redirect(base_url('kelas/ubah_kelas/'.$this->input->post('id')));
        }
    }
}