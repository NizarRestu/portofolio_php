<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
        $data['siswa'] = $this-> m_model->get_data('siswa')->num_rows();
        $data['kelas'] = $this-> m_model->get_data('kelas')->num_rows();
        $data['guru'] = $this-> m_model->get_data('guru')->num_rows();
        $data['mapel'] = $this-> m_model->get_data('mapel')->num_rows();
		$this->load->view('page/dashboard', $data);
	}

}