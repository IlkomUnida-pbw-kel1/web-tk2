<?php

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

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
        $data['title'] = "Dashboard";
        $data['chart'] = $this->model->chart();
        $data['cuti'] = $this->db->query("SELECT * FROM data_cuti 
        JOIN pegawai on pegawai.nip = data_cuti.nip
        WHERE data_cuti.status='0'")->result();

        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/home/index', $data);
        $this->load->view('layout/admin/footer');
    }

    public function confirm($id)
    {
        $this->db->update('data_admin', ['hak_akses' => '2'], ['nik' => $id]);
        $this->session->set_flashdata('message', 'swal("Berhasil!", "Menerima akses admin", "success");');
        redirect('admin/Beranda');
    }

    public function tolak($id)
    {
        $where = array('id_pegawai' => $id);
        $this->penggajianModel->delete_data($where, 'data_admin');
        $this->session->set_flashdata('message', 'swal("Berhasil!", "Menolak data akses admin", "success");');
        redirect('admin/Beranda');
    }

    public function tolakk($id)
    {
        $this->db->update('data_admin', ['hak_akses' => '3'], ['nik' => $id]);
        $this->session->set_flashdata('message', 'swal("Berhasil!", "Menolak pengajuan cuti", "success");');
        redirect('admin/Beranda');
    }

    public function confirmm($id)
    {
        $data['admin'] = $this->db->query("SELECT * FROM data_admin WHERE id_pegawai='$id'")->result();
        $data['title'] = "Tambah Data User";
        $detail_admin = $this->penggajianModel->detail_admin($id);
        $data['detail_admin'] = $detail_admin;
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/confirm', $data);
        $this->load->view('templates_admin/footer');
    }

    public function updateAksi()
    {
        $id_pegawai      = $this->input->post('id_pegawai');
        $nik      = $this->input->post('nik');
        $nama_pegawai         = $this->input->post('nama_pegawai');
        $username         = $this->input->post('username');
        $hak_akses         = $this->input->post('hak_akses');

        $data = array(
            'nik'   => $nik,
            'nama_pegawai'      => $nama_pegawai,
            'username'      => $username,
            'hak_akses'      => $hak_akses
        );

        $where = array(
            'id_pegawai' => $id_pegawai
        );
        $this->penggajianModel->update_data('data_admin', $data, $where);
        redirect('admin/Dashboard');
    }
}
