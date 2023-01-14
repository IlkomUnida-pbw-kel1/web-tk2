<?php

class Kecamatan extends CI_Controller
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
        $data['title'] = "Kecamatan";
        $data['kabupaten'] = $this->model->get('kabupaten')->result();
        $data['cuti'] = $this->db->query("SELECT * FROM data_cuti 
        JOIN pegawai on pegawai.nip = data_cuti.nip
        WHERE data_cuti.status='0'")->result();
        $data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan 
        join kabupaten on kabupaten.id_kabupaten = kecamatan.id_kabupaten
        ORDER BY kecamatan.id_kecamatan ASC")->result();
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/kecamatan/index', $data);
        $this->load->view('layout/admin/footer');
    }

    public function proses_tambah()
    {
        $id_kabupaten     = $this->input->post('id_kabupaten');
        $kecamatan        = $this->input->post('kecamatan');

        $data = array(
            'id_kabupaten'    => $id_kabupaten,
            'kecamatan'       => $kecamatan
        );

        $this->model->insert($data, 'kecamatan');
        $_SESSION["sukses"] = 'Berhasil menambah data.';
        redirect('admin/kecamatan');
    }

    public function update()
    {
        $id_kecamatan   = $this->input->post('id_kecamatan');
        $id_kabupaten    = $this->input->post('id_kabupaten');
        $kecamatan      = $this->input->post('kecamatan');

        $data = array(
            'id_kabupaten'   => $id_kabupaten,
            'kecamatan'     => $kecamatan
        );

        $where = array(
            'id_kecamatan' => $id_kecamatan
        );
        $this->model->update('kecamatan', $data, $where);
        $_SESSION["sukses"] = 'Berhasil mengubah data.';
        redirect('admin/kecamatan');
    }

    public function delete($id)
    {
        $where = array('id_kecamatan' => $id);
        $this->model->delete($where, 'kecamatan');
        $_SESSION["sukses"] = 'Berhasil menghapus data.';
        redirect('admin/kecamatan');
    }
}
