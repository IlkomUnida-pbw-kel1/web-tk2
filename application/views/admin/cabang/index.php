<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)"><?= $title ?></a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
            </ol>
        </div>
        <?= $this->session->flashdata('message') ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <a href="<?= site_url('admin/cabang/tambah') ?>" class="btn rounded btn-sm btn-primary mb-3" style="float: right;">
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
                                        <th>Nama Cabang</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="customers">
                                    <?php $no = 1;
                                    foreach ($cabang as $row) : ?>
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
                                                            <h5 class="mb-0 fs--1"><?= $row->nama_cabang ?></h5>
                                                        </div>
                                                    </div>
                                                </a>
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
                                                            <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#aAddDietMenus<?= $row->id_cabang ?>">Edit</a>
                                                            <a class="dropdown-item text-danger" href="<?php echo base_url('admin/cabang/delete/' . $row->id_cabang) ?>">Delete</a>
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
<?php foreach ($cabang as $row) : ?>
    <div class="modal fade" id="aAddDietMenus<?= $row->id_cabang ?>">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Data Cabang</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('admin/cabang/update') ?>" method="post">
                        <div class="form-group">
                            <label>Nama Cabang</label>
                            <input type="hidden" name="id_cabang" value="<?= $row->id_cabang ?>">
                            <input type="text" class="form-control" name="nama_cabang" value="<?= $row->nama_cabang ?>">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal -->