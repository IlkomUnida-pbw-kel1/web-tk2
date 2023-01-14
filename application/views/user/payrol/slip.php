<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <?php foreach ($slip as $row) : ?>

                <?php
                // Potongan Alpha
                $alfa  = $row->gaji_pokok / 26 * $row->alpha;

                $gaji = $row->gaji_pokok;
                $tunjangan = $row->tunjangan;

                // penghasilan bruto setahun
                $bruto_setahun = $gaji + $tunjangan * 12;

                // dikurangi biaya jabatan
                $jabatan = 0.05 * $bruto_setahun;

                $netto = $bruto_setahun - $jabatan;

                $pkp = 54000000 - $netto;

                $lapis_pertama = 0.05 * 50000000;

                $pph = $lapis_pertama / 12;


                ?>
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header"> SLIP GAJI ONLINE <span class="float-right">
                                <strong><?php echo date('F', strtotime($row->tgl_payroll)); ?></strong>&nbsp; <?php echo date('Y', strtotime($row->waktu_payroll)); ?></span> </div>
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                    <h6>From:</h6>
                                    <div> <strong>Gymove Indonesia</strong> </div>
                                    <div>Jl. Metro Pondok Indah II</div>
                                    <div>2nd Floor, Jakarta Selatan</div>
                                    <div>Email: info@gymove.com</div>
                                    <div>Phone: +62 7471 666 3333</div>
                                </div>
                                <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                    <h6>To:</h6>
                                    <div> <strong><?= $row->nama ?></strong> </div>
                                    <div>NIP: <?= $row->nip ?></div>
                                    <div><?= $row->nama_jabatan ?> <?= $row->nama_bagian ?></div>
                                    <div>Status: <?= $row->status_pegawai ?></div>
                                    <div>Join date: <?php echo date('d F Y', strtotime($row->tgl_masuk)); ?></div>
                                </div>
                                <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end justify-content-md-center justify-content-xs-start">
                                    <div class="row align-items-center">
                                        <div class="col-sm-9">
                                            <div class="brand-logo mb-3">
                                                <img class="logo-abbr mr-2" src="<?= base_url('assets') ?>/draw.svg" width="100" alt="">
                                                <img class="logo-compact" src="<?= base_url('assets') ?>/images/logo-text.png" alt="">
                                            </div>
                                            <span>Your payment amount: <strong class="d-block">Rp. <?php echo number_format($row->gaji_pokok + $row->tunjangan - $alfa - $pph, 0, ",", ".") ?> <small>(<?= $row->channel_bayar ?>)</small></strong>
                                                <br>
                                                <small class="text-muted">Valid payment number : #<?= $row->kode_payroll ?></small>
                                        </div>
                                        <div class="col-sm-3 mt-3"> <img src="<?php echo base_url() . 'assets/qrcode/' . $row->qr_code; ?>" class="img-fluid width110"> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-5">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr class="bg-red text-white">
                                                    <th class="center">ALLOWANCE</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="left strong">Gaji Pokok</td>
                                                    <td class="left strong">Rp. <?php echo number_format($row->gaji_pokok, 2, ",", ".") ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="left strong">Uang Makan</td>
                                                    <td class="left strong">Rp. <?php echo number_format($row->tunjangan, 2, ",", ".") ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="left strong">TOTAL</td>
                                                    <td class="left strong"><b>Rp. <?php echo number_format($row->gaji_pokok + $row->tunjangan, 0, ",", ".") ?></b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-5">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr class="bg-red text-white">
                                                    <th class="center">DEDUCTION</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="left strong">Potongan Alpha</td>
                                                    <td class="left strong">Rp. <?php echo number_format($alfa, 2, ",", ".") ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="left strong">PPH 21</td>
                                                    <td class="left strong">Rp. <?php echo number_format($pph, 2, ",", ".") ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="left strong">TOTAL</td>
                                                    <td class="left strong"><b>Rp. <?php echo number_format($alfa + $pph, 2, ",", ".") ?></b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-5 mt-5">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr class="bg-red text-white">
                                                    <th class="center">TAKE HOME PAY</th>
                                                    <th>Rp. <?php echo number_format($row->gaji_pokok + $row->tunjangan - $alfa - $pph, 0, ",", ".") ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="left strong">Ditransfer Ke:</td>
                                                    <td class="left strong"></td>
                                                </tr>
                                                <tr>
                                                    <td class="left strong">BCA Cab. Jakarta</td>
                                                    <td class="left strong"></td>
                                                </tr>
                                                <tr>
                                                    <td class="left strong">No. A/C <?= $row->no_rek ?></td>
                                                    <td class="left strong"></td>
                                                </tr>
                                                <tr>
                                                    <td class="left strong">a.n. <?= $row->nama_rek ?></td>
                                                    <td class="left strong"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-5 mt-5">
                                    <br><br><br><br><br>
                                    <table width="100%">
                                        <tr>
                                            <td></td>
                                            <td width="200px">
                                                <p>
                                                    <center>Disetujui Oleh:
                                                </p>
                                                <br>
                                                <br>
                                                <p>
                                                    <center>Melissa Grey
                                                </p>
                                                <p>
                                                    <center>HR/GA Director
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-3 col-sm-5 mt-5">
                                    <br><br><br><br><br>
                                    <table width="100%">
                                        <tr>
                                            <td></td>
                                            <td width="200px">
                                                <p>
                                                    <center>Diterima oleh:
                                                </p>
                                                <br>
                                                <br>
                                                <p>
                                                    <center><?= $row->nama ?>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>