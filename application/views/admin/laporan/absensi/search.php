<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-xxl-8">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <?php echo form_open('admin/laporan_absensi') ?>
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
                        <div class="pt-0">
                            <div class="table-responsive">
                                <table class="table shadow-hover">
                                    <thead>
                                        <tr>
                                            <th><span class="font-w600 text-black fs-16">Date</span></th>
                                            <th><span class="font-w600 text-black fs-16">Employee</span></th>
                                            <th><span class="font-w600 text-black fs-16">Distance</span></th>
                                            <th><span class="font-w600 text-black fs-16">Time</span></th>
                                            <th><span class="font-w600 text-black fs-16">Action</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $row) : ?>
                                            <tr>
                                                <td>
                                                    <p class="text-black mb-1 font-w600"><?php echo date('l', strtotime($row->waktu)); ?></p>
                                                    <span class="fs-14"><?php echo date('F d, Y', strtotime($row->waktu)); ?></span>
                                                </td>
                                                <td>
                                                    <p class="text-black mb-1 font-w600"><?= ucfirst($row->nama) ?></p>
                                                    <span class="fs-14">#<?= ucfirst($row->nip) ?></span>
                                                </td>
                                                <td>
                                                    <p class="text-black mb-1 font-w600">
                                                        <?php if ($row->keterangan == "masuk") { ?>
                                                            <font color="green">Masuk</font>
                                                        <?php } else { ?>
                                                            <font color="red">Keluar</font>
                                                        <?php } ?>
                                                    </p>
                                                    <span class="fs-14">
                                                        <?php if ($row->keterangan == "masuk") { ?>
                                                            Absent In
                                                        <?php } else { ?>
                                                            Absent Out
                                                        <?php } ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <p class="text-black mb-1 font-w600"><?php echo date('h:i:s', strtotime($row->waktu)); ?>”</p>
                                                    <span class="fs-14">Target 40mins</span>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-danger" href="<?php echo base_url('admin/laporan_absensi/report/' . $row->id_absen) ?>" target="_blank">
                                                        Print
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
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