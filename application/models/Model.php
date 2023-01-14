<?php

class Model extends CI_Model
{

    public function get($table)
    {
        return $this->db->get($table);
    }

    public function chart()
    {
        $data = $this->db->query("SELECT COUNT(pegawai.id_pegawai) as total, jabatan.nama_jabatan
        FROM pegawai
        JOIN jabatan on jabatan.id_jabatan = pegawai.id_jabatan
        GROUP BY jabatan.nama_jabatan");
        return $data->result();
    }

    function graph()
    {
        $query = $this->db->query("SELECT COUNT(pegawai.id_pegawai) as total, jabatan.nama_jabatan
        FROM pegawai
        JOIN jabatan on jabatan.id_jabatan = pegawai.id_jabatan
        GROUP BY jabatan.nama_jabatan");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    public function sumlembur($nama)
    {
        return $this->db->query("SELECT sum(jml_lembur) AS jumlahlembur from data_lembur where nama_pegawai = '$nama'");
    }

    public function sumpinjaman($nama)
    {
        return $this->db->query("SELECT sum(jml_pinjaman) AS jumlahpinjaman from data_pinjaman where nama_pegawai = '$nama'");
    }

    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function getdataprov()
    {
        $query = $this->db->query("SELECT * FROM provinsi ORDER BY provinsi ASC");
        return $query->result();
    }

    public function getdatakab($id_provinsi)
    {
        $query = $this->db->query("SELECT * FROM kabupaten WHERE id_provinsi = '$id_provinsi' ORDER BY kabupaten ASC");
        return $query->result();
    }

    public function getdatakec($id_kabupaten)
    {
        $query = $this->db->query("SELECT * FROM kecamatan WHERE id_kabupaten = '$id_kabupaten' ORDER BY kecamatan ASC");
        return $query->result();
    }

    function get_jabatan_kode($id_jabatan)
    {
        $hsl = $this->db->query("SELECT * FROM jabatan WHERE id_jabatan='$id_jabatan'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'id_jabatan' => $data->id_jabatan,
                    'nama_jabatan' => $data->nama_jabatan,
                    'gaji_pokok' => $data->gaji_pokok,
                    'tunjangan' => $data->tunjangan,
                );
            }
        }
        return $hasil;
    }

    function get_pegawai_kode($id_pegawai)
    {
        $hsl = $this->db->query("SELECT * FROM pegawai 
        JOIN bagian ON bagian.id_bagian = pegawai.id_bagian 
        JOIN jabatan ON jabatan.id_jabatan = pegawai.id_jabatan 
        WHERE id_pegawai='$id_pegawai'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'id_pegawai' => $data->id_pegawai,
                    'no_rek' => $data->no_rek,
                    'nama_rek' => $data->nama_rek,
                    'nama_bagian' => $data->nama_bagian,
                    'nama_jabatan' => $data->nama_jabatan,
                    'gaji_pokok' => $data->gaji_pokok,
                    'tunjangan' => $data->tunjangan,
                    'channel_bayar' => 'Direct Bank Transfer',
                    'amount' => $data->gaji_pokok + $data->tunjangan
                );
            }
        }
        return $hasil;
    }

    public function edit_pegawai($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function insert_payrol($kode_payroll, $tgl_payroll, $waktu_payroll, $id_pegawai, $nama_jabatan, $nama_bagian, $hadir, $sakit, $alpha, $telat, $status, $channel_bayar, $image_name)
    {
        $data = array(
            'kode_payroll'          => $kode_payroll,
            'tgl_payroll'           => $tgl_payroll,
            'waktu_payroll'         => $waktu_payroll,
            'id_pegawai'            => $id_pegawai,
            'nama_jabatan'          => $nama_jabatan,
            'nama_bagian'           => $nama_bagian,
            'hadir'                 => $hadir,
            'sakit'                 => $sakit,
            'alpha'                 => $alpha,
            'telat'                 => $telat,
            'status'                => 1,
            'channel_bayar'         => $channel_bayar,
            'qr_code'               => $image_name
        );
        $this->db->insert('payroll', $data);
    }

    public function insert_batch($table = null, $data = array())
    {
        $jumlah = count($data);
        if ($jumlah > 0) {
            $this->db->insert_batch($table, $data);
        }
    }

    public function GetPie()
    {
        $query = $this->db->query("select * from data_jabatan;");
        return $query;
    }

    function fetch_data($query)
    {
        $this->db->select("*");
        $this->db->from("absen");
        $this->db->join('pegawai', 'pegawai.nip = absen.nip');
        if ($query != '') {
            $this->db->like('waktu', $query);
            $this->db->or_like('keterangan', $query);
        }
        $this->db->order_by('id_absen', 'DESC');
        return $this->db->get();
    }

    public function cek_login()
    {
        $username        = set_value('username');
        $password        = set_value('password');

        $result = $this->db->where('username', $username)
            ->where('password', md5($password))
            ->limit(1)
            ->get('admin');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return FALSE;
        }
    }

    public function cek_auth()
    {
        $username        = set_value('username');
        $password        = set_value('password');

        $result = $this->db->where('username', $username)
            ->where('password', md5($password))
            ->limit(1)
            ->get('pegawai');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return FALSE;
        }
    }

    public function detail_data($id = NULL)
    {
        $query = $this->db->get_where('data_pegawai', array('id_pegawai' => $id))->row();
        return $query;
    }

    public function detail_admin($id = NULL)
    {
        $query = $this->db->get_where('data_admin', array('id_pegawai' => $id))->row();
        return $query;
    }

    public function detail_jabatan($id = NULL)
    {
        $query = $this->db->get_where('data_jabatan', array('no_jabatan' => $id))->row();
        return $query;
    }

    public function detail_divisi($id = NULL)
    {
        $query = $this->db->get_where('data_divisi', array('no_divisi' => $id))->row();
        return $query;
    }

    public function detail_negara($id = NULL)
    {
        $query = $this->db->get_where('data_country', array('no_negara' => $id))->row();
        return $query;
    }

    public function detail_cuti($id = NULL)
    {
        $query = $this->db->get_where('data_cuti', array('id' => $id))->row();
        return $query;
    }

    public function detail_provinsi($id = NULL)
    {
        $query = $this->db->get_where('data_provinsi', array('no_provinsi' => $id))->row();
        return $query;
    }


    public function detail_pegawai($id = NULL)
    {
        $query = $this->db->get_where('pegawai', array('id_pegawai' => $id))->row();
        return $query;
    }

    public function detail_asuransi($id = NULL)
    {
        $query = $this->db->get_where('data_asuransi', array('no_asuransi' => $id))->row();
        return $query;
    }

    public function dataPegawai()
    {
        $this->db->select('*');
        $this->db->from('data_pegawai');
        $this->db->order_by('id_pegawai', 'asc');
        $data = $this->db->get('');
        return $data;
    }

    function pegawaiid($id)
    {
        $this->db->select('*');
        $this->db->from('data_pegawai');
        $this->db->where('data_pegawai.id_pegawai', $id);
        return $this->db->get();
    }

    public function cuti()
    {
        $this->db->select('*');
        $this->db->from('data_cuti');
        $this->db->join('data_pegawai', 'data_cuti.nama_pegawai = data_pegawai.nama_pegawai');
        $this->db->order_by('data_cuti.id', 'desc');
        return $this->db->get();
    }
    public function cuti_pegawai($id)
    {
        $this->db->select('*');
        $this->db->from('data_cuti');
        $this->db->join('data_pegawai', 'data_cuti.nik = data_pegawai.nik');
        $this->db->where('data_pegawai.nik', $id);
        $this->db->order_by('data_cuti.waktu_pengajuan', 'desc');
        return $this->db->get();
    }

    function absendaily($id, $tahun, $bulan, $hari)
    {
        $this->db->select('*');
        $this->db->from('absen');
        $this->db->where('nip', $id);
        $this->db->where('year(waktu)', $tahun);
        $this->db->where('month(waktu)', $bulan);
        $this->db->where('day(waktu)', $hari);
        return $this->db->get();
    }

    public function absen()
    {
        $this->db->select('*');
        $this->db->from('absen');
        $this->db->join('pegawai', 'absen.nip = pegawai.nip');
        $this->db->order_by('absen.waktu', 'desc');
        return $this->db->get();
    }

    public function absensi_pegawai($id)
    {
        $this->db->select('*');
        $this->db->from('absen');
        $this->db->join('pegawai', 'absen.nip = pegawai.nip');
        $this->db->where('pegawai.nip', $id);
        $this->db->order_by('absen.waktu', 'desc');
        return $this->db->get();
    }

    function hari($hari)
    {

        switch ($hari) {
            case 'Sun':
                $hari_ini = "Minggu";
                break;

            case 'Mon':
                $hari_ini = "Senin";
                break;

            case 'Tue':
                $hari_ini = "Selasa";
                break;

            case 'Wed':
                $hari_ini = "Rabu";
                break;

            case 'Thu':
                $hari_ini = "Kamis";
                break;

            case 'Fri':
                $hari_ini = "Jumat";
                break;

            case 'Sat':
                $hari_ini = "Sabtu";
                break;

            default:
                $hari_ini = "Tidak di ketahui";
                break;
        }

        return $hari_ini;
    }
    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
    function hadirtoday($tahun, $bulan, $hari)
    {
        $this->db->select('*');
        $this->db->from('absen');
        $this->db->where('keterangan', 'masuk');
        $this->db->where('year(waktu)', $tahun);
        $this->db->where('month(waktu)', $bulan);
        $this->db->where('day(waktu)', $hari);
        return $this->db->get();
    }
}
