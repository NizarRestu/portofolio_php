<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

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
        $data['mapel'] = $this-> m_model->get_data('mapel')->result();
		$this->load->view('page/mapel', $data);
	}
    public function tambah_mapel()
	{
		$this->load->view('action/tambah_mapel');
	}
    public function ubah_mapel($id)
	{
        $data['mapel'] = $this-> m_model->get_by_id('mapel' , 'id' , $id)->result();
		$this->load->view('action/ubah_mapel',$data);
	}

    public function  hapus_mapel($id) {
        $this -> m_model->delete('mapel' , 'id' , $id);
        redirect(base_url('mapel'));
    }
    public function aksi_tambah_mapel()
    {
        $data = [
            'nama_mapel' => $this->input->post('nama'),
        ];

        $this->m_model->add('mapel', $data);
        redirect(base_url('mapel'));
    }

    public function aksi_ubah_mapel()
    {
        $data =  [
            'nama_mapel' => $this->input->post('nama'),
        ];
        $eksekusi = $this->m_model->update('mapel', $data, array('id'=>$this->input->post('id')));
        if($eksekusi) {
            $this->session->set_flashdata('sukses' , 'berhasil');
            redirect(base_url('mapel'));
        } else {
            $this->session->set_flashdata('error' , 'gagal...');
            redirect(base_url('mapel/ubah_mapel/'.$this->input->post('id')));
        }
    }
}