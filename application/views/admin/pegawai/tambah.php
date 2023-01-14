<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Form Pegawai</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Data Pegawai</h4>
                    </div>
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <div class="default-tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home"><i class="la la-user mr-2"></i> Data Pribadi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#profile"><i class="la la-briefcase mr-2"></i> Kepegawaian</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#contact"><i class="la la-wallet mr-2"></i> Payroll</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#message"><i class="la la-key mr-2"></i> Akun</a>
                                </li>
                            </ul>
                            <form action="<?= base_url('admin/pegawai/proses_tambah') ?>" method="post" enctype="multipart/form-data">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel">
                                        <div class="pt-4">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>NIK KTP <small class="text-danger">*</small></label>
                                                    <input type="text" class="form-control" name="nik" placeholder="Masukkan nomor ktp">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Nama lengkap <small class="text-danger">*</small></label>
                                                    <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Tempat lahir <small class="text-danger">*</small></label>
                                                    <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukkan tempat lahir">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Tanggal lahir <small class="text-danger">*</small></label>
                                                    <input type="date" name="tgl_lahir" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Jenis kelamin <small class="text-danger">*</small></label>
                                                    <select class="form-control" name="jenis_kelamin">
                                                        <option hidden>Silahkan pilih</option>
                                                        <option value="Laki-laki">Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Agama <small class="text-danger">*</small></label>
                                                    <select class="form-control" name="agama">
                                                        <option hidden>Silahkan pilih</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen">Kristen</option>
                                                        <option value="Katholik">Katholik</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Budha">Budha</option>
                                                        <option value="Konghucu">Konghucu</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Alamat <small class="text-danger">*</small></label>
                                                    <textarea name="alamat" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Provinsi <small class="text-danger">*</small></label>
                                                    <select class="form-control" name="provinsi" id="id_provinsi">
                                                        <?php foreach ($prov as $row) : ?>
                                                            <option value="<?= $row->id_provinsi ?>"><?= $row->provinsi ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Kabupaten <small class="text-danger">*</small></label>
                                                    <select class="form-control" name="kabupaten" id="id_kabupaten">

                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Kecamatan <small class="text-danger">*</small></label>
                                                    <select class="form-control" name="kecamatan" id="id_kecamatan">
                                                        <option hidden>Silahkan pilih</option>
                                                        <?php foreach ($prov as $row) : ?>
                                                            <option value="<?= $row->id_provinsi ?>"><?= $row->provinsi ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Status pernikahan <small class="text-danger">*</small></label>
                                                    <select class="form-control" name="status_nikah">
                                                        <option hidden>Silahkan pilih</option>
                                                        <option value="Belum Menikah">Belum Menikah</option>
                                                        <option value="Sudah Menikah">Sudah Menikah</option>
                                                        <option value="Duda">Duda</option>
                                                        <option value="Janda">Janda</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Kewarganegaraan <small class="text-danger">*</small></label>
                                                    <select class="form-control" name="warga_negara">
                                                        <option hidden>Silahkan pilih</option>
                                                        <option value="WNI">WNI</option>
                                                        <option value="WNA">WNA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile">
                                        <div class="pt-4">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Nomor kepegawaian <small class="text-danger">*</small></label>
                                                    <input type="text" class="form-control" name="nip" placeholder="Masukkan nip pegawai">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Profile photo <small class="text-danger">*</small></label>
                                                    <input type="file" class="form-control" name="photo">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Status <small class="text-danger">*</small></label>
                                                    <select class="form-control" name="status_pegawai">
                                                        <option hidden>Silahkan pilih</option>
                                                        <option value="permanent employee">permanent employee</option>
                                                        <option value="contract employee">contract employee</option>
                                                        <option value="probationary employee">probationary employee</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Tanggal bergabung <small class="text-danger">*</small></label>
                                                    <input type="date" class="form-control" name="tgl_masuk" value="<?php echo date('Y-m-d'); ?>" placeholder="Masukkan tempat lahir">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Jabatan <small class="text-danger">*</small></label>
                                                    <select class="form-control" name="id_jabatan">
                                                        <option hidden>Silahkan pilih</option>
                                                        <?php foreach ($jabatan as $row) : ?>
                                                            <option value="<?= $row->id_jabatan ?>"><?= $row->nama_jabatan ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Bagian <small class="text-danger">*</small></label>
                                                    <select class="form-control" name="id_bagian">
                                                        <option hidden>Silahkan pilih</option>
                                                        <?php foreach ($bagian as $row) : ?>
                                                            <option value="<?= $row->id_bagian ?>"><?= $row->nama_bagian ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Email <small class="text-danger">*</small></label>
                                                    <input type="text" class="form-control" name="email" placeholder="Masukkan email aktif">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Nomor telp <small class="text-danger">*</small></label>
                                                    <input type="text" class="form-control" name="no_hp" placeholder="Masukkan nomor telp">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact">
                                        <div class="pt-4">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Nomor rekening <small class="text-danger">*</small></label>
                                                    <input type="text" class="form-control" name="no_rek" placeholder="Masukkan nomor rekening">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Nama akun rekening <small class="text-danger">*</small></label>
                                                    <input type="text" class="form-control" name="nama_rek" placeholder="Masukkan nama rekening">
                                                </div>
                                            </div>
                                            <p class="text-danger"><small class="text-danger">*</small><small>Catatan : digunakan untuk pengiriman gaji kepada rekening yang telah di daftarkan pada field diatas.</small>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="message">
                                        <div class="pt-4">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Username <small class="text-danger">*</small></label>
                                                    <input type="text" class="form-control" name="username" placeholder="Masukkan username">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Password <small class="text-danger">*</small></label>
                                                    <input type="password" class="form-control" name="password" placeholder="Masukkan password">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Confirm password <small class="text-danger">*</small></label>
                                                    <input type="password" class="form-control" name="confpassword" placeholder="Ulangi password">
                                                </div>
                                            </div>
                                            <p class="text-danger"><small class="text-danger">*</small><small>Catatan : digunakan untuk kebutuhan login pegawai agar dapat masuk ke halaman dashboard.</small>
                                            </p>
                                            <br>
                                            <button type="submit" class="btn btn-sm btn-outline-primary">Submit data</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#id_kabupaten").hide();
        $("#id_kecamatan").hide();

        loadkabupaten();
        loadkecamatan();

    });

    function loadkabupaten() {

        $("#id_provinsi").change(function() {
            var getprovinsi = $("#id_provinsi").val();

            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?= base_url(); ?>admin/pegawai/getdatakabupaten",
                data: {
                    provinsi: getprovinsi
                },
                success: function(data) {
                    console.log(data);

                    var html = "";
                    var i;
                    for (i = 0; i < data.length; i++) {

                        html += '<option value="' + data[i].id_kabupaten + '">' + data[i].kabupaten + '</option>';

                    }

                    $("#id_kabupaten").html(html)
                    $("#id_kabupaten").show();

                }
            });

        });
    }

    function loadkecamatan() {

        $("#id_kabupaten").change(function() {
            var getkabupaten = $("#id_kabupaten").val();

            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?= base_url(); ?>admin/pegawai/getdatakecamatan",
                data: {
                    kabupaten: getkabupaten
                },
                success: function(data) {
                    console.log(data);

                    var html = "";
                    var i;
                    for (i = 0; i < data.length; i++) {

                        html += '<option value="' + data[i].id_kecamatan + '">' + data[i].kecamatan + '</option>';

                    }

                    $("#id_kecamatan").html(html)
                    $("#id_kecamatan").show();

                }
            });

        });
    }
</script>