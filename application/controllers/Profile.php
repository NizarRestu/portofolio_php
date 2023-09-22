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
    } else {
        $this->session->set_flashdata('error' , 'gagal...');
       echo "error gais";
    }
}

public function hapus_image()
{ 
    $data = array(
        'foto_profile' => NULL
    );

    $eksekusi = $this->m_model->update('admin', $data, array('id'=>$this->session->userdata('id')));
    if($eksekusi) {
        $this->session->set_flashdata('sukses' , 'berhasil');
        redirect(base_url('profile'));
    } else {
        $this->session->set_flashdata('error' , 'gagal...');
       echo "error gais";
    }
}
public function ubah_password($id)
{
    $data['admin'] = $this-> m_model->get_by_id('admin' , 'id' , $id)->result();
    $this->load->view('action/ubah_password',$data);
}

public function aksi_ubah_password()
{
    $password_lama = $this->input->post('password_lama', true);
    $password_baru = $this->input->post('password_baru', true);
    $password_baru2 = $this->input->post('password_baru2', true);
    $data = ['email' => $this->session->userdata('email')];
    $query = $this->m_model->getwhere('admin', $data);
    $result = $query->row_array();
    if (md5($password_lama) === $result['password']) {

        if ($password_baru === $password_baru2) {
            $data =  [
                'password' => md5($this->input->post('password_baru')),
            ];
            $eksekusi = $this->m_model->update('admin', $data, array('id'=> $this->session->userdata('id')));
            if($eksekusi) {
                $this->session->set_flashdata('sukses' , 'berhasil');
                redirect(base_url('profile'));
            } else {
                $this->session->set_flashdata('error' , 'gagal...');
                redirect(base_url('profile/ubah_profile/'.$this->session->userdata('id')));
            }
        }else {
            $this->session->set_flashdata('password_baru' , 'Password tidak cocok');
            redirect(base_url('profile/ubah_password/'.$this->session->userdata('id')));
        }
    } else {
        $this->session->set_flashdata('password_lama' , 'Password lama dengan inputan tidak cocok');
        redirect(base_url('profile/ubah_password/'.$this->session->userdata('id')));
    }
}

}