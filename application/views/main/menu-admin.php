<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
            <?php $usr = $this->model_app->view_where('admin', ['username'=> $this->session->username])->row_array();
                if (trim($usr['image'])==''){ $foto = 'blank.png'; }else{ $foto = $usr['image']; } ?>
            <img src="<?= base_url(); ?>media/foto_admin/<?= $foto; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
            <p><?= $usr['nama_admin'];?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="<?= base_url().$this->uri->segment(1); ?>">
                    <i class="fa fa-home"></i> <span>Beranda</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Data Master</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url().$this->uri->segment(1); ?>/admin"><i class="fa fa-circle-o"></i> Management Admin</a></li>
                    <li><a href="<?= base_url().$this->uri->segment(1); ?>/users"><i class="fa fa-circle-o"></i> Data Users</a></li>
                    <li><a href="<?= base_url().$this->uri->segment(1); ?>/penyakit"><i class="fa fa-circle-o"></i> Management Data Penyakit</a></li>
                    <li><a href="<?= base_url().$this->uri->segment(1); ?>/gejala"><i class="fa fa-circle-o"></i> Management Data Gejala</a></li>
                </ul>
            </li>
            <li>
                <a href="<?= base_url().$this->uri->segment(1); ?>/rules">
                    <i class="fa fa-table"></i> <span>Data Pakar Diagnosis</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url().$this->uri->segment(1); ?>/laporan">
                    <i class="fa fa-file-pdf-o"></i> <span>Laporan Diagnosis</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url().$this->uri->segment(1); ?>/logout">
                    <i class="fa fa-mail-reply-all"></i> <span>Logout</span>
                </a>
            </li>
        </ul>
    </section>
</aside>