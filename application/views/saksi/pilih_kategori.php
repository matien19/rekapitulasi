<div class="container mt-5">

    <h3>Pilih Kategori Input Suara</h3>

    <?= $this->session->flashdata('pesan'); ?>

    <div class="row mt-4">

        <!-- DPR RI -->
        <div class="col-md-4 mb-3">

            <?php if(in_array('DPR RI', $sudah_input)): ?>

                <button class="btn btn-secondary w-100" disabled>

                    DPR RI (SUDAH INPUT)

                </button>

            <?php else: ?>

                <a href="<?= base_url('index.php/saksi/input_suara/dpr-ri') ?>"
                   class="btn btn-primary w-100">

                    DPR RI

                </a>

            <?php endif; ?>

        </div>

        <!-- DPRD PROVINSI -->
        <div class="col-md-4 mb-3">

            <?php if(in_array('DPRD PROVINSI', $sudah_input)): ?>

                <button class="btn btn-secondary w-100" disabled>

                    DPRD PROVINSI (SUDAH INPUT)

                </button>

            <?php else: ?>

                <a href="<?= base_url('index.php/saksi/input_suara/dprd-provinsi') ?>"
                   class="btn btn-primary w-100">

                    DPRD PROVINSI

                </a>

            <?php endif; ?>

        </div>

        <!-- DPRD KABUPATEN -->
        <div class="col-md-4 mb-3">

            <?php if(in_array('DPRD KABUPATEN', $sudah_input)): ?>

                <button class="btn btn-secondary w-100" disabled>

                    DPRD KABUPATEN (SUDAH INPUT)

                </button>

            <?php else: ?>

                <a href="<?= base_url('index.php/saksi/input_suara/dprd-kabupaten') ?>"
                   class="btn btn-primary w-100">

                    DPRD KABUPATEN

                </a>

            <?php endif; ?>

        </div>

    </div>

</div>