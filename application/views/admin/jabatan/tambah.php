<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Element</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Select List</h4>
                    </div>
                    <div class="card-body">
                        <?php echo form_open($action) ?>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Nama jabatan</label>
                                <input type="text" class="form-control" name="nama_jabatan" id="nama_jabatan" value="<?= set_value('nama_jabatan'); ?>">
                                <?= form_error('nama_jabatan', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Gaji pokok (Rp)</label>
                                <input type="number" class="form-control" name="gaji_pokok" id="gaji_pokok" value="<?= set_value('gaji_pokok'); ?>">
                                <?= form_error('gaji_pokok', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tunjangan (Rp)</label>
                                <input type="number" class="form-control" name="tunjangan" id="tunjangan" value="<?= set_value('tunjangan'); ?>">
                                <?= form_error('tunjangan', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Bennefit</label>
                                <select class="form-control default-select" name="benefit1" id="benefit1">
                                    <option value="" hidden>Nothing Selected</option>
                                    <option value="Asset Kendaraan">Asset Kendaraan</option>
                                    <option value="Asset Laptop">Asset Laptop</option>
                                    <option value="BPJS Kesehatan">BPJS Kesehatan</option>
                                </select>
                                <?= form_error('benefit1', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Other Bennefit</label>
                                <select class="form-control default-select" name="benefit2" id="benefit2">
                                    <option value="" hidden>Nothing Selected</option>
                                    <option value="Asset Kendaraan">Asset Kendaraan</option>
                                    <option value="Asset Laptop">Asset Laptop</option>
                                    <option value="BPJS Kesehatan">BPJS Kesehatan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Other Bennefit</label>
                                <select class="form-control default-select" name="benefit3" id="benefit3">
                                    <option value="" hidden>Nothing Selected</option>
                                    <option value="Asset Kendaraan">Asset Kendaraan</option>
                                    <option value="Asset Laptop">Asset Laptop</option>
                                    <option value="BPJS Kesehatan">BPJS Kesehatan</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <a href="<?= site_url('admin/jabatan') ?>" class="btn btn-danger">Back</a>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>