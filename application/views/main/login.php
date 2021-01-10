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
        <link rel="stylesheet" href="<?= base_url(); ?>">
        <link rel="stylesheet" href="<?= SWEET_CSS; ?>">
        <link rel="stylesheet" href="<?= GOOGLEFONT_CSS; ?>">
        <link rel="shortcut icon" type="image/png" href="<?= base_url().FAVICON_IMAGE; ?>" />
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b><?= $judul; ?></b></a>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg"><?= TITLE; ?></p>
                <?php
                $attributs = ['role' => 'form'];
                echo form_open_multipart($this->uri->segment(1).'', $attributs); 
                ?>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="username" placeholder="username">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                            <input type="checkbox"> Remember Me
                            </label>
                        </div>
                        </div>
                        <div class="col-xs-4">
                        <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                    </div>
                <?= form_close(); ?>
                <a href="#">I forgot my password</a><br>
            </div>
        </div>
        <script src="<?= base_url().JQUERYMIN_JS; ?>"></script>
        <script src="<?= base_url().BOOTMIN_JS; ?>"></script>
        <script src="<?= base_url().ICHECK_JS; ?>"></script>
        <script src="<?= SWEET_JS; ?>"></script>
        <script>
        $(function () {
            $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%'
            });
        });
        </script>
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
