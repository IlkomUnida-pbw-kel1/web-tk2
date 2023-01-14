<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-xxl-8">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <form method="post" action="<?php echo base_url('admin/laporan_cuti/') ?>">
                                <div class="card-header d-block pb-0 border-0">
                                    <div class="d-sm-flex flex-wrap align-items-center d-block mb-md-3 mb-0">
                                        <div class="mr-auto pr-3 mb-3">
                                            <h4 class="text-black fs-20">Filter Pencarian</h4>
                                            <p class="fs-13 mb-0 text-black">Lorem ipsum dolor sit amet, consectetur</p>
                                        </div>
                                        <div class="input-group mb-3 diet-search mr-4">
                                            <input type="date" class="form-control" name="dari" required>
                                        </div>
                                        <div class="input-group mb-3 diet-search mr-4">
                                            <input type="date" class="form-control" name="sampai" required>
                                        </div>
                                        <button type="submit" class="btn rounded btn-primary mb-3">
                                            <i class="las la-search scale-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Laporan cuti </h4>
                    </div>
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="btn btn-sm btn-primary" href="<?= site_url('admin/laporan_cuti/print') ?>" target="_blank">&nbsp; Cetak laporan
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="home1" role="tabpanel">
                                    <div class="pt-4">
                                        <div class="table-responsive">
                                            <table class="table shadow-hover">
                                                <thead>
                                                    <tr>
                                                        <th><span class="font-w600 text-black fs-16">Submission date</span></th>
                                                        <th><span class="font-w600 text-black fs-16">Employee</span></th>
                                                        <th><span class="font-w600 text-black fs-16">Type</span></th>
                                                        <th><span class="font-w600 text-black fs-16">Estimated</span></th>
                                                        <th><span class="font-w600 text-black fs-16">Status</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1;
                                                    foreach ($data as $row) { ?>
                                                        <?php
                                                        $tgl1 = new DateTime($row->waktu_pengajuan);
                                                        $tgl2 = new DateTime($row->waktu_selesai);
                                                        $selisih = $tgl2->diff($tgl1);
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <p class="text-black mb-1 font-w600"><?php echo date('l', strtotime($row->waktu_pengajuan)); ?> - <?php echo date('l', strtotime($row->waktu_selesai)); ?></p>
                                                                <span class="fs-14"><?php echo date('F d, Y', strtotime($row->waktu_pengajuan)); ?> s/d <?php echo date('F d, Y', strtotime($row->waktu_selesai)); ?></span>
                                                            </td>
                                                            <td>
                                                                <p class="text-black mb-1 font-w600"><?= ucfirst($row->nama) ?></p>
                                                                <span class="fs-14">#<?= ucfirst($row->nip) ?></span>
                                                            </td>
                                                            <td>
                                                                <p class="text-black mb-1 font-w600">
                                                                    <?= ucfirst($row->jenis_cuti) ?>
                                                                </p>
                                                                <span class="fs-14">
                                                                    <small><a target="_blank" href="<?= base_url('assets/foto/' . $row->foto) ?>"><i class="flaticon-381-link"></i>&nbsp; Attachment file</a></small>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <p class="text-black mb-1 font-w600">
                                                                    <?= $selisih->days ?> days
                                                                </p>
                                                                <span class="fs-14">
                                                                    Perkiraan waktu cuti
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <p class="text-black mb-1 font-w600">
                                                                    <?php if ($row->status == "0") { ?>
                                                                        <font color="orange">”Menunggu persetujuan”</font>
                                                                    <?php } elseif ($row->status == "1") { ?>
                                                                        <font color="green">”Approved”</font>
                                                                    <?php } else { ?>
                                                                        <font color="red">”Rejected”</font>
                                                                    <?php } ?>
                                                                </p>
                                                                <span class="fs-14">
                                                                    <?php if ($row->status == '0') { ?>
                                                                        Waiting for approval
                                                                    <?php } ?>
                                                                    <?php if ($row->status == '1') { ?>
                                                                        You have agreed to the submission
                                                                    <?php } ?>
                                                                    <?php if ($row->status == '2') { ?>
                                                                        You have rejected the submission
                                                                    <?php } ?>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>