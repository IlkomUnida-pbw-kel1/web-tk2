<?php

class Payroll extends CI_Controller
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
        $data['title'] = "Histori Gaji";
        $id = $this->session->userdata('id_pegawai');

        // status semua
        $data['all'] = $this->db->query("SELECT * FROM payroll
        INNER JOIN pegawai ON pegawai.id_pegawai = payroll.id_pegawai
        join jabatan on jabatan.nama_jabatan = payroll.nama_jabatan
        WHERE payroll.id_pegawai='$id'
        ORDER BY payroll.id_payroll DESC")->result();

        $this->load->view('layout/user/header', $data);
        $this->load->view('user/payrol/index', $data);
        $this->load->view('layout/user/footer');
    }

    public function payslip($id)
    {
        $data['title'] = "Slip Gaji";
        $data['slip'] = $this->db->query("SELECT * FROM payroll
        INNER JOIN pegawai ON pegawai.id_pegawai = payroll.id_pegawai
        JOIN jabatan ON jabatan.nama_jabatan = payroll.nama_jabatan
        WHERE payroll.id_payroll='$id'")->result();
        $this->load->view('layout/user/header', $data);
        $this->load->view('user/payrol/slip', $data);
        $this->load->view('layout/user/footer');
    }

    public function confirm($id)
    {
        $this->db->update('payroll', ['status' => '1'], ['id_pegawai' => $id]);
        redirect('payroll');
    }
}
