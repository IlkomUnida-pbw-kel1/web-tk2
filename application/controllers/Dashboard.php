<?php

class Dashboard extends CI_Controller
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
        date_default_timezone_set('asia/jakarta');
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        // mengambil session id pegawai
        $id = $this->session->userdata('id_pegawai');

        // menampilkan query data pegawai
        $data['pegawai'] = $this->db->query("SELECT * FROM pegawai 
        JOIN jabatan ON jabatan.id_jabatan = pegawai.id_jabatan
        JOIN bagian ON bagian.id_bagian = pegawai.id_bagian
        WHERE id_pegawai='$id'")->result();
        $tahun      = date('Y');
        $bulan      = date('m');
        $hari       = date('d');
        $absen      = $this->model->absendaily($this->session->userdata('nip'), $tahun, $bulan, $hari);
        if ($absen->num_rows() == 0) {
            $data['waktu'] = 'masuk';
        } elseif ($absen->num_rows() == 1) {
            $data['waktu'] = 'pulang';
        } else {
            $data['waktu'] = 'dilarang';
        }
        $detail_pegawai = $this->model->detail_pegawai($id);
        $data['detail_pegawai'] = $detail_pegawai;
        $data['absen'] = $this->db->query("SELECT * FROM absen
        JOIN pegawai on pegawai.nip = absen.nip
        WHERE id_pegawai='$id'
        ORDER BY absen.id_absen DESC LIMIT 2")->result();
        $this->load->view('layout/user/header', $data);
        $this->load->view('user/dashboard/index', $data);
        $this->load->view('layout/user/footer');
    }

    //proses absen
    public function proses_absen()
    {
        $id = $this->session->userdata('nip');
        $p = $this->input->post();
        $data = [
            'nip'    => $id,
            'keterangan' => $p['ket'],
            'estimated' => $p['by']
        ];
        $this->db->insert('absen', $data);
        $_SESSION["sukses"] = 'Berhasil melakukan absen';
        redirect('dashboard');
    }
}
