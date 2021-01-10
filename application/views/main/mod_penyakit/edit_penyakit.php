<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Management Penyakit
            <small>Data Penyakit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-files-o"></i> Management Data Penyakit/</a></li>
        </ol>   
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Edit Data Penyakit</h3>
                    </div>
                    <?php
                        $attributs = ['role' => 'form'];
                        echo form_open_multipart($this->uri->segment(1).'/edit_penyakit', $attributs);
                    ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Kode Penyakit</label>
                                <input type="text" class="form-control" name="kd_penyakit" value="<?= $rows['kd_penyakit']; ?>" placeholder="Enter kode penyakit...." readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Penyakit</label>
                                <input type="text" class="form-control" name="nama_penyakit" value="<?= $rows['nama_penyakit']; ?>" placeholder="Enter Nama Penyakit....">
                            </div>
                            <div class="form-group">
                                <label>keterangan Mengenai Penyakit</label>
                                <textarea name="keterangan_penyakit" value="<?= $rows['keterangan_penyakit']; ?>" class="form-control"><?= $rows['keterangan_penyakit']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Solusi Mengatasi Penyakit</label>
                                <textarea name="kesimpulan" value="<?= $rows['kesimpulan']; ?>" class="form-control"><?= $rows['kesimpulan']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Contoh Photo Penyakit</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </section>
</div>