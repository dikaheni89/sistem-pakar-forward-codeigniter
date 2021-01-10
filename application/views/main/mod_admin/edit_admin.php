<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Management Admin
            <small>Edit Data Administrator</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-files-o"></i> Management Edit Data Admin/</a></li>
        </ol>   
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Edit Data Administrator</h3>
                    </div>
                    <?php
                        $attributs = ['role' => 'form'];
                        echo form_open_multipart($this->uri->segment(1).'/edit_admin', $attributs);
                        echo "<input type='hidden' name='idadmin' value='$record[idadmin]'>";
                    ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_admin" value="<?= $record['nama_admin']; ?>" placeholder="Enter Nama Lengkap....">
                            </div>
                            <div class="form-group">
                                <label>Alamat Lengkap</label>
                                <input type="text" class="form-control" name="alamat" value="<?= $record['alamat']; ?>" placeholder="Enter Alamat Lengkap....">
                            </div>
                            <div class="form-group">
                                <label>Alamat E-Mail</label>
                                <input type="text" class="form-control" name="email" value="<?= $record['email']; ?>" placeholder="Enter Example@email.com">
                            </div>
                            <div class="form-group">
                                <label>Nomor Telephone</label>
                                <input type="text" class="form-control" name="no_telp" value="<?= $record['no_telp']; ?>" placeholder="Enter Nomor Telephone....">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" value="<?= $record['username']; ?>" placeholder="Enter Username....">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label>Pas Photo</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    <?= form_close(); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Status Data Administrator</h3>
                    </div>
                    <div class="box-body">
                        <ul class="nav nav-stacked">
                            <li><a href="#">Active <span class="pull-right badge bg-aqua">3</span></a></li>
                            <li><a href="#">Non-Active <span class="pull-right badge bg-red">3</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>