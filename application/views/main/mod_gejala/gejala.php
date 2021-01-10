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
                        <h3 class="box-title">Form Tambah Data Gejala</h3>
                    </div>
                    <?php
                        $attributs = ['role' => 'form'];
                        echo form_open_multipart($this->uri->segment(1).'/gejala', $attributs);
                    ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Kode Gejala</label>
                                <input type="text" class="form-control" name="kd_gejala" value="<?= $kode; ?>" placeholder="Enter kode Gejala...." readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Gejala</label>
                                <input type="text" class="form-control" name="gejala" placeholder="Enter Nama Gejala....">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Save Data</button>
                        </div>
                    <?= form_close(); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List Table Data Gejala</h3>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>Kode Gejala</td>
                                    <td>Nama Gejala</td>
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
                                    <td><?= $row['kd_gejala']; ?></td>
                                    <td><?= $row['gejala']; ?></td>
                                    <td>
                                        <a href="<?= base_url().$this->uri->segment(1); ?>/edit_gejala/<?= $row['kd_gejala']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="<?= base_url().$this->uri->segment(1); ?>/delete_gejala/<?= $row['kd_gejala']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
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