<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $title; ?></title>
    <link href="<?= base_url().BOOTSMINA_CSS; ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url().FONTWEB_CSS; ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url().CUBEPORTO_CSS; ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url().NIVOLIGHT_CSS; ?>" rel="stylesheet" />
	<link href="<?= base_url().DEFAULT_CSS; ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url().CAROUSEL_CSS; ?>" rel="stylesheet" media="screen" />
    <link href="<?= base_url().THEME_CSS; ?>" rel="stylesheet" media="screen" />
	<link href="<?= base_url().ANIMATE_CSS; ?>" rel="stylesheet" />
    <link href="<?= base_url().STYLE_CSS; ?>" rel="stylesheet">
    <link href="<?= SWEET_CSS; ?>" rel="stylesheet">
	<link id="bodybg" href="<?= base_url().BG_CSS; ?>" rel="stylesheet" type="text/css" />
	<link id="t-colors" href="<?= base_url().DEFAULTCOLOR_CSS; ?>" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="<?= base_url().FAVICON_IMAGE; ?>" />
</head>
    <body id="page-top" data-spy="scroll" data-target=".navbar-custom">
        <div id="wrapper">
            <?php include 'main-header.php'; ?>
            <?= $contents; ?>	
            <?php include 'footer.php'; ?>
        </div>
        <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
        <script src="<?= base_url(); ?>assets/frontend/js/jquery.min.js"></script>	 
        <script src="<?= base_url().BOOTWEB_JS; ?>"></script>
        <script src="<?= base_url().EASING_JS; ?>"></script>
        <script src="<?= base_url().WOW_JS; ?>"></script>
        <script src="<?= base_url().SCROLLTO_JS; ?>"></script>
        <script src="<?= base_url().APPEAR_JS; ?>"></script>
        <script src="<?= base_url().STELLAR_JS; ?>"></script>
        <script src="<?= base_url().CUBEPORTO_JS; ?>"></script>
        <script src="<?= base_url().CAROUSEl_JS; ?>"></script>
        <script src="<?= base_url().NIVOLIGHT_JS; ?>"></script>
        <script src="<?= base_url().COSTUM_JS; ?>"></script>
        <script src="<?= SWEET_JS; ?>"></script>
        <?php if ($this->session->flashdata('success')) : ?>
            <script>
                swal({
                type: 'success',
                title: 'Berhasil !!',
                text: '<?= $this->session->flashdata('success'); ?>'
                });
            </script>
        <?php endif ; ?>
    </body>
</html>
