<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-lg-12">
                <div class="card">
                    <div class="card-header bg-white">
                        <div class="d-flex align-items-center mr-3">

                            <h4 class="fs-20 text-black mb-0">Riwayat Pembayaran</h4>
                        </div>
                        <div class="dropdown">
                            <a href="<?= site_url('admin/payroll/tambah') ?>" class="btn btn-primary light btn-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-patch-plus-fill" viewBox="0 0 16 16">
                                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table shadow-hover">
                                <thead>
                                    <tr>
                                        <th><span class="font-w600 text-black fs-16">Date</span></th>
                                        <th><span class="font-w600 text-black fs-16">Transaction ID</span></th>
                                        <th><span class="font-w600 text-black fs-16">Employee</span></th>
                                        <th><span class="font-w600 text-black fs-16">Total</span></th>
                                        <th><span class="font-w600 text-black fs-16">Time</span></th>
                                        <th><span class="font-w600 text-black fs-16">Action</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($data as $row) { ?>
                                        <tr>
                                            <td>
                                                <p class="text-black mb-1 font-w600"><?php echo date('l', strtotime($row->tgl_payroll)); ?></p>
                                                <span class="fs-14"><?php echo date('F d, Y', strtotime($row->tgl_payroll)); ?></span>
                                            </td>
                                            <td>
                                                <p class="text-black mb-1 font-w600">#PAY ID :</p>
                                                <span class="fs-14">#<?= ucfirst($row->kode_payroll) ?></span>
                                            </td>
                                            <td>
                                                <p class="text-black mb-1 font-w600"><?= ucfirst($row->nama) ?></p>
                                                <span class="fs-14">NIP: <?= ucfirst($row->nip) ?></span>
                                            </td>
                                            <td>
                                                <p class="text-black mb-1 font-w600">
                                                    Rp.<?php echo number_format($row->gaji_pokok + $row->tunjangan, 0, ',', '.') ?>
                                                </p>
                                                <span class="fs-14">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill text-success" viewBox="0 0 16 16">
                                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                                                    </svg>&nbsp; termasuk potongan
                                                </span>
                                            </td>
                                            <td>
                                                <p class="text-black mb-1 font-w600"><?php echo date('h:i:s A', strtotime($row->waktu_payroll)); ?>”</p>
                                                <span class="fs-14">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
                                                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                                                    </svg>&nbsp; transaksi berhasil
                                                </span>
                                            </td>
                                            <td>
                                                <div class="info mb-3">
                                                    <div class="dropdown mb-3">
                                                        <a href="<?php echo base_url('admin/payroll/payslip/' . $row->id_payroll) ?>" class="more-button">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-files" viewBox="0 0 16 16">
                                                                <path d="M13 0H6a2 2 0 0 0-2 2 2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 13V4a2 2 0 0 0-2-2H5a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zM3 4a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
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