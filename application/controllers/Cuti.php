<?php

class Cuti extends CI_Controller
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
        $data['title'] = "Histori Cuti";
        $nip = $this->session->userdata('nip');
        $detail_cuti = $this->model->detail_cuti();
        $data['detail_cuti'] = $detail_cuti;
        $data['cut'] = $this->db->query("SELECT data_cuti.nip,data_cuti.jenis_cuti,
        data_cuti.foto,data_cuti.alasan,data_cuti.status,data_cuti.waktu_pengajuan,
        data_cuti.waktu_selesai,pegawai.nip,pegawai.nama
        FROM data_cuti
        INNER JOIN pegawai ON data_cuti.nip = pegawai.nip
        WHERE data_cuti.nip='$nip'
        ORDER BY data_cuti.id DESC")->result();
        $this->load->view('layout/user/header', $data);
        $this->load->view('user/cuti/list', $data);
        $this->load->view('layout/user/footer');
    }

    public function ajukan()
    {
        $nip                        = $this->input->post('nip');
        $jenis_cuti                 = $this->input->post('jenis_cuti');
        $alasan                     = $this->input->post('alasan');
        $status                     = $this->input->post('status');
        $waktu_pengajuan            = $this->input->post('waktu_pengajuan');
        $waktu_selesai              = $this->input->post('waktu_selesai');
        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path']      = './assets/foto';
            $config['allowed_types']    = 'pdf';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                $_SESSION["invalid"] = 'Bukti hanya bisa diunggah dalam format pdf.';
                redirect('cuti');
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nip'               => $this->session->userdata('nip'),
            'jenis_cuti'        => $jenis_cuti,
            'alasan'            => $alasan,
            'status'            => $status,
            'waktu_pengajuan'   => $waktu_pengajuan,
            'waktu_selesai'     => $waktu_selesai,
            'foto'              => $foto

        );

        $this->model->insert($data, 'data_cuti');
        $_SESSION["sukses"] = 'Pengajuan anda segera di proses.';
        redirect('cuti');
    }
}
