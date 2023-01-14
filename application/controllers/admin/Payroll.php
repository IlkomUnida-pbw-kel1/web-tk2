<?php

class Payroll extends CI_Controller
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
        date_default_timezone_set('asia/jakarta');
    }
    public function index()
    {
        $data['title'] = "Payroll";
        $data['data'] = $this->db->query("SELECT * FROM payroll
        INNER JOIN pegawai ON pegawai.id_pegawai = payroll.id_pegawai
        JOIN jabatan on jabatan.nama_jabatan = payroll.nama_jabatan
        ORDER BY payroll.id_payroll DESC")->result();
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/payrol/index', $data);
        $this->load->view('layout/admin/footer');
    }

    function get_jabatan()
    {
        $id_jabatan = $this->input->post('id_jabatan');
        $data = $this->model->get_jabatan_kode($id_jabatan);
        echo json_encode($data);
    }

    function get_pegawai()
    {
        $id_pegawai = $this->input->post('id_pegawai');
        $data = $this->model->get_pegawai_kode($id_pegawai);
        echo json_encode($data);
    }

    public function tambah()
    {
        $data['title'] = "Pembayaran Gaji";
        $data['pegawai'] = $this->model->get('pegawai')->result();
        $data['jabatan'] = $this->model->get('jabatan')->result();
        $data['bagian'] = $this->model->get('bagian')->result();
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/payrol/add', $data);
        $this->load->view('layout/admin/footer');
    }

    public function simpan()
    {
        $kode_payroll = $this->input->post('kode_payroll');
        $tgl_payroll = $this->input->post('tgl_payroll');
        $waktu_payroll = $this->input->post('waktu_payroll');
        $id_pegawai = $this->input->post('id_pegawai');
        $nama_jabatan = $this->input->post('nama_jabatan');
        $nama_bagian = $this->input->post('nama_bagian');
        $hadir = $this->input->post('hadir');
        $sakit = $this->input->post('sakit');
        $alpha = $this->input->post('alpha');
        $telat = $this->input->post('telat');
        $status = $this->input->post('status');
        $channel_bayar = $this->input->post('channel_bayar');

        $this->load->library('ciqrcode'); //pemanggilan library QR CODE

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/qrcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $image_name = $kode_payroll . '.png'; //buat name dari qr code sesuai dengan kode payroll

        $params['data'] = $kode_payroll; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        $this->model->insert_payrol($kode_payroll, $tgl_payroll, $waktu_payroll, $id_pegawai, $nama_jabatan, $nama_bagian, $hadir, $sakit, $alpha, $telat, $status, $channel_bayar, $image_name); //simpan ke database
        $_SESSION["sukses"] = 'Berhasil menambah data.';
        redirect('admin/payroll'); //redirect ke halaman payroll usai simpan data
    }

    public function payslip($id)
    {
        $data['title'] = "Slip Gaji Karyawan";
        $data['slip'] = $this->db->query("SELECT * FROM payroll
        INNER JOIN pegawai ON pegawai.id_pegawai = payroll.id_pegawai
        INNER JOIN jabatan ON jabatan.nama_jabatan = payroll.nama_jabatan
        WHERE payroll.id_payroll='$id'")->result();
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/payrol/slip', $data);
        $this->load->view('layout/admin/footer');
    }
}
