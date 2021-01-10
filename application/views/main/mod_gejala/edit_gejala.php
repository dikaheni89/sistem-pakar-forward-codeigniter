<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Management Gejala
            <small>Data Gejala</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-files-o"></i> Management Data Gejala/</a></li>
        </ol>   
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Edit Data Gejala</h3>
                    </div>
                    <?php
                        $attributs = ['role' => 'form'];
                        echo form_open_multipart($this->uri->segment(1).'/edit_gejala', $attributs);
                    ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Kode Gejala</label>
                                <input type="text" class="form-control" name="kd_gejala" value="<?= $rows['kd_gejala']; ?>" placeholder="Enter kode Gejala...." readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Gejala</label>
                                <input type="text" class="form-control" name="gejala" value="<?= $rows['gejala']; ?>" placeholder="Enter Nama Gejala....">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Save Data</button>
                        </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </section>
</div>