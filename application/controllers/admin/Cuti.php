<?php

class Cuti extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model(array('Model'));

        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Anda belum login!</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
            redirect('admin/auth');
        }
    }
    public function index()
    {
        $data['title'] = "History Pengajuan";
        $data['cuti'] = $this->db->query("SELECT * FROM data_cuti 
        JOIN pegawai on pegawai.nip = data_cuti.nip
        WHERE data_cuti.status='0'")->result();
        $data['cut'] = $this->db->query("SELECT * FROM data_cuti 
        INNER JOIN pegawai ON data_cuti.nip = pegawai.nip
        ORDER BY data_cuti.id DESC")->result();
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/cuti/index', $data);
        $this->load->view('layout/admin/footer');
    }

    public function approve($id)
    {
        $this->db->update('data_cuti', ['status' => '1'], ['nip' => $id]);
        $_SESSION["sukses"] = 'Berhasil menerima pengajuan ini.';
        redirect('admin/cuti');
    }

    public function reject($id)
    {
        $this->db->update('data_cuti', ['status' => '2'], ['nip' => $id]);
        $_SESSION["sukses"] = 'Berhasil menolak pengajuan ini.';
        redirect('admin/cuti');
    }
}
