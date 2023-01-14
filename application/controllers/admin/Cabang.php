<?php

class Cabang extends CI_Controller
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
        $data['title'] = "Cabang";
        $data['cuti'] = $this->db->query("SELECT * FROM data_cuti 
        JOIN pegawai on pegawai.nip = data_cuti.nip
        WHERE data_cuti.status='0'")->result();
        $data['cabang'] = $this->db->query("SELECT * FROM cabang ORDER BY cabang.id_cabang ASC")->result();
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/cabang/index', $data);
        $this->load->view('layout/admin/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Cabang";
        $data['cuti'] = $this->db->query("SELECT * FROM data_cuti 
        JOIN pegawai on pegawai.nip = data_cuti.nip
        WHERE data_cuti.status='0'")->result();
        $data['action'] = 'admin/cabang/proses_tambah';
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/cabang/tambah', $data);
        $this->load->view('layout/admin/footer');
    }

    public function proses_tambah()
    {
        $this->form_validation->set_rules('nama_cabang', 'Nama Cabang', 'required');

        $this->form_validation->set_message('required', '{field} wajib diisi');

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'nama_cabang'  => $this->input->post('nama_cabang'),
            );

            $this->db->insert('cabang', $data);
            $this->session->set_flashdata('message', '  <div class="alert alert-success alert-dismissible alert-alt fade show">
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button>
            <strong>Please</strong> berhasil menambah data.
            </div>');
            redirect('admin/cabang/index');
        }
    }

    public function update()
    {
        $id_cabang     = $this->input->post('id_cabang');
        $nama_cabang   = $this->input->post('nama_cabang');

        $data = array(
            'nama_cabang'   => $nama_cabang,
        );

        $where = array(
            'id_cabang' => $id_cabang
        );
        $this->model->update('cabang', $data, $where);
        $this->session->set_flashdata('message', '  <div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Please</strong> berhasil mengubah data.
        </div>');
        redirect('admin/cabang');
    }

    public function delete($id)
    {
        $where = array('id_cabang' => $id);
        $this->model->delete($where, 'cabang');
        $this->session->set_flashdata('message', '  <div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Please</strong> berhasil menghapus data.
        </div>');
        redirect('admin/cabang');
    }
}
