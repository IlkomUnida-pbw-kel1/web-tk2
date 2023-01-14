<?php

class Bagian extends CI_Controller
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
        $data['title'] = "Bagian";
        $data['cuti'] = $this->db->query("SELECT * FROM data_cuti 
        JOIN pegawai on pegawai.nip = data_cuti.nip
        WHERE data_cuti.status='0'")->result();
        $data['bagian'] = $this->db->query("SELECT * FROM bagian ORDER BY bagian.id_bagian ASC")->result();
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/bagian/index', $data);
        $this->load->view('layout/admin/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Bagian";
        $data['cuti'] = $this->db->query("SELECT * FROM data_cuti 
        JOIN pegawai on pegawai.nip = data_cuti.nip
        WHERE data_cuti.status='0'")->result();
        $data['action'] = 'admin/bagian/proses_tambah';
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/bagian/tambah', $data);
        $this->load->view('layout/admin/footer');
    }

    public function proses_tambah()
    {
        $this->form_validation->set_rules('nama_bagian', 'Nama Bagian', 'required');

        $this->form_validation->set_message('required', '{field} wajib diisi');

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'nama_bagian'  => $this->input->post('nama_bagian'),
            );

            $this->db->insert('bagian', $data);
            $_SESSION["sukses"] = 'Berhasil menambah data.';
            redirect('admin/bagian/index');
        }
    }

    public function update()
    {
        $id_bagian     = $this->input->post('id_bagian');
        $nama_bagian   = $this->input->post('nama_bagian');

        $data = array(
            'nama_bagian'   => $nama_bagian,
        );

        $where = array(
            'id_bagian' => $id_bagian
        );
        $this->model->update('bagian', $data, $where);
        $_SESSION["sukses"] = 'Berhasil mengubah data.';
        redirect('admin/bagian');
    }

    public function delete($id)
    {
        $where = array('id_bagian' => $id);
        $this->model->delete($where, 'bagian');
        $_SESSION["sukses"] = 'Berhasil menghapus data.';
        redirect('admin/bagian');
    }
}
