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
                        <h3 class="box-title">Form Tambah Data Pengetahuan Pakar</h3>
                    </div>
                    <?php
                        $attributs = ['role' => 'form'];
                        echo form_open_multipart($this->uri->segment(1).'/rules', $attributs);
                    ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Pilih Penyakit</label>
                                <select name="kd_penyakit" class="form-control">
                                    <option value="">PILIH......</option>
                                    <?php foreach($penyakit as $row) : ?>
                                        <option value="<?= $row['kd_penyakit']; ?>"><?= $row['nama_penyakit']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pilih Gejala</label>
                                <select name="kd_gejala" class="form-control">
                                    <option value="">PILIH......</option>
                                    <?php foreach($gejala as $rows) : ?>
                                        <option value="<?= $rows['kd_gejala']; ?>"><?= $rows['gejala']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jika Jawaban Ya</label>
                                <select name="jika_ya" class="form-control">
                                    <option value="">PILIH......</option>
                                    <option value="0">Diagnosis Berhenti</option>
                                    <?php foreach($gejala as $ya) : ?>
                                        <option value="<?= $ya['kd_gejala']; ?>"><?= $ya['kd_gejala']; ?> - <?= $ya['gejala']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jika Jawaban Tidak</label>
                                <select name="jika_tidak" class="form-control">
                                    <option value="">PILIH......</option>
                                    <option value="0">Diagnosis Berhenti</option>
                                    <?php foreach($gejala as $tidak) : ?>
                                        <option value="<?= $tidak['kd_gejala']; ?>"><?= $tidak['kd_gejala']; ?> - <?= $tidak['gejala']; ?></option>
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
                            <button type="submit" name="submit" class="btn btn-primary">Save Data</button>
                        </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List Table Data Penyakit</h3>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama Penyakit</td>
                                    <td>Pertanyaan Gejala</td>
                                    <td>Jika Jawaban ya</td>
                                    <td>Jika Jawaban tidak</td>
                                    <td>Status Diagnosis</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if ($record === null) : ?>
                                <tr>
                                    <td colspan="5">Data Tidak Ditemukan</td>
                                </tr>
                            <?php else : ?>
                            <?php 
                            $no = 1;
                            foreach($record as $roww) : 
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $roww['nama_penyakit']; ?></td>
                                    <td><?= $roww['gejala']; ?></td>
                                    <td><?= $roww['jika_ya']; ?></td>
                                    <td>
                                        <?php if ($roww['jika_tidak'] == '0') : ?>
                                            Diagnosis Berhenti
                                        <?php else : ?>
                                            Berlanjut Ke <?= $roww['jika_tidak']; ?>
                                        <?php endif ; ?>
                                    </td>
                                    <td>
                                    <?php if ($roww['solusi'] == '0') : ?>
                                        Diagnosis Berlanjut
                                    <?php else : ?>
                                        <?= $roww['solusi']; ?>
                                    <?php endif ; ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url().$this->uri->segment(1); ?>/edit_rule/<?= $roww['id_analisis_solusi']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="<?= base_url().$this->uri->segment(1); ?>/delete_rule/<?= $roww['id_analisis_solusi']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
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