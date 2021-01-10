<?php
    $dataPoints = array( 
        array("y" => 100, "label" => "Umur 12" ),
        array("y" => 1000, "label" => "Umur 30" ),
        array("y" => 100, "label" => "Umur 50" ),
        array("y" => 80, "label" => "Umur 9" ),
        array("y" => 30, "label" => "Umur 40" ),
        array("y" => 30, "label" => "Umur 60" ),
        array("y" => 10, "label" => "Umur 70" )
    );
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>   
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?= $penyakit; ?></h3>
                        <p>Data Penyakit Gizi Buruk</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shield"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?= $gejala; ?></h3>
                        <p>Data Gejala</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-gears"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= $users; ?></h3>
                        <p>Data Users</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?= $penyakit; ?></h3>
                        <p>Data Hasil Diagnosis</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-database"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                        <li class="pull-left header"><i class="fa fa-line-chart"></i> Data Hasil Diagnosis</li>
                    </ul>
                    <div class="tab-content no-padding">
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
    window.onload = function() {
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: "Data Olah Hasil Diagnosis Berdarkan Umur"
        },
        axisY: {
            title: "Trafik Gizi Buruk (Pandeglang)"
        },
        data: [{
            type: "column",
            yValueFormatString: "#,##0.## orang",
            dataPoints: [      
                <?php foreach ($test as $key) : ?>
                { y: <?= $key['idusers']; ?>, label: "<?= $key['umur']; ?> Tahun" },
                <?php endforeach ; ?>
		    ]
        }]
    });
    chart.render(); 
    }
</script>