<?php

class laporan_cuti extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // library ci
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model(array('Model'));

        // jika role tidak sesuai maka akan di lempar ke halaman login
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
        $dari          = $this->input->post('dari');
        $sampai        = $this->input->post('sampai');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Rekap Berdasarkan Tanggal";

            // menampilkan notifikasi pengajuan cuti
            $data['cuti'] = $this->db->query("SELECT * FROM data_cuti 
            JOIN pegawai on pegawai.nip = data_cuti.nip
            WHERE data_cuti.status='0'")->result();

            // menampilkan all data
            $data['data'] = $this->db->query("SELECT * FROM data_cuti 
            JOIN pegawai on pegawai.nip = data_cuti.nip")->result();
            $this->load->view('layout/admin/header', $data);
            $this->load->view('admin/laporan/cuti/index', $data);
            $this->load->view('layout/admin/footer');
        } else {
            // page pencarian data
            $data['title'] = "Rekap Berdasarkan Tanggal";

            // menampilkan notifikasi pengajuan cuti
            $data['cuti'] = $this->db->query("SELECT * FROM data_cuti 
            JOIN pegawai on pegawai.nip = data_cuti.nip
            WHERE data_cuti.status='0'")->result();

            // menampilkan data berdasarkan range tanggal pencarian
            $data['data'] = $this->db->query("SELECT * FROM data_cuti 
            JOIN pegawai on pegawai.nip = data_cuti.nip
            WHERE waktu_pengajuan AND date(waktu_pengajuan) >= '$dari' AND  date(waktu_pengajuan) <= '$sampai'")->result();
            $this->load->view('layout/admin/header', $data);
            $this->load->view('admin/laporan/cuti/search', $data);
            $this->load->view('layout/admin/footer');
        }
    }

    public function print()
    {
        // funsgi cetak semua data cuti
        $data['data'] = $this->db->query("SELECT * FROM data_cuti 
        JOIN pegawai on pegawai.nip = data_cuti.nip")->result();
        $this->load->view('admin/laporan/cuti/laporan_all', $data);
    }

    public function report($id)
    {
        // fungsi cetak data cuti berdasarkan id
        $where = array('id_absen' => $id);
        $data['by'] = $this->db->query("SELECT * FROM data_cuti 
        JOIN pegawai on pegawai.nip = data_cuti.nip
        WHERE data_cuti.id='$id'")->result();
        $this->load->view('admin/laporan/cuti/laporan_by_id', $data);
    }

    public function _rules()
    {
        // fungsi form rules pencarian data
        $this->form_validation->set_rules('dari', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'required');
    }
}
