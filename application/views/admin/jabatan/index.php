<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)"><?= $title ?></a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <a href="<?= site_url('admin/jabatan/tambah') ?>" class="btn rounded btn-sm btn-primary mb-3" style="float: right;">
                                <i class="las la-plus scale-2"></i>
                            </a>
                            <table class="table table-responsive-lg mb-0 table-striped">
                                <thead>
                                    <tr>
                                        <th class="">
                                            <div class="custom-control custom-checkbox mx-2">
                                                <input type="checkbox" class="custom-control-input" id="checkAll">
                                                <label class="custom-control-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th>Jabatan</th>
                                        <th>Gaji Pokok (Rp)</th>
                                        <th>Tunjangan (Rp)</th>
                                        <th class="pl-5 width200">Bennefit
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="customers">
                                    <?php $no = 1;
                                    foreach ($jabatan as $row) : ?>
                                        <tr class="btn-reveal-trigger">
                                            <td>
                                                <div class="custom-control custom-checkbox mx-2">
                                                    <input type="checkbox" class="custom-control-input" id="checkbox1">
                                                    <label class="custom-control-label" for="checkbox1"></label>
                                                </div>
                                            </td>
                                            <td class="py-3">
                                                <a href="#">
                                                    <div class="media d-flex align-items-center">
                                                        <div class="media-body">
                                                            <h5 class="mb-0 fs--1"><?= $row->nama_jabatan ?></h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="py-2"><a href="mailto:ricky@example.com">Rp. <?php echo number_format($row->gaji_pokok) ?></a></td>
                                            <td class="py-2"> <a href="tel:2012001851">Rp. <?php echo number_format($row->tunjangan) ?></a></td>
                                            <td class="py-2 pl-5 wspace-no">
                                                <a class="btn btn-sm btn-primary light mr-3 mb-2"><?= $row->benefit1 ?></a>
                                                <?php if ($row->benefit2 == NULL) { ?>

                                                <?php } else { ?>
                                                    <a class="btn btn-sm btn-success light mr-3 mb-2"><?= $row->benefit2 ?></a>
                                                <?php } ?>

                                                <?php if ($row->benefit3 == NULL) { ?>

                                                <?php } else { ?>
                                                    <a class="btn btn-sm btn-warning light mr-3 mb-2"><?= $row->benefit3 ?></a>
                                                <?php } ?>
                                            </td>
                                            <td class="py-2 text-right">
                                                <div class="dropdown"><button class="btn btn-primary tp-btn-light sharp" type="button" data-toggle="dropdown"><span class="fs--1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                                </g>
                                                            </svg></span></button>
                                                    <div class="dropdown-menu dropdown-menu-right border py-0">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#aAddDietMenus<?= $row->id_jabatan ?>">Edit</a>
                                                            <a class="dropdown-item text-danger" href="<?php echo base_url('admin/jabatan/delete/' . $row->id_jabatan) ?>">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
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

<!-- Modal -->
<?php foreach ($jabatan as $row) : ?>
    <div class="modal fade" id="aAddDietMenus<?= $row->id_jabatan ?>">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Data Jabatan</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('admin/jabatan/update') ?>" method="post">
                        <div class="form-group">
                            <label>Nama Jabatan</label>
                            <input type="hidden" name="id_jabatan" value="<?= $row->id_jabatan ?>">
                            <input type="text" class="form-control" name="nama_jabatan" value="<?= $row->nama_jabatan ?>">
                        </div>
                        <div class="form-group">
                            <label>Gaji Pokok</label>
                            <input type="text" class="form-control" name="gaji_pokok" value="<?= $row->gaji_pokok ?>">
                        </div>
                        <div class="form-group">
                            <label>Tunjangan</label>
                            <input type="text" class="form-control" name="tunjangan" value="<?= $row->tunjangan ?>">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal -->