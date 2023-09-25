<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        $this->load->library('form_validation');
    }

    public function login()
    {
        $this->load->view('auth/login');
    }

    public function register()
    {
        $this->load->view('auth/register');
    }

    public function aksi_register()
    {
        $email = $this->input->post('email', true);
        $data = ['email' => $email];
        $password = $this->input->post('password');
        $username = $this->input->post('username');
        $query = $this->m_model->getwhere('admin', $data);
        $result = $query->row_array();
        if (empty($result)) {
            if (strlen($password) <= 8) {
                redirect(base_url('auth/register'));
            } else {
                $data = [
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                ];

                $this->m_model->add('admin', $data);
                $this->session->sess_destroy();
                redirect(base_url('auth/login'));
            }
        } else {
            $this->session->set_flashdata('message_email' , 'gagal...');
            redirect(base_url('auth/register'));
        }

    }
    public function aksi_login()
    {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        $data = ['email' => $email];
        $query = $this->m_model->getwhere('admin', $data);
        $result = $query->row_array();
        if (!empty($result) && md5($password) === $result['password']) {
            $data = [
                'logged_in' => true,
                'email' => $result['email'],
                'username' => $result['username'],
                'id' => $result['id'],

            ];
            $this->session->set_userdata($data);
                redirect(base_url() . "dashboard");
        } else {
            $this->session->set_flashdata('error' , 'error ');
            redirect(base_url() . "auth/login");
        }
    }
	public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'auth/login');
    }

}
