<div class="container-fluid">

    <!-- PAGE HEADING -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800">
            Dashboard Rekapitulasi Suara
        </h1>

    </div>

    <!-- ================= CARD ================= -->
    <div class="row">

        <!-- TOTAL TPS -->
        <div class="col-xl-3 col-md-6 mb-4">

            <div class="card border-left-primary shadow h-100 py-2">

                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total TPS
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                <?= number_format($total_tps) ?>

                            </div>

                        </div>

                        <div class="col-auto">

                            <i class="fas fa-map-marker-alt fa-2x text-gray-300"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- TOTAL SAKSI -->
        <div class="col-xl-3 col-md-6 mb-4">

            <div class="card border-left-success shadow h-100 py-2">

                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Saksi
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                <?= number_format($total_saksi) ?>

                            </div>

                        </div>

                        <div class="col-auto">

                            <i class="fas fa-users fa-2x text-gray-300"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- TOTAL SUARA -->
        <div class="col-xl-3 col-md-6 mb-4">

            <div class="card border-left-info shadow h-100 py-2">

                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Suara
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                <?= number_format($total_suara) ?>

                            </div>

                        </div>

                        <div class="col-auto">

                            <i class="fas fa-poll fa-2x text-gray-300"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- DPR RI -->
        <div class="col-xl-3 col-md-6 mb-4">

            <div class="card border-left-warning shadow h-100 py-2">

                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total DPR RI
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                <?= number_format($total_dpr_ri) ?>

                            </div>

                        </div>

                        <div class="col-auto">

                            <i class="fas fa-chart-bar fa-2x text-gray-300"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- ================= ROW 2 ================= -->
    <div class="row">

        <!-- DPRD PROVINSI -->
        <div class="col-xl-6 col-md-6 mb-4">

            <div class="card border-left-primary shadow h-100 py-2">

                <div class="card-body">

                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total DPRD Provinsi
                    </div>

                    <div class="h4 mb-0 font-weight-bold text-gray-800">

                        <?= number_format($total_dprd_provinsi) ?>

                    </div>

                </div>

            </div>

        </div>

        <!-- DPRD KABUPATEN -->
        <div class="col-xl-6 col-md-6 mb-4">

            <div class="card border-left-success shadow h-100 py-2">

                <div class="card-body">

                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total DPRD Kabupaten
                    </div>

                    <div class="h4 mb-0 font-weight-bold text-gray-800">

                        <?= number_format($total_dprd_kabupaten) ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- ================= DPR RI ================= -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Grafik Perolehan DPR RI
            </h6>

        </div>

        <div class="card-body">

            <canvas id="chartDprRi" height="100"></canvas>

            <hr>

            <h5 class="font-weight-bold text-primary mb-4">
                Persentase Perolehan Suara DPR RI
            </h5>

            <?php
            $total_semua_dprri = 0;

            foreach($dpr_ri as $d){

                $total_semua_dprri += $d['total_suara'];
            }
            ?>

            <?php foreach($dpr_ri as $d): ?>

            <?php
            $persen = 0;

            if($total_semua_dprri > 0){

                $persen = ($d['total_suara'] / $total_semua_dprri) * 100;
            }
            ?>

            <h4 class="small font-weight-bold">

                <?= $d['nama_caleg'] ?>

                <span class="float-right">

                    <?= number_format($d['total_suara']) ?> suara
                    (<?= number_format($persen,1) ?>%)

                </span>

            </h4>

            <div class="progress mb-4">

                <div class="progress-bar bg-primary"
                     role="progressbar"
                     style="width: <?= $persen ?>%">

                </div>

            </div>

            <?php endforeach; ?>

        </div>

    </div>

    <!-- ================= DPRD PROVINSI ================= -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-success">
                Grafik Perolehan DPRD Provinsi
            </h6>

        </div>

        <div class="card-body">

            <canvas id="chartProvinsi" height="100"></canvas>

            <hr>

            <h5 class="font-weight-bold text-success mb-4">
                Persentase Perolehan DPRD Provinsi
            </h5>

            <?php
            $total_semua_provinsi = 0;

            foreach($dprd_provinsi as $d){

                $total_semua_provinsi += $d['total_suara'];
            }
            ?>

            <?php foreach($dprd_provinsi as $d): ?>

            <?php
            $persen = 0;

            if($total_semua_provinsi > 0){

                $persen = ($d['total_suara'] / $total_semua_provinsi) * 100;
            }
            ?>

            <h4 class="small font-weight-bold">

                <?= $d['nama_caleg'] ?>

                <span class="float-right">

                    <?= number_format($d['total_suara']) ?> suara
                    (<?= number_format($persen,1) ?>%)

                </span>

            </h4>

            <div class="progress mb-4">

                <div class="progress-bar bg-success"
                     role="progressbar"
                     style="width: <?= $persen ?>%">

                </div>

            </div>

            <?php endforeach; ?>

        </div>

    </div>

    <!-- ================= DPRD KABUPATEN ================= -->
    <?php foreach($dprd_kabupaten as $dapil => $caleg_list): ?>

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-warning">
                Grafik DPRD Kabupaten - <?= $dapil ?>
            </h6>

        </div>

        <div class="card-body">

            <canvas id="chart_<?= md5($dapil) ?>" height="100"></canvas>

            <hr>

            <h5 class="font-weight-bold text-warning mb-4">
                Persentase Perolehan <?= $dapil ?>
            </h5>

            <?php
            $total_dapil = 0;

            foreach($caleg_list as $c){

                $total_dapil += $c['total_suara'];
            }
            ?>

            <?php foreach($caleg_list as $c): ?>

            <?php
            $persen = 0;

            if($total_dapil > 0){

                $persen = ($c['total_suara'] / $total_dapil) * 100;
            }
            ?>

            <h4 class="small font-weight-bold">

                <?= $c['nama_caleg'] ?>

                <span class="float-right">

                    <?= number_format($c['total_suara']) ?> suara
                    (<?= number_format($persen,1) ?>%)

                </span>

            </h4>

            <div class="progress mb-4">

                <div class="progress-bar bg-warning"
                     role="progressbar"
                     style="width: <?= $persen ?>%">

                </div>

            </div>

            <?php endforeach; ?>

        </div>

    </div>

    <?php endforeach; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

// ================= DPR RI =================
new Chart(document.getElementById('chartDprRi'), {

    type: 'bar',

    data: {

        labels: [

            <?php foreach($dpr_ri as $d): ?>

                '<?= $d['nama_caleg'] ?>',

            <?php endforeach; ?>

        ],

        datasets: [{

            label: 'Jumlah Suara',

            data: [

                <?php foreach($dpr_ri as $d): ?>

                    <?= $d['total_suara'] ?>,

                <?php endforeach; ?>

            ],

            backgroundColor: '#4e73df'

        }]
    },

    options: {

        responsive: true,

        plugins: {

            legend: {

                display: false
            }
        }
    }
});

// ================= DPRD PROVINSI =================
new Chart(document.getElementById('chartProvinsi'), {

    type: 'bar',

    data: {

        labels: [

            <?php foreach($dprd_provinsi as $d): ?>

                '<?= $d['nama_caleg'] ?>',

            <?php endforeach; ?>

        ],

        datasets: [{

            label: 'Jumlah Suara',

            data: [

                <?php foreach($dprd_provinsi as $d): ?>

                    <?= $d['total_suara'] ?>,

                <?php endforeach; ?>

            ],

            backgroundColor: '#1cc88a'

        }]
    },

    options: {

        responsive: true,

        plugins: {

            legend: {

                display: false
            }
        }
    }
});


// ================= DPRD KABUPATEN PER DAPIL =================
<?php foreach($dprd_kabupaten as $dapil => $caleg_list): ?>

new Chart(document.getElementById('chart_<?= md5($dapil) ?>'), {

    type: 'bar',

    data: {

        labels: [

            <?php foreach($caleg_list as $c): ?>

                '<?= $c['nama_caleg'] ?>',

            <?php endforeach; ?>

        ],

        datasets: [{

            label: 'Jumlah Suara',

            data: [

                <?php foreach($caleg_list as $c): ?>

                    <?= $c['total_suara'] ?>,

                <?php endforeach; ?>

            ],

            backgroundColor: '#f6c23e'

        }]
    },

    options: {

        responsive: true,

        plugins: {

            legend: {

                display: false
            }
        }
    }
});

<?php endforeach; ?>

</script>