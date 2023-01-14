<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">

            <div class="col-xl-9 col-xxl-8">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card plan-list">
                            <div class="card-header d-sm-flex flex-wrap d-block pb-0 border-0">
                                <div class="mr-auto pr-3 mb-3">
                                    <h4 class="text-black fs-20">Riwayat Penggajian</h4>
                                    <p class="fs-13 mb-0 text-black">Semua histori payroll anda dapat dilihat disini.</p>
                                </div>
                            </div>
                            <div class="card-body tab-content pt-2">
                                <?php foreach ($all as $a) : ?>
                                    <?php
                                    // Potongan Alpha
                                    $alfa  = $a->gaji_pokok / 26 * $a->alpha;

                                    $gaji = $a->gaji_pokok;
                                    $tunjangan = $a->tunjangan;

                                    // penghasilan bruto setahun
                                    $bruto_setahun = $gaji + $tunjangan * 12;

                                    // dikurangi biaya jabatan
                                    $jabatan = 0.05 * $bruto_setahun;

                                    $netto = $bruto_setahun - $jabatan;

                                    $pkp = 54000000 - $netto;

                                    $lapis_pertama = 0.05 * 50000000;

                                    $pph = $lapis_pertama / 12;


                                    ?>
                                    <div class="tab-pane active show fade" id="All">
                                        <div class="d-flex border-bottom flex-wrap pt-3 list-row align-items-center mb-2">
                                            <div class="col-xl-5 col-xxl-8 col-lg-6 col-sm-8 d-flex align-items-center">
                                                <div class="list-icon bgl-primary mr-3 mb-3">
                                                    <p class="fs-20 text-primary mb-0 mt-2"><?php echo date('M', strtotime($a->tgl_payroll)); ?></p>
                                                    <span class="fs-14 text-primary"><?php echo date('Y', strtotime($a->tgl_payroll)); ?></span>
                                                </div>
                                                <div class="info mb-3">
                                                    <h4 class="fs-20 "><a href="workout-statistic.html" class="text-black">Pembayaran Gaji</a></h4>
                                                    <span class="text-dark font-w400"><?= $a->nama_jabatan ?> <?= $a->nama_bagian ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-xxl-4 col-lg-2 col-sm-4 d-flex align-items-center">
                                                <div class="info mb-3">
                                                    <h4 class="fs-20 "><a href="workout-statistic.html" class="text-black">Status</a></h4>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
                                                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                                                    </svg>
                                                    <span class="text-dark font-w400">Berhasil</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-xxl-4 col-lg-2 col-sm-4 d-flex align-items-center">
                                                <div class="info mb-3">
                                                    <h4 class="fs-20 "><a href="workout-statistic.html" class="text-black">Jumlah</a></h4>
                                                    <span class="text-dark font-w400">Rp. <?php echo number_format($a->gaji_pokok + $a->tunjangan - $alfa - $pph, 0, ",", ".") ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xl-1 col-xxl-4 col-lg-2 col-sm-4 d-flex align-items-center">
                                                <div class="info mb-3">
                                                    <div class="dropdown mb-3">
                                                        <a href="<?php echo base_url('payroll/payslip/' . $a->id_payroll) ?>" class="more-button">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-files" viewBox="0 0 16 16">
                                                                <path d="M13 0H6a2 2 0 0 0-2 2 2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 13V4a2 2 0 0 0-2-2H5a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zM3 4a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-xl-3 col-xxl-12 col-lg-4 col-sm-12 d-flex align-items-center">
                                                <div class="dropdown mb-3">
                                                    <a href="javascript:void(0)" class="more-button" data-toggle="dropdown" aria-expanded="false">
                                                        <svg width="6" height="26" viewBox="0 0 6 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6 3C6 4.65685 4.65685 6 3 6C1.34315 6 0 4.65685 0 3C0 1.34315 1.34315 0 3 0C4.65685 0 6 1.34315 6 3Z" fill="#585858"></path>
                                                            <path d="M6 13C6 14.6569 4.65685 16 3 16C1.34315 16 0 14.6569 0 13C0 11.3431 1.34315 10 3 10C4.65685 10 6 11.3431 6 13Z" fill="#585858"></path>
                                                            <path d="M6 23C6 24.6569 4.65685 26 3 26C1.34315 26 0 24.6569 0 23C0 21.3431 1.34315 20 3 20C4.65685 20 6 21.3431 6 23Z" fill="#585858"></path>
                                                        </svg>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-4">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card flex-xl-column flex-md-row flex-column">
                            <div class="card-body border-bottom pb-4 p-2 event-calender">
                                <input type='text' class="form-control d-none" id='datetimepicker1' />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var dt = new Date();
    document.getElementById("tanggalwaktu").innerHTML = dt.toLocaleString();
</script>