<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="top-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                <p class="bold text-left"><?= date('d F Y'); ?> - <?= date('H:i:s'); ?></p>
                </div>
                <div class="col-sm-6 col-md-6">
                <p class="bold text-right"><?= CALL; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container navigation">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="index.html">
                <img src="<?= base_url().LOGO; ?>" alt="" width="150" height="40" />
            </a>
        </div>
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
            <?php if ($this->session->username == '') : ?>
                <li class="active"><a href="<?= base_url(); ?>">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profil <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url(); ?>publics/visimisi">Visi dan Misi</a></li>
                        <li><a href="<?= base_url(); ?>publics/struktur">Struktur Organisasi</a></li>
                        <li><a href="<?= base_url(); ?>publics/sejarah">Sejarah</a></li>
                    </ul>
                </li>
                <li><a href="<?= base_url(); ?>publics/informasi">Informasi Gizi Seimbang</a></li>
                <li><a href="<?= base_url(); ?>publics/gallery">Gallery</a></li>
                <li><a href="<?= base_url(); ?>publics/about">About Me</a></li>
                <li><a href="<?= base_url(); ?>publics/login">Login</a></li>
            <?php else : ?>
                <li class="active"><a href="<?= base_url(); ?>">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profil <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url(); ?>konsul/visimisi">Visi dan Misi</a></li>
                        <li><a href="<?= base_url(); ?>konsul/struktur">Struktur Organisasi</a></li>
                        <li><a href="<?= base_url(); ?>konsul/sejarah">Sejarah</a></li>
                    </ul>
                </li>
                <li><a href="<?= base_url(); ?>konsul/informasi">Informasi Gizi Seimbang</a></li>
                <li><a href="<?= base_url(); ?>konsul/gallery">Gallery</a></li>
                <li><a href="<?= base_url(); ?>konsul/konsultasi">Konsultasi</a></li>
                <li><a href="<?= base_url(); ?>konsul/about">About Me</a></li>
                <li><a href="<?= base_url(); ?>konsul/logout">Logout</a></li>
            <?php endif ; ?>
                
            </ul>
        </div>
    </div>
</nav>
