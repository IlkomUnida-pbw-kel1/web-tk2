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
                        <?php foreach ($pegawai as $p) : ?>
                            <div class="default-tab">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home"><i class="la la-user mr-2"></i> Data Pribadi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#contact"><i class="la la-wallet mr-2"></i> Payroll</a>
                                    </li>
                                </ul>
                                <form action="<?= base_url('admin/pegawai/proses_edit') ?>" method="post" enctype="multipart/form-data">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel">
                                            <div class="pt-4">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>NIK KTP <small class="text-danger">*</small></label>
                                                        <input type="hidden" name="id_pegawai" value="<?= $p->id_pegawai ?>">
                                                        <input type="text" class="form-control" name="nik" placeholder="Masukkan nomor ktp" value="<?= $p->nik ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Nama lengkap <small class="text-danger">*</small></label>
                                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap" value="<?= $p->nama ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Email <small class="text-danger">*</small></label>
                                                        <input type="text" class="form-control" name="email" placeholder="Masukkan nomor ktp" value="<?= $p->email ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Mobile number <small class="text-danger">*</small></label>
                                                        <input type="text" class="form-control" name="no_hp" placeholder="Masukkan nama lengkap" value="<?= $p->no_hp ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Tempat lahir <small class="text-danger">*</small></label>
                                                        <input type="text" class="form-control" name="tempat_lahir" value="<?= $p->tempat_lahir ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Tanggal lahir <small class="text-danger">*</small></label>
                                                        <input type="date" name="tgl_lahir" class="form-control" value="<?= $p->tgl_lahir ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Jenis kelamin <small class="text-danger">*</small></label>
                                                        <select class="form-control" name="jenis_kelamin">
                                                            <option hidden value="<?= $p->jenis_kelamin ?>"><?= $p->jenis_kelamin ?></option>
                                                            <option value="Laki-laki">Laki-laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Agama <small class="text-danger">*</small></label>
                                                        <select class="form-control" name="agama">
                                                            <option hidden value="<?= $p->agama ?>"><?= $p->agama ?></option>
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Katholik">Katholik</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Status pernikahan <small class="text-danger">*</small></label>
                                                        <select class="form-control" name="status_nikah">
                                                            <option hidden value="<?= $p->status_nikah ?>"><?= $p->status_nikah ?></option>
                                                            <option value="Belum Menikah">Belum Menikah</option>
                                                            <option value="Sudah Menikah">Sudah Menikah</option>
                                                            <option value="Duda">Duda</option>
                                                            <option value="Janda">Janda</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Kewarganegaraan <small class="text-danger">*</small></label>
                                                        <select class="form-control" name="warga_negara">
                                                            <option hidden value="<?= $p->warga_negara ?>"><?= $p->warga_negara ?></option>
                                                            <option value="WNI">WNI</option>
                                                            <option value="WNA">WNA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="contact">
                                            <div class="pt-4">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Nomor rekening <small class="text-danger">*</small></label>
                                                        <input type="text" class="form-control" name="no_rek" placeholder="Masukkan nomor rekening" value="<?= $p->no_rek ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Nama akun rekening <small class="text-danger">*</small></label>
                                                        <input type="text" class="form-control" name="nama_rek" placeholder="Masukkan nama rekening" value="<?= $p->nama_rek ?>">
                                                    </div>
                                                </div>
                                                <p class="text-danger"><small class="text-danger">*</small><small>Catatan : digunakan untuk pengiriman gaji kepada rekening yang telah di daftarkan pada field diatas.</small>
                                                </p>
                                                <br>
                                                <button type="submit" class="btn btn-sm btn-outline-primary">Submit data</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>