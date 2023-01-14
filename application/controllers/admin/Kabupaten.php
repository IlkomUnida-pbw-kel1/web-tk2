<?php

class Kabupaten extends CI_Controller
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
        $data['title'] = "Kabupaten";
        $data['provinsi'] = $this->model->get('provinsi')->result();
        $data['cuti'] = $this->db->query("SELECT * FROM data_cuti 
        JOIN pegawai on pegawai.nip = data_cuti.nip
        WHERE data_cuti.status='0'")->result();
        $data['kabupaten'] = $this->db->query("SELECT * FROM kabupaten 
        JOIN provinsi on provinsi.id_provinsi = kabupaten.id_provinsi
        ORDER BY kabupaten.id_kabupaten ASC")->result();
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/kabupaten/index', $data);
        $this->load->view('layout/admin/footer');
    }

    public function proses_tambah()
    {
        $id_provinsi        = $this->input->post('id_provinsi');
        $kabupaten        = $this->input->post('kabupaten');

        $data = array(
            'id_provinsi'       => $id_provinsi,
            'kabupaten'       => $kabupaten
        );

        $this->model->insert($data, 'kabupaten');
        $_SESSION["sukses"] = 'Berhasil menambah data.';
        redirect('admin/kabupaten');
    }

    public function update()
    {
        $id_kabupaten   = $this->input->post('id_kabupaten');
        $id_provinsi    = $this->input->post('id_provinsi');
        $kabupaten      = $this->input->post('kabupaten');

        $data = array(
            'id_provinsi'   => $id_provinsi,
            'kabupaten'     => $kabupaten
        );

        $where = array(
            'id_kabupaten' => $id_kabupaten
        );
        $this->model->update('kabupaten', $data, $where);
        $_SESSION["sukses"] = 'Berhasil mengubah data.';
        redirect('admin/kabupaten');
    }

    public function delete($id)
    {
        $where = array('id_kabupaten' => $id);
        $this->model->delete($where, 'kabupaten');
        $_SESSION["sukses"] = 'Berhasil menghapus data.';
        redirect('admin/kabupaten');
    }
}
