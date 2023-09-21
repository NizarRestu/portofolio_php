<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
        $data['admin'] = $this-> m_model->get_by_id('admin' , 'id' ,$this->session->userdata('id') )->result();
		$this->load->view('page/profile', $data);
	}
    public function upload_image()
{  
    $base64_image = $this->input->post('base64_image');

    $binary_image = base64_encode($base64_image);

    $data = array(
        'foto_profile' => $binary_image
    );

    $eksekusi = $this->m_model->update('admin', $data, array('id'=>$this->input->post('id')));
    if($eksekusi) {
        $this->session->set_flashdata('sukses' , 'berhasil');
        redirect(base_url('profile'));
        $data = [
            'image' => $binary_image,

        ];
        $this->session->set_userdata($data);

    } else {
        $this->session->set_flashdata('error' , 'gagal...');
       echo "error gais";
    }
}
}