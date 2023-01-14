<?php

class Absensi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Anda belum login!</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = "Histori Absensi";
        $data['data'] = $this->model->absensi_pegawai($this->session->userdata('nip'))->result();
        $this->load->view('layout/user/header', $data);
        $this->load->view('user/absensi/list', $data);
        $this->load->view('layout/user/footer');
    }
}
