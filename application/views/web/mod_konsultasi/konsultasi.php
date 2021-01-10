<section id="partner" class="home-section paddingbot-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                    <div class="section-heading text-center">
                        <h2 class="h-bold">Silahkan Lakukan Konsultasi Anda <?= $this->session->nama; ?></h2>
                    </div>
                </div>
                <div class="divider-short"></div>
            </div>
        </div>
    </div>
</section>
<section class="home-section paddingbot-60" style="padding-top: 10px;">	
    <div class="container marginbot-50" style="padding-left: 50px;">
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <img src="<?= base_url(); ?>media/img-1.jpg" class="img-responsive" alt="" />
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="wow fadeInRight" data-wow-delay="0.1s">
                    <div class="service-box">
                        <div class="service-icon">
                            <span class="fa fa-stethoscope fa-3x"></span>
                        </div>
                        <div class="service-desc">
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
                            <h5 class="h-light">Diagnosa</h5>
                            <script type="text/javascript">
                                function proses(form){
                                var aksi;
                                var id_analisis_solusi, kd_gejala, kd_penyakit, jika_ya, jika_tidak, solusi, idtanya, pertanyaan, datanya;
                                if((document.form1.rdoya[0].checked=="")&&(document.form1.rdoya[1].checked=="")){ 
                                    swal({
                                        type: 'warning',
                                        title: 'Perhatian',
                                        text: 'Anda Belum Menentukan Jawaban'
                                    }); 
                                    return false;
                                }else if(document.form1.rdoya[0].checked){ 
                                    idtanya=document.form1.rdoya[0].value;
                                    aksi="jika_ya"
                                    datanya="&idtanya="+idtanya+"&aksi="+aksi;
                                    $.ajax({
                                    url : "<?= base_url('konsul/cek_ya')?>",
                                    data : datanya,
                                    cache : false,
                                    success : function(msg){
                                        data=msg.split("|");
                                        callback=data[0];
                                        if(callback=="solusi tidak ada"){
                                            $("#hasil").html(callback);
                                            $("#hasil").html(kd_gejala=data[1]); 
                                            $("#hasil").html(""); 
                                            kd_gejala=data[1];
                                            jika_ya=data[2];
                                            pertanyaan=data[3];
                                            jika_tidak=data[4];
                                            document.form1.rdoya[0].value=jika_ya;
                                            document.form1.rdoya[1].value=jika_tidak;
                                            document.form1.gejala.value=jika_ya;
                                            $("#lbltanya").html("Apakah "+pertanyaan+"..?");
                                            document.form1.rdoya[0].checked=false;
                                            }else{
                                                txtkd_penyakit=data[1];
                                                solusi=data[2];
                                                definisi=data[3];
                                                sol=data[4];
                                                txtkd_gejala=data[5];
                                                xkdsol=data[6];
                                                var html_nama="<span style='color: black;'>Nama : <?= $this->session->nama; ?></span><br />";
                                                var html_umur="<span style='color: black;'>Umur Pendiagnosis: <?= $this->session->umur; ?> Tahun</span><br />";
                                                var html_alamat="<span style='color: black;'>Alamat: <?= $this->session->alamat_users; ?></span><br />";
                                                var html_tlp="<span style='color: black;'>Nomor Telephone : <?= $this->session->telp; ?></span><br />";
                                                var html_tgl="<span style='color: black;'>Tanggal Diagnosis : <?= date('d-m-Y h:i:sa') ?></span><br />";
                                                var html_hasil="<span style='color: black;'><strong>Anda Mengidap Penyakit : "+solusi+"</strong></span>"+"<p style='color: black;'><strong>Keterangan Mengenai Penyakit : </strong>"+definisi+"</p>";
                                                var data_user;
                                                
                                                $("#txtkd_gejala").val(xkdsol);
                                                var html_sol="<p style='color: black;'><strong>Solusi : </strong> "+sol+"</p>";
                                                var html_btn="<input type='button' onclick='analisa();' class='btn btn-success btn-rounded w-md waves-effect waves-light m-b-5' value='Ulang Diagnosa' /> || <a href='<?= base_url('konsul/cetaklaps/') ?>"+txtkd_penyakit+"' target='_blank'><input type='button' class='btn btn-primary btn-rounded w-md waves-effect waves-light m-b-5' value='Cetak Hasil Diagnosis' /></a>";
                                                $("#frmtanya").hide(200); 
                                                $("#lblcommand").hide(200);
                                                $("#lbltanya").hide(200);
                                                $("#hasil").html(html_nama+html_umur+html_alamat+html_tlp+html_tgl+html_hasil+html_sol+html_btn);
                                                var kd_penyakit=txtkd_penyakit;
                                                var kd_gejala=txtkd_gejala;
                                                $.ajax({
                                                url:"<?= base_url('konsul/submit') ?>",
                                                data:"&kd_penyakit="+kd_penyakit,
                                                cache:false,
                                                success:function(msg){
                                                    console.log(msg);
                                                    }
                                                });
                                        }
                                    }
                                });
                                return false;
                                }else if(document.form1.rdoya[1].checked){
                                    idtanya=document.form1.rdoya[1].value;
                                    aksi="jika_tidak"
                                    datanya="&idtanya="+idtanya+"&aksi="+aksi;
                                    $.ajax({
                                    url : "<?= base_url('konsul/cek_ya')?>",
                                    data : datanya,
                                    cache : false,
                                    success : function(msg){
                                        data=msg.split("|");
                                        callback=data[0];
                                        if(callback=="solusi tidak ada"){
                                            $("#hasil").html(callback);
                                            $("#hasil").html("");  
                                            kd_gejala=data[1];
                                            jika_ya=data[2];
                                            pertanyaan=data[3];
                                            jika_tidak=data[4];
                                            document.form1.rdoya[0].value=jika_ya;
                                            document.form1.rdoya[1].value=jika_tidak;
                                            document.form1.gejala.value=jika_tidak;
                                            $("#lbltanya").html("Apakah "+pertanyaan+"..?");
                                            document.form1.rdoya[1].checked=false;
                                            }else{
                                                solusi=data[1];
                                                definisi=data[2];
                                                sol=data[3];
                                                xkdsol=data[4];
                                                //cek kosong data hasil
                                                var solx; solx=sol;
                                                if(solx=""){
                                                    var html_kosong="Data Kosong :"; $("#lblnotsolusi").html(html_kosong); 
                                                    }else{
                                                        var html_ada="<font color='#ff0000'>Anda Dalam Keadaan Sehat Terima Kasih Telah Berkunjung...!</font>"; $("#lblnotsolusi").html(html_ada);
                                                        $("#hasil").hide(200);
                                                        $("#frmnotsolusi").show(200);
                                                        } 
                                                
                                                var html_hasil="<p><strong>Anda Mengalami Penyakit : "+solusi+"</strong></p>"+"<p><strong>Keterangan Penyakit : </strong>"+definisi+"</p>";
                                                $("#txtkd_penyakit").val(xkdsol);
                                                var html_sol="<p><strong>Solusi : </strong> "+sol+"</p>";
                                                
                                                var html_btn="<input type='button' onclick='analisa();' value='Ulang Diagnosis' />";
                                                $("#frmtanya").hide(200); 
                                                $("#lblcommand").hide(200);
                                                $("#lbltanya").hide(200);
                                                $("#hasil").html(html_hasil+html_sol+html_btn);
                                                }
                                            }
                                        });
                                        return false;
                                        }
                                    }

                                function ya(chk){
                                
                                }
                                function analisa(){window.location="<?= base_url('konsul/konsultasi')?>";}
                                function cek_radio(){
                                if(document.form1.rdoya[0].checked){ alert("jawaban ya");
                                    }else if(document.form1.rdoya[1].checked){ alert("jawaban tidak");}
                                }
                            </script>
                            <div class="card-box te">
                                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td colspan="3">
                                            <label style="font-weight:bold; font-family: viga; font-size: 28px; color: black;" id="lbltanya">
                                            <?php
                                                foreach ($rowsss as $key) {
                                                echo "Apakah ".$key['gejala']."..?";   
                                            ?>
                                            </label><br />
                                            <label id="lblya"></label>
                                            <label id="lbltidak"></label>
                                            <label id="lblgejala"></label>
                                            <label id="lblsolusi"></label>
                                            <br />
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <div id="frmtanya" style="font-family: viga; font-size: 20px;">
                                                <form name="form1" id="form1" method="get" onsubmit="return proses(this);">
                                                    <input type="hidden" name="textid_analisis_solusi" value="<?= $key['id_analisis_solusi'] ?>">
                                                    <input type="hidden" name="txtkd_gejala" id="txtkd_gejala" value="<?= $key['kd_gejala'] ?>">
                                                    <input type="hidden" name="txtkd_penyakit" id="txtkd_penyakit" value="<?= $key['kd_penyakit'] ?>">
                                                    <input type="hidden" name="txtsolusi" value="<?= $key['solusi'] ?>">
                                                    <div class="radio radio-primary">
                                                        <input type="radio" name="rdoya" id="rdoya" value="<?= $key['jika_ya'] ?>">
                                                        <label id="rdoya0" style="color: black;">Benar</label>
                                                    </div>
                                                    <div class="radio radio-danger">
                                                        <input type="radio" name="rdoya" id="rdoya" value="<?= $key['jika_tidak'] ?>">
                                                        <label id="rdoya1" style="color: black;">Tidak Benar</label>
                                                    </div><br><br>
                                                    <?php } ?>
                                                    <input type="hidden" id="gejala" name="gejala">
                                                    <button type="submit" name="submit" class="btn btn-info btn-rounded w-md waves-effect waves-light m-b-5">Proses</button>
                                                    <button type="button" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5" onclick="analisa();" >Ulang Diagnosis</button>
                                                </form>
                                            </div>
                                            <div style="font-weight:bold; font-family: viga; font-size: 14px; color: black;" id="hasil"></div>
                                            <label id="lblnotsolusi"></label><br />
                                            <div style="display: none;" id="frmnotsolusi">
                                                Silahkan Ulangi Diagnosis
                                                <button type="button" class="btn btn-warning btn-rounded w-md waves-effect waves-light m-b-5" onclick="analisa();" >Ulang Diagnosis</button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>