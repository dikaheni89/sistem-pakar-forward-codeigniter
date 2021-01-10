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
                        <h3 class="box-title">Form Tambah Data Penyakit</h3>
                    </div>
                    <?php
                        $attributs = ['role' => 'form'];
                        echo form_open_multipart($this->uri->segment(1).'/penyakit', $attributs);
                    ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Kode Penyakit</label>
                                <input type="text" class="form-control" name="kd_penyakit" value="<?= $kode; ?>" placeholder="Enter kode penyakit...." readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Penyakit</label>
                                <input type="text" class="form-control" name="nama_penyakit" placeholder="Enter Nama Penyakit....">
                            </div>
                            <div class="form-group">
                                <label>keterangan Mengenai Penyakit</label>
                                <textarea name="keterangan_penyakit" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Solusi Mengatasi Penyakit</label>
                                <textarea name="solusi" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Contoh Photo Penyakit</label>
                                <input type="file" class="form-control" name="image">
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
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List Table Data Penyakit</h3>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>Kode Penyakit</td>
                                    <td>Nama Penyakit</td>
                                    <td>Keterangan</td>
                                    <td>Solusi</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if ($record === null) : ?>
                                <tr>
                                    <td colspan="5">Data Tidak Ditemukan</td>
                                </tr>
                            <?php else : ?>
                            <?php 
                            $no = 1;
                            foreach($record as $row) : 
                            ?>
                                <tr>
                                    <td><?= $row['kd_penyakit']; ?></td>
                                    <td><?= $row['nama_penyakit']; ?></td>
                                    <td><?= $row['keterangan_penyakit']; ?></td>
                                    <td><?= $row['solusi']; ?></td>
                                    <td>
                                        <a href="<?= base_url().$this->uri->segment(1); ?>/edit_penyakit/<?= $row['kd_penyakit']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="<?= base_url().$this->uri->segment(1); ?>/delete_penyakit/<?= $row['kd_penyakit']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                            <?php 
                            $no++;
                            endforeach; 
                            ?>
                            <?php endif ; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>