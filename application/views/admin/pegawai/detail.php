<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Riwayat Informasi</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
            </ol>
        </div>
        <!-- row -->
        <?php foreach ($detail as $row) : ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="profile card card-body px-3 pt-3 pb-0">
                        <div class="profile-head">
                            <div class="profile-info">
                                <div class="profile-photo">
                                    <img src="<?php echo base_url() . 'assets/photo/' . $row->photo ?>" class="img-fluid rounded-circle" alt="">
                                </div>
                                <div class="profile-details">
                                    <div class="profile-name px-3 pt-2">
                                        <h4 class="text-primary mb-0"><?= $row->nama ?>&nbsp;
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
                                                <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                                            </svg>
                                        </h4>
                                        <p><?= $row->nama_jabatan ?> / <?= $row->nama_bagian ?></p>
                                    </div>
                                    <div class="profile-email px-2 pt-2">
                                        <h4 class="text-muted mb-0"><?= $row->email ?></h4>
                                        <p><?= $row->nip ?></p>
                                    </div>
                                    <div class="dropdown ml-auto">
                                        <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                    <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                    <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                </g>
                                            </svg></a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> View profile</li>
                                            <li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> Add to close friends</li>
                                            <li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to group</li>
                                            <li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link active show">About Me</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="about-me" class="tab-pane fade active show">
                                            <div class="profile-about-me">
                                                <div class="pt-4 border-bottom-1 pb-3">
                                                    <h4 class="text-primary">Tentang Saya</h4>
                                                    <?php if (empty($row->about)) { ?>
                                                        <center><img src="<?= site_url('assets') ?>/images/no_data.png" width="200">
                                                        <?php } else { ?>
                                                            <p class="mb-2"><?= $row->about ?></p>
                                                        <?php } ?>
                                                </div>
                                            </div>
                                            <div class="profile-personal-info">
                                                <h4 class="text-primary mb-4">Informasi Pribadi</h4>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span><?= $row->nama ?></span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">NIK KTP <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span><?= $row->nik ?></span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">DOB <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span><?= $row->tempat_lahir ?>, <?php echo date('d-m-Y', strtotime($row->tgl_lahir)); ?></span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Gender <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span><?= $row->jenis_kelamin ?></span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Religion <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span><?= $row->agama ?></span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span><?= $row->email ?></span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Availability <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span><?= $row->status_pegawai ?></span>
                                                    </div>
                                                </div>
                                                <?php
                                                $date1 = new DateTime(date('Y-m-d', strtotime($row->tgl_lahir)));
                                                $date2 = new DateTime(date('Y-m-d'));
                                                $interval = $date1->diff($date2);
                                                ?>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Age <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span><?= $interval->y ?> years</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Location <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7">
                                                        <span>
                                                            <?= $row->alamat ?>, <?= $row->kabupaten ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="replyModal">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Post Reply</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <textarea class="form-control" rows="4">Message</textarea>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Reply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Rincian Pembayaran Terbaru</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table shadow-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Payment No.</th>
                                            <th scope="col">Employee</th>
                                            <th scope="col">Type of payment</th>
                                            <th scope="col">Payment date</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pay as $p) : ?>
                                            <?php
                                            // Potongan Alpha
                                            $alfa  = $p->gaji_pokok / 26 * $p->alpha;

                                            $gaji = $p->gaji_pokok;
                                            $tunjangan = $p->tunjangan;

                                            // penghasilan bruto setahun
                                            $bruto_setahun = $gaji + $tunjangan * 12;

                                            // dikurangi biaya jabatan
                                            $jabatan = 0.05 * $bruto_setahun;

                                            $netto = $bruto_setahun - $jabatan;

                                            $pkp = 54000000 - $netto;

                                            $lapis_pertama = 0.05 * 50000000;

                                            $pph = $lapis_pertama / 12;


                                            ?>
                                            <tr>
                                                <td>#<?= $p->kode_payroll ?></td>
                                                <td><?= $p->nama ?></td>
                                                <td>Pembayaran Gaji</td>
                                                <td><?php echo date('d F Y', strtotime($p->tgl_payroll)); ?> | <?php echo date('h:i:s', strtotime($p->waktu_payroll)); ?></td>
                                                <td><span class="badge badge-rounded badge-success">Berhasil</span></td>
                                                <td>Rp. <?php echo number_format($row->gaji_pokok + $row->tunjangan - $alfa - $pph, 0, ",", ".") ?></td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>