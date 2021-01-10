<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Management Admin
            <small>Data Administrator</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-files-o"></i> Management Data Admin/</a></li>
        </ol>   
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Tambah Data Administrator</h3>
                    </div>
                    <?php
                        $attributs = ['role' => 'form'];
                        echo form_open_multipart($this->uri->segment(1).'/admin', $attributs);
                    ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_admin" placeholder="Enter Nama Lengkap....">
                            </div>
                            <div class="form-group">
                                <label>Alamat Lengkap</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Enter Alamat Lengkap....">
                            </div>
                            <div class="form-group">
                                <label>Alamat E-Mail</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter Example@email.com">
                            </div>
                            <div class="form-group">
                                <label>Nomor Telephone</label>
                                <input type="text" class="form-control" name="no_telp" placeholder="Enter Nomor Telephone....">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Enter Username....">
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
                            <button type="submit" name="submit" class="btn btn-primary">Save Data</button>
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
                            <li><a href="#">Active <span class="pull-right badge bg-aqua"><?= $rows['Active']; ?></span></a></li>
                            <li><a href="#">Non-Active <span class="pull-right badge bg-red"><?= $rows['Non_Active']; ?></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List Table Data Administrator</h3>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama Lengkap</td>
                                    <td>Alamat Lengkap</td>
                                    <td>E-mail</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if ($record === null) : ?>
                                <tr>
                                    <td colspan="6">Data Tidak Ditemukan</td>
                                </tr>
                            <?php else : ?>
                            <?php 
                            $no = 1;
                            foreach($record as $row) : 
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row['nama_admin']; ?></td>
                                    <td><?= $row['alamat']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td>
                                    <input class = "toggle_check"
                                            data-onstyle="success"
                                            data-size = "mini"
                                            data-on = "Aktif"
                                            data-off = "Non-Active"
                                            data-offstyle = "danger"
                                            type = "checkbox"
                                            data-toggle = "toggle"
                                            dataID = "<?= $row['idadmin']; ?>"
                                            <?= ($row['status_active'] == "Y") ? "checked" : ""; ?>
                                    >
                                    </td>
                                    <td>
                                        <a href="<?= base_url().$this->uri->segment(1); ?>/edit_admin/<?= $row['idadmin']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="<?= base_url().$this->uri->segment(1); ?>/delete_admin/<?= $row['idadmin']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
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
<script>
    $(document).ready(function () {
        var base_url = $(".base_url").text();
        $('.toggle_check').bootstrapToggle();
        $('.toggle_check').change(function () {
            var isActive = $(this).prop('checked');
            var id       = $(this).attr("dataID");
            $.post(base_url + "home/isActiveSetter", 
            {id: id, isActive: isActive}, 
            function (response) {
            });
        });
    });
</script>