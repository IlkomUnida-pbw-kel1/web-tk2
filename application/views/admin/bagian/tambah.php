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
                                <label>Nama bagian</label>
                                <input type="text" class="form-control" name="nama_bagian" id="nama_bagian" value="<?= set_value('nama_bagian'); ?>">
                                <?= form_error('nama_bagian', '<small class="text-danger pl-2">', '</small>'); ?>
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