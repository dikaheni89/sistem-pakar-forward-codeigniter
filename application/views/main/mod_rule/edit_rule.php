<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Management Data Pengetahuan Pakar
            <small>Data Pengetahuan Pakar</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-files-o"></i> Management Data Pengetahuan Pakar/</a></li>
        </ol>   
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Edit Data Pengetahuan Pakar</h3>
                    </div>
                    <?php
                        $attributs = ['role' => 'form'];
                        echo form_open_multipart($this->uri->segment(1).'/edit_rule', $attributs);
                        echo "<input type='hidden' name='id_analisis_solusi' value='$rowws[id_analisis_solusi]'>"
                    ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Pilih Penyakit</label>
                                <select name="kd_penyakit" class="form-control">
                                    <option value="">PILIH......</option>
                                    <?php foreach($penyakit as $row) : ?>
                                        <?php if ($row['kd_penyakit'] == $rowws['kd_penyakit']) : ?>
                                            <option value="<?= $row['kd_penyakit']; ?>" selected="selected"><?= $row['nama_penyakit']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $row['kd_penyakit']; ?>"><?= $row['nama_penyakit']; ?></option>
                                        <?php endif ; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pilih Gejala</label>
                                <select name="kd_gejala" class="form-control">
                                    <option value="">PILIH......</option>
                                    <?php foreach($gejala as $rows) : ?>
                                        <?php if ($rows['kd_gejala'] == $rowws['kd_gejala']) : ?>
                                            <option value="<?= $rows['kd_gejala']; ?>" selected="selected"><?= $rows['gejala']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $rows['kd_gejala']; ?>"><?= $rows['gejala']; ?></option>
                                        <?php endif ; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jika Jawaban Ya</label>
                                <select name="jika_ya" class="form-control">
                                    <option value="">PILIH......</option>
                                    <option value="0">Diagnosis Berhenti</option>
                                    <?php foreach($gejala as $ya) : ?>
                                        <?php if ($ya['kd_gejala'] == $rowws['jika_ya']) : ?>
                                            <option value="<?= $ya['kd_gejala']; ?>" selected="selected"><?= $ya['kd_gejala']; ?> - <?= $ya['gejala']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $ya['kd_gejala']; ?>"><?= $ya['kd_gejala']; ?> - <?= $ya['gejala']; ?></option>
                                        <?php endif ; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jika Jawaban Tidak</label>
                                <select name="jika_tidak" class="form-control">
                                    <option value="">PILIH......</option>
                                    <option value="0">Diagnosis Berhenti</option>
                                    <?php foreach($gejala as $tidak) : ?>
                                        <?php if ($tidak['kd_gejala'] == $rowws['jika_tidak']) : ?>
                                            <option value="<?= $tidak['kd_gejala']; ?>" selected="selected"><?= $tidak['kd_gejala']; ?> - <?= $tidak['gejala']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $tidak['kd_gejala']; ?>"><?= $tidak['kd_gejala']; ?> - <?= $tidak['gejala']; ?></option>
                                        <?php endif ; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pilih Solusi</label>
                                <select name="solusi" class="form-control">
                                    <option value="">PILIH......</option>
                                    <option value="0">Belum Menemukan Solusi</option>
                                    <?php foreach($penyakit as $rowsss) : ?>
                                        <option value="<?= $rowsss['kd_penyakit']; ?>"><?= $rowsss['nama_penyakit']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </section>
</div>