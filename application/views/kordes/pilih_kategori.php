<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Pilih Kategori</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background:#f4f6f9;">

<div class="container py-5">

    <div class="card shadow border-0">

        <div class="card-body">

            <h3 class="mb-4">
                Pilih Kategori Input Suara
            </h3>

            <?= $this->session->flashdata('pesan'); ?>

            <div class="row">

                <!-- DPR RI -->
                <div class="col-lg-4 mb-4">

                    <div class="card border-0 shadow-sm">

                        <div class="card-body text-center">

                            <h4>DPR RI</h4>

                            <?php if(in_array('DPR RI', $sudah_input)): ?>

                                <button class="btn btn-secondary mt-3" disabled>

                                    Sudah Input

                                </button>

                            <?php else: ?>

                                <a href="<?= base_url('index.php/kordes/input_suara/'.$id_tps.'/dpr-ri') ?>"
                                   class="btn btn-danger mt-3">

                                    Input DPR RI

                                </a>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>

                <!-- DPRD PROVINSI -->
                <div class="col-lg-4 mb-4">

                    <div class="card border-0 shadow-sm">

                        <div class="card-body text-center">

                            <h4>DPRD PROVINSI</h4>

                            <?php if(in_array('DPRD PROVINSI', $sudah_input)): ?>

                                <button class="btn btn-secondary mt-3" disabled>

                                    Sudah Input

                                </button>

                            <?php else: ?>

                                <a href="<?= base_url('index.php/kordes/input_suara/'.$id_tps.'/dprd-provinsi') ?>"
                                   class="btn btn-warning mt-3">

                                    Input DPRD PROVINSI

                                </a>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>

                <!-- DPRD KABUPATEN -->
                <div class="col-lg-4 mb-4">

                    <div class="card border-0 shadow-sm">

                        <div class="card-body text-center">

                            <h4>DPRD KABUPATEN</h4>

                            <?php if(in_array('DPRD KABUPATEN', $sudah_input)): ?>

                                <button class="btn btn-secondary mt-3" disabled>

                                    Sudah Input

                                </button>

                            <?php else: ?>

                                <a href="<?= base_url('index.php/kordes/input_suara/'.$id_tps.'/dprd-kabupaten') ?>"
                                   class="btn btn-success mt-3">

                                    Input DPRD KABUPATEN

                                </a>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>