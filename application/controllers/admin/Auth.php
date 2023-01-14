<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login Account';
            $this->load->view('admin/login/index', $data);
        } else {
            $username     = $this->input->post('username');
            $password     = $this->input->post('password');

            $cek = $this->model->cek_login($username, $password);

            if ($cek == FALSE) {
                $_SESSION["invalid"] = 'Invalid your cardentials, please check your account.';
                redirect('admin/auth');
            } else {
                $this->session->set_userdata('nama_admin', $cek->nama_admin);
                $this->session->set_userdata('admin_id', $cek->admin_id);
                $this->session->set_userdata('username', $cek->username);
                $this->session->set_userdata('role_id', $cek->role_id);
                switch ($cek->role_id) {
                    case 1:
                        redirect('admin/home/index');
                        break;

                    default:
                        break;
                }
            }
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
    }

    public function logout()
    {
        session_destroy();
        $url = base_url('admin/auth');
        redirect($url);
    }
}
