<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Management Users
            <small>Data Users</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-files-o"></i> Management Data Users/</a></li>
        </ol>   
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List Table Data Users</h3>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama Lengkap</td>
                                    <td>Alamat Lengkap</td>
                                    <td>E-mail</td>
                                    <td>Nomor Telephone</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if ($record === null) : ?>
                                <tr>
                                    <td colspan="7">Data Tidak Ditemukan</td>
                                </tr>
                            <?php else : ?>
                            <?php 
                            $no = 1;
                            foreach($record as $row) : 
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row['nama_users']; ?></td>
                                    <td><?= $row['alamat_users']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td><?= $row['telp']; ?></td>
                                    <td>
                                    <input class = "toggle_check"
                                            data-onstyle="success"
                                            data-size = "mini"
                                            data-on = "Aktif"
                                            data-off = "Non-Active"
                                            data-offstyle = "danger"
                                            type = "checkbox"
                                            data-toggle = "toggle"
                                            dataID = "<?= $row['idusers']; ?>"
                                            <?= ($row['status'] == "Y") ? "checked" : ""; ?>
                                    >
                                    </td>
                                    <td>
                                        <a href="<?= base_url().$this->uri->segment(1); ?>/delete_users/<?= $row['idusers']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
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
            $.post(base_url + "home/isActiveUser", 
            {id: id, isActive: isActive}, 
            function (response) {
            });
        });
    });
</script>