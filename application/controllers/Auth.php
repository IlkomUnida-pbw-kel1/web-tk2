<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login Account';
            $this->load->view('user/login/index', $data);
        } else {
            $username     = $this->input->post('username');
            $password     = $this->input->post('password');

            $cek = $this->model->cek_auth($username, $password);

            if ($cek == FALSE) {
                $_SESSION["invalid"] = 'Invalid your cardentials, please check your account.';
                redirect('auth');
            } else {
                $this->session->set_userdata('nama', $cek->nama);
                $this->session->set_userdata('nip', $cek->nip);
                $this->session->set_userdata('email', $cek->email);
                $this->session->set_userdata('photo', $cek->photo);
                $this->session->set_userdata('id_pegawai', $cek->id_pegawai);
                $this->session->set_userdata('role_id', $cek->role_id);
                switch ($cek->role_id) {
                    case 2:
                        redirect('dashboard');
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
        $url = base_url('auth');
        redirect($url);
    }
}
