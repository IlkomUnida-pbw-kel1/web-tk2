<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-md-5 order-md-2 mb-4">
                                <h4 class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-muted">Your cart</span>
                                    <span class="badge badge-primary badge-pill">3</span>
                                </h4>
                                <ul class="list-group mb-3">
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div>
                                            <h6 class="my-0">Product name</h6>
                                            <small class="text-muted">Brief description</small>
                                        </div>
                                        <span class="text-muted">$12</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div>
                                            <h6 class="my-0">Second product</h6>
                                            <small class="text-muted">Brief description</small>
                                        </div>
                                        <span class="text-muted">$8</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div>
                                            <h6 class="my-0">Third item</h6>
                                            <small class="text-muted">Brief description</small>
                                        </div>
                                        <span class="text-muted">$5</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between active">
                                        <div class="text-white">
                                            <h6 class="my-0 text-white">Promo code</h6>
                                            <small>EXAMPLECODE</small>
                                        </div>
                                        <span class="text-white">-$5</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Total (USD)</span>
                                        <strong>$20</strong>
                                    </li>
                                </ul>

                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Promo code">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Redeem</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-8 col-md-7 order-md-1">
                                <h4 class="mb-3">Perhitungan gaji</h4>
                                <hr>
                                <br>
                                <form action="<?= site_url('admin/payroll/simpan') ?>" method="post" class="needs-validation" novalidate="">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="firstName">Payment date</label>
                                            <input type="hidden" class="form-control" name="kode_payroll" value="TR<?= mt_rand(100000000000, 999999999999) ?>" maxlength="30">
                                            <input type="date" class="form-control" name="tgl_payroll" id="firstName" value="<?php echo date("Y-m-d"); ?>" required="">
                                            <div class="invalid-feedback">
                                                Valid first name is required.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="lastName">Payment time</label>
                                            <input type="time" class="form-control" id="lastName" name="waktu_payroll" placeholder="" value="<?php echo date("H:i"); ?>" required="">
                                            <div class="invalid-feedback">
                                                Valid last name is required.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="username">Employees</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="flaticon-381-user-8"></i></span>
                                            </div>
                                            <select name="id_pegawai" id="id_pegawai" class="form-control">
                                                <option hidden>Silahkan pilih</option>
                                                <?php foreach ($pegawai as $p) : ?>
                                                    <option value="<?php echo $p->id_pegawai ?>"><?php echo $p->nama ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email">Work division</label>
                                        <input type="text" name="nama_bagian" class="form-control" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email">Position</label>
                                        <label for="email">Work division</label>
                                        <input type="text" name="nama_jabatan" class="form-control" readonly>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 mb-3">
                                            <label for="country">Salary</label>
                                            <input type="text" name="gaji_pokok" class="form-control" readonly>
                                        </div>
                                        <div class="col-lg-6 col-md-12 mb-3">
                                            <label for="state">Allowance</label>
                                            <input type="text" name="tunjangan" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 mb-3">
                                            <label for="country">Total</label>
                                            <input type="text" name="amount" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="cc-name">Name on card</label>
                                            <input type="text" class="form-control" name="nama_rek" id="cc-name" readonly>

                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="cc-number">Credit card number</label>
                                            <input type="text" class="form-control" name="no_rek" id="cc-number" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="cc-number">Payment method</label>
                                            <input type="text" class="form-control" name="channel_bayar" id="cc-number" readonly>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to
                                        checkout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#id_jabatan').change(function() {

            var id_jabatan = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('admin/payroll/get_jabatan') ?>",
                dataType: "JSON",
                data: {
                    id_jabatan: id_jabatan
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(id_jabatan, nama_jabatan, gaji_pokok, tunjangan) {
                        $('[name="nama"]').val(data.nama_jabatan);
                        $('[name="gaji_pokok"]').val(data.gaji_pokok);
                        $('[name="tunjangan"]').val(data.tunjangan);

                    });

                }
            });
            return false;
        });

        $('#id_pegawai').change(function() {

            var id_pegawai = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('admin/payroll/get_pegawai') ?>",
                dataType: "JSON",
                data: {
                    id_pegawai: id_pegawai
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(id_pegawai, no_rek, nama_bagian, nama_rek, nama_jabatan, gaji_pokok, tunjangan, channel_bayar, amount) {
                        $('[name="no_rek"]').val(data.no_rek);
                        $('[name="nama_rek"]').val(data.nama_rek);
                        $('[name="nama_bagian"]').val(data.nama_bagian);
                        $('[name="nama_jabatan"]').val(data.nama_jabatan);
                        $('[name="gaji_pokok"]').val(data.gaji_pokok);
                        $('[name="tunjangan"]').val(data.tunjangan);
                        $('[name="channel_bayar"]').val(data.channel_bayar);
                        $('[name="amount"]').val(data.amount);
                    });

                }
            });
            return false;
        });

    });
</script>