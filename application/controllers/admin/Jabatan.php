<?php

class Jabatan extends CI_Controller
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
        $data['title'] = "Jabatan";
        $data['cuti'] = $this->db->query("SELECT * FROM data_cuti 
        JOIN pegawai on pegawai.nip = data_cuti.nip
        WHERE data_cuti.status='0'")->result();
        $data['jabatan'] = $this->db->query("SELECT * FROM jabatan ORDER BY jabatan.id_jabatan ASC")->result();
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/jabatan/index', $data);
        $this->load->view('layout/admin/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Jabatan";
        $data['cuti'] = $this->db->query("SELECT * FROM data_cuti 
        JOIN pegawai on pegawai.nip = data_cuti.nip
        WHERE data_cuti.status='0'")->result();
        $data['action'] = 'admin/jabatan/proses_tambah';
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/jabatan/tambah', $data);
        $this->load->view('layout/admin/footer');
    }

    public function proses_tambah()
    {
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'trim|required');
        $this->form_validation->set_rules('gaji_pokok', 'Gaji Pokok', 'required');
        $this->form_validation->set_rules('tunjangan', 'Tunjangan', 'required');
        $this->form_validation->set_rules('benefit1', 'Bennefit', 'required');

        $this->form_validation->set_message('required', '{field} wajib diisi');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'nama_jabatan'  => $this->input->post('nama_jabatan'),
                'gaji_pokok'    => $this->input->post('gaji_pokok'),
                'tunjangan'     => $this->input->post('tunjangan'),
                'benefit1'     => $this->input->post('benefit1'),
                'benefit2'     => $this->input->post('benefit2'),
                'benefit3'     => $this->input->post('benefit3'),
            );

            $this->db->insert('jabatan', $data);
            $_SESSION["sukses"] = 'Berhasil menambah data.';
            redirect('admin/jabatan/index');
        }
    }

    public function update()
    {
        $id_jabatan     = $this->input->post('id_jabatan');
        $nama_jabatan   = $this->input->post('nama_jabatan');
        $gaji_pokok     = $this->input->post('gaji_pokok');
        $tunjangan      = $this->input->post('tunjangan');

        $data = array(
            'nama_jabatan'   => $nama_jabatan,
            'gaji_pokok'     => $gaji_pokok,
            'tunjangan'      => $tunjangan,
        );

        $where = array(
            'id_jabatan' => $id_jabatan
        );
        $this->model->update('jabatan', $data, $where);
        $_SESSION["sukses"] = 'Berhasil mengubah data.';
        redirect('admin/jabatan');
    }

    public function delete($id)
    {
        $where = array('id_jabatan' => $id);
        $this->model->delete($where, 'jabatan');
        $_SESSION["sukses"] = 'Berhasil menghapus data.';
        redirect('admin/jabatan');
    }
}
