<section id="intro" class="intro">
    <div class="intro-content">
        <div class="container">
            <div class="row">
                <?php if ($this->session->username == '') : ?>
                    <div class="col-lg-6">
                        <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                            <h2 class="h-ultra">SISTEM PAKAR GIZI SEIMBANG</h2>
                        </div>
                        <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                            <h4 class="h-light">Diagnosis <span class="color">Gizi Seimbang menggunakan</span> Metode Forward Chaining</h4>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-wrapper">
                            <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
                                <div class="panel panel-skin">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><span class="fa fa-users"></span> Registration <small>(It's diagnosis!)</small></h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php
                                            $attributs = ['role' => 'form', 'class' => 'lead'];
                                            echo form_open_multipart($this->uri->segment(1).'/registrasi', $attributs); 
                                        ?>
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama Lengkap</label>
                                                        <input type="text" name="nama_users" class="form-control input-md">
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Alamat Lengkap</label>
                                                        <input type="text" name="alamat_users" class="form-control input-md">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" name="email" class="form-control input-md">
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone number</label>
                                                        <input type="text" name="telp" class="form-control input-md">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Umur Anda</label>
                                                        <input type="text" name="umur" class="form-control input-md">
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Username Anda</label>
                                                        <input type="text" name="username" class="form-control input-md">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Password Anda</label>
                                                        <input type="password" name="password" class="form-control input-md">
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Photo Anda</label>
                                                        <input type="file" name="image" class="form-control input-md">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" name="submit" value="Register" class="btn btn-skin btn-block btn-lg">
                                            <p class="lead-footer">* Silahkan Lakukan Registrasi Untuk Memulai Diagnosis</p>
                                        <?= form_close(); ?>
                                    </div>
                                </div>	
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="col-lg-6">
                        <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                            <h2 class="h-ultra">SISTEM PAKAR GIZI SEIMBANG</h2>
                        </div>
                        <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                            <h4 class="h-light">Diagnosis <span class="color">Gizi Seimbang menggunakan</span> Metode Forward Chaining</h4>
                        </div>
                        <div class="well well-trans">
                            <div class="wow fadeInRight" data-wow-delay="0.1s">
                            <ul class="lead-list">
                                <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Silahkan Lakukan Konsultasi</strong><br />Untuk Pengecekan Gizi Seimbang Anda</span></li>
                            </ul>
                            <p class="text-right wow bounceIn" data-wow-delay="0.4s">
                                <a href="<?= base_url(); ?>konsul/konsultasi" class="btn btn-skin btn-lg">Konsultasi<i class="fa fa-angle-right"></i></a>
                            </p>
                            </div>
                        </div>
                    </div>
                <?php endif ; ?>
                					
            </div>		
        </div>
    </div>		
</section>
<section id="partner" class="home-section paddingbot-60">	
    <div class="container marginbot-50">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                <div class="section-heading text-center">
                <h2 class="h-bold">TESTIMONIAL HEALTH</h2>
                <p>Rumah Sakit Umum Daerah Berkah Pandagelang yaitu rumah sakit Pemerintah Kelas B yang mampu memberikan pelayanan dari Dokter Umum ataupun Dokter Spesialis yang sudah berpengalaman. Rumah Sakit ini juga melayani Pasien rujukan yang berasal dari Pusat Kesehatan Masyarakat atau disebut juga Puskesmas</p>
                </div>
                </div>
                <div class="divider-short"></div>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="partner">
                    <a href="#"><img src="<?= base_url(); ?>media/test/1.jpg" alt="" style="width: 100%; height: 50%;" /></a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="partner">
                    <a href="#"><img src="<?= base_url(); ?>media/test/2.jpg" alt="" style="width: 100%; height: 50%;"/></a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="partner">
                    <a href="#"><img src="<?= base_url(); ?>media/test/3.jpg" alt="" style="width: 100%; height: 80%;"/></a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="partner">
                    <a href="#"><img src="<?= base_url(); ?>media/test/4.jpg" alt="" style="width: 100%; height: 50%;"/></a>
                    </div>
                </div>
            </div>
        </div>
</section>