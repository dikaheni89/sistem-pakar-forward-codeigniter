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
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List Table Data Hasil Diagnosis</h3>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama Diagnosis</td>
                                    <td>Alamat Lengkap</td>
                                    <td>E-mail</td>
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
                                    <td><?= $row['nama_users']; ?></td>
                                    <td><?= $row['alamat_users']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td>
                                        <a href="<?= base_url().$this->uri->segment(1); ?>/cetak_hasil/<?= $row['id_hasil']; ?>" class="btn btn-warning btn-sm" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                                        <a href="<?= base_url().$this->uri->segment(1); ?>/delete_hasil/<?= $row['id_hasil']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
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