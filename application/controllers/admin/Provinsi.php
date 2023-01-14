<?php

class Provinsi extends CI_Controller
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
        $data['title'] = "Provinsi";
        $data['cuti'] = $this->db->query("SELECT * FROM data_cuti 
        JOIN pegawai on pegawai.nip = data_cuti.nip
        WHERE data_cuti.status='0'")->result();
        $data['provinsi'] = $this->db->query("SELECT * FROM provinsi ORDER BY provinsi.id_provinsi ASC")->result();
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/provinsi/index', $data);
        $this->load->view('layout/admin/footer');
    }

    public function proses_tambah()
    {
        $provinsi        = $this->input->post('provinsi');

        $data = array(

            'provinsi'       => $provinsi
        );

        $this->model->insert($data, 'provinsi');
        $_SESSION["sukses"] = 'Berhasil menambah data.';
        redirect('admin/provinsi');
    }

    public function update()
    {
        $id_provinsi    = $this->input->post('id_provinsi');
        $provinsi       = $this->input->post('provinsi');

        $data = array(
            'provinsi' => $provinsi
        );

        $where = array(
            'id_provinsi' => $id_provinsi
        );
        $this->model->update('provinsi', $data, $where);
        $_SESSION["sukses"] = 'Berhasil mengubah data.';
        redirect('admin/provinsi');
    }

    public function delete($id)
    {
        $where = array('id_provinsi' => $id);
        $this->model->delete($where, 'provinsi');
        $_SESSION["sukses"] = 'Berhasil menghapus data.';
        redirect('admin/provinsi');
    }
}
