<?php

class Pegawai extends CI_Controller
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
        $data['title'] = "Pegawai";
        $data['cuti'] = $this->db->query("SELECT * FROM data_cuti 
        JOIN pegawai on pegawai.nip = data_cuti.nip
        WHERE data_cuti.status='0'")->result();
        $data['pegawai'] = $this->db->query("SELECT * FROM pegawai")->result();
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/pegawai/index', $data);
        $this->load->view('layout/admin/footer');
    }

    public function detail($id)
    {
        $data['title'] = "Detail Informasi Pegawai";
        $data['cuti'] = $this->db->query("SELECT * FROM data_cuti 
        JOIN pegawai on pegawai.nip = data_cuti.nip
        WHERE data_cuti.status='0'")->result();
        $where = array('id_pegawai' => $id);
        $data['detail'] = $this->db->query("SELECT * FROM pegawai 
        JOIN provinsi ON provinsi.id_provinsi = pegawai.provinsi
        JOIN kabupaten ON kabupaten.id_kabupaten = pegawai.kabupaten
        JOIN kecamatan ON kecamatan.id_kecamatan = pegawai.kecamatan
        JOIN jabatan ON jabatan.id_jabatan = pegawai.id_jabatan
        JOIN bagian ON bagian.id_bagian = pegawai.id_bagian
        WHERE id_pegawai='$id'")->result();
        $data['pay'] = $this->db->query("SELECT * FROM payroll
        INNER JOIN pegawai ON pegawai.id_pegawai = payroll.id_pegawai
        INNER JOIN jabatan ON jabatan.nama_jabatan = payroll.nama_jabatan
        WHERE pegawai.id_pegawai='$id'
        ORDER BY id_payroll DESC")->result();
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/pegawai/detail', $data);
        $this->load->view('layout/admin/footer');
    }

    function getdatakabupaten()
    {
        $id_provinsi = $this->input->post('provinsi');

        $getdatakab = $this->model->getdatakab($id_provinsi);

        echo json_encode($getdatakab);
    }

    function getdatakecamatan()
    {
        $id_kabupaten = $this->input->post('kabupaten');

        $getdatakec = $this->model->getdatakec($id_kabupaten);

        echo json_encode($getdatakec);
    }

    public function tambah()
    {
        $data['title'] = "Form aktivasi pegawai";
        $data['cuti'] = $this->db->query("SELECT * FROM data_cuti 
        JOIN pegawai on pegawai.nip = data_cuti.nip
        WHERE data_cuti.status='0'")->result();
        $getdata = $this->model->getdataprov('');
        $data['prov'] = $getdata;
        $data['jabatan'] = $this->model->get('jabatan')->result();
        $data['bagian'] = $this->model->get('bagian')->result();
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/pegawai/tambah', $data);
        $this->load->view('layout/admin/footer');
    }

    public function proses_tambah()
    {
        $this->form_validation->set_rules('nik', 'NIK KTP', 'required');
        $this->form_validation->set_rules('nama', 'Nama lengkap', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nip', 'NIP pegawai', 'required');
        $this->form_validation->set_rules('no_rek', 'Nomor rekening', 'required');
        $this->form_validation->set_rules('nama_rek', 'Nama rekening', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pegawai.email]', [
            'is_unique' => 'Email ini sudah digunakan!'
        ]);
        $this->form_validation->set_rules('no_hp', 'Nomor telp', 'required|trim|numeric');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|matches[confpassword]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!',
        ]);
        $this->form_validation->set_rules('confpassword', 'Confirm Password', 'required|trim|matches[password]');

        $this->form_validation->set_message('required', '{field} wajib diisi');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/pegawai/tambah');
        } else {
            $email      = $this->input->post('email', true);
            $photo      = $_FILES['photo']['name'];
            if ($photo = '') {
            } else {
                $config['upload_path']     = './assets/photo';
                $config['allowed_types']     = 'jpg|jpeg|png';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('photo')) {
                    $_SESSION["invalid"] = 'Mohon periksa tipe file yang anda upload.';
                    redirect('admin/pegawai/tambah');
                } else {
                    $photo = $this->upload->data('file_name');
                }
            }
            $data = [
                'nik'               => $this->input->post('nik'),
                'nama'              => $this->input->post('nama'),
                'tempat_lahir'      => $this->input->post('tempat_lahir'),
                'tgl_lahir'         => $this->input->post('tgl_lahir'),
                'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
                'alamat'            => $this->input->post('alamat'),
                'provinsi'          => $this->input->post('provinsi'),
                'kabupaten'         => $this->input->post('kabupaten'),
                'kecamatan'         => $this->input->post('kecamatan'),
                'agama'             => $this->input->post('agama'),
                'status_nikah'      => $this->input->post('status_nikah'),
                'warga_negara'      => $this->input->post('warga_negara'),
                'nip'               => $this->input->post('nip'),
                'status_pegawai'    => $this->input->post('status_pegawai'),
                'tgl_masuk'         => $this->input->post('tgl_masuk'),
                'id_jabatan'        => $this->input->post('id_jabatan'),
                'id_bagian'         => $this->input->post('id_bagian'),
                'no_rek'            => $this->input->post('no_rek'),
                'nama_rek'          => $this->input->post('nama_rek'),
                'email'             => htmlspecialchars($email),
                'no_hp'             => $this->input->post('no_hp'),
                'username'          => $this->input->post('username'),
                'password'          => md5($this->input->post('password')),
                'photo'             => $photo,
                'role_id'           => 2,
            ];

            $this->db->insert('pegawai', $data);
            $_SESSION["sukses"] = 'Berhasil menambah data.';
            redirect('admin/pegawai/index');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit pegawai';
        $where = array('id_pegawai' => $id);
        $data['pegawai'] = $this->db->query("SELECT * FROM pegawai 
        join provinsi on provinsi.id_provinsi = pegawai.provinsi
        join kabupaten on kabupaten.id_kabupaten = pegawai.kabupaten
        join kecamatan on kecamatan.id_kecamatan = pegawai.kecamatan
        WHERE id_pegawai='$id'")->result();
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/pegawai/edit', $data);
        $this->load->view('layout/admin/footer');
    }

    public function proses_edit()
    {
        $id_pegawai     = $this->input->post('id_pegawai');
        $nik            = $this->input->post('nik');
        $email          = $this->input->post('email');
        $no_hp          = $this->input->post('no_hp');
        $nama           = $this->input->post('nama');
        $tempat_lahir   = $this->input->post('tempat_lahir');
        $tgl_lahir      = $this->input->post('tgl_lahir');
        $jenis_kelamin  = $this->input->post('jenis_kelamin');
        $agama          = $this->input->post('agama');
        $status_nikah   = $this->input->post('status_nikah');
        $warga_negara   = $this->input->post('warga_negara');
        $no_rek         = $this->input->post('no_rek');
        $nama_rek       = $this->input->post('nama_rek');

        $data = array(
            'nik'           => $nik,
            'nama'          => $nama,
            'tempat_lahir'  => $tempat_lahir,
            'tgl_lahir'     => $tgl_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'agama'         => $agama,
            'email'         => $email,
            'no_hp'         => $no_hp,
            'status_nikah'  => $status_nikah,
            'warga_negara'  => $warga_negara,
            'no_rek'        => $no_rek,
            'nama_rek'      => $nama_rek
        );

        $where = array(
            'id_pegawai'     => $id_pegawai
        );
        $this->model->update('pegawai', $data, $where);
        $_SESSION["sukses"] = 'Berhasil mengubah data.';
        redirect('admin/pegawai');
    }

    public function delete($id)
    {
        $where = array('id_pegawai' => $id);
        $this->model->delete($where, 'pegawai');
        $_SESSION["sukses"] = 'Berhasil menghapus data.';
        redirect('admin/pegawai');
    }
}
