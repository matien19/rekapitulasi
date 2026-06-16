<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Pilih TPS
    </h1>

    <?= $this->session->flashdata('pesan'); ?>

    <div class="row">

        <?php foreach($tps as $t): ?>

            <div class="col-lg-4 mb-4">

                <div class="card shadow border-0 h-100">

                    <div class="card-body text-center">

                        <h2 class="fw-bold">
                            <?= $t->nama_tps ?>
                        </h2>

                        <p class="text-muted">
                            <?= $t->nama_desa ?>
                        </p>

                        <!-- BELUM ADA SAKSI -->
                        <?php if($t->status_input == 'belum_ada_saksi'): ?>

                            <div class="alert alert-danger py-2">

                                <i class="fa fa-user-times"></i>
                                Belum ada saksi

                            </div>

                            <a href="<?= base_url('index.php/kordes/pilih_kategori/'.$t->id_tps) ?>"
                               class="btn btn-primary w-100">

                                Input Suara

                            </a>

                        <!-- ADA SAKSI TAPI BELUM INPUT -->
                        <?php elseif($t->status_input == 'saksi_belum_input'): ?>

                            <div class="alert alert-warning py-2">

                                <i class="fa fa-clock"></i>
                                Saksi belum input suara

                            </div>

                            <button class="btn btn-warning w-100" disabled>

                                Menunggu Saksi

                            </button>

                        <!-- SUDAH LENGKAP -->
                        <?php elseif($t->status_input == 'selesai'): ?>

                            <div class="alert alert-success py-2">

                                <i class="fa fa-check-circle"></i>
                                Semua kategori sudah diinput

                            </div>
                            
                        <!-- MASIH PROSES -->
                        <?php elseif($t->status_input == 'proses'): ?>

                            <div class="alert alert-info py-2">

                                <i class="fa fa-spinner"></i>
                                Sebagian kategori sudah diinput

                            </div>

                        <!-- BELUM INPUT -->
                        <?php else: ?>

                            <div class="alert alert-secondary py-2">

                                <i class="fa fa-pencil"></i>
                                Belum input suara

                            </div>

                            <a href="<?= base_url('index.php/kordes/pilih_kategori/'.$t->id_tps) ?>"
                               class="btn btn-secondary w-100">

                                Input Suara

                            </a>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</div>