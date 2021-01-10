<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $title; ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?= base_url().BOOT_CSS; ?>">
        <link rel="stylesheet" href="<?= base_url().FONT_CSS; ?>">
        <link rel="stylesheet" href="<?= base_url().ION_CSS; ?>">
        <link rel="stylesheet" href="<?= base_url().ADMIN_CSS; ?>">
        <link rel="stylesheet" href="<?= base_url().SKIN_CSS; ?>">
        <link rel="stylesheet" href="<?= base_url().DATATABLEBOOT_CSS; ?>">
        <link rel="stylesheet" href="<?= base_url().DATAPICKERBOOT_CSS; ?>">
        <link rel="stylesheet" href="<?= base_url().DATERANGE_CSS; ?>">
        <link rel="stylesheet" href="<?= base_url().BOOT3_CSS; ?>">
        <link rel="stylesheet" href="<?= BOOTTOGGLE_CSS; ?>">
        <link rel="stylesheet" href="<?= SWEET_CSS; ?>">
        <script src="<?= AJAX_JS; ?>"></script>
        <link rel="stylesheet" href="<?= GOOGLEFONT_CSS; ?>">
        <link rel="shortcut icon" type="image/png" href="<?= base_url().FAVICON_IMAGE; ?>" />
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include 'main-header.php'; ?>
            <?php include 'menu-admin.php'; ?>
            <?= $contents; ?>
            <?php include 'footer.php'; ?>
            <div class="control-sidebar-bg"></div>
        </div>
        <script src="<?= base_url().JQUERYMIN_JS; ?>"></script>
        <script src="<?= base_url().JQUERYUI_JS; ?>"></script>
        <script>
        $.widget.bridge('uibutton', $.ui.button);
        </script>
        <script src="<?= SWEET_JS; ?>"></script>
        <script src="<?= base_url().BOOTMIN_JS; ?>"></script>
        <script src="<?= base_url().MOMENTMIN_JS; ?>"></script>
        <script type="text/javascript" src="<?= BOOTTOGLE_JS; ?>"></script>
        <script src="<?= base_url().DATATABLE_JS; ?>"></script>
        <script src="<?= base_url().DATATABLEBOOTMIN_JS; ?>"></script>
        <script src="<?= base_url().DATERANGE_JS; ?>"></script>
        <script src="<?= base_url().DATEPICKER_JS; ?>"></script>
        <script src="<?= base_url().BOOT3_JS; ?>"></script>
        <script src="<?= base_url().SLIMSCROLL_JS; ?>"></script>
        <script src="<?= base_url().FASTCLICK_JS; ?>"></script>
        <script src="<?= base_url().ADMIN_JS; ?>"></script>
        <script src="<?= base_url().DEMO_JS; ?>"></script>
        <script>
            $(function () {
                $('#example1').DataTable()
                $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
                })
            })
        </script>
        <?php if ($this->session->flashdata('success')) : ?>
            <script>
                swal({
                type: 'success',
                title: 'Berhasil !!',
                text: '<?= $this->session->flashdata('success'); ?>'
                });
            </script>
        <?php endif ; ?>
        <?php if ($this->session->flashdata('error')) : ?>
            <script>
                swal({
                type: 'error',
                title: 'Gagal !!',
                text: '<?= $this->session->flashdata('error'); ?>'
                });
            </script>
        <?php endif ; ?>
    </body>
</html>
