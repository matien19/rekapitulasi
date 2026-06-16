<div class="container mt-4">

    <h3>
        Input Suara <?= $kategori; ?>
    </h3>

    <?= $this->session->flashdata('pesan'); ?>

    <form method="post"
          enctype="multipart/form-data"
          action="<?= base_url('index.php/saksi/simpan') ?>">

        <input type="hidden"
               name="kategori"
               value="<?= $kategori; ?>">

        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead class="table-dark">

                    <tr>

                        <th width="50">No</th>

                        <th width="120">Foto</th>

                        <th>Nama Caleg</th>

                        <th>Partai</th>

                        <th width="200">Jumlah Suara</th>

                    </tr>

                </thead>

                <tbody>

                    <?php
                    $no = 1;

                    foreach($caleg as $c) :
                    ?>

                    <tr>

                        <td>
                            <?= $no++; ?>
                        </td>

                        <td class="text-center">

                            <?php if(!empty($c->foto)) : ?>

                                <img src="<?= base_url('uploads/caleg/'.$c->foto) ?>"
                                     width="80"
                                     height="80"
                                     style="object-fit:cover;border-radius:10px;">

                            <?php else : ?>

                                <img src="<?= base_url('assets/no-image.png') ?>"
                                     width="80"
                                     height="80"
                                     style="object-fit:cover;border-radius:10px;">

                            <?php endif; ?>

                        </td>

                        <td>

                            <?= $c->nama_caleg; ?>

                            <input type="hidden"
                                   name="id_caleg[]"
                                   value="<?= $c->id_caleg; ?>">

                        </td>

                        <td>
                            <?= $c->partai; ?>
                        </td>

                        <td>

                            <input type="number"
                                   name="jumlah_suara[]"
                                   class="form-control"
                                   min="0"
                                   value="0"
                                   required>

                        </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

        <!-- FOTO BUKTI C1 -->
        <div class="card border-primary mb-3">

            <div class="card-header bg-primary text-white">
                Upload Foto Bukti C1
            </div>

            <div class="card-body">

                <input type="file"
                       name="foto"
                       class="form-control"
                       accept=".jpg,.jpeg,.png"
                       required>

                <small class="text-muted">
                    Upload foto formulir C1 / bukti perolehan suara.
                </small>

            </div>

        </div>

        <button type="submit"
                class="btn btn-primary">

            Simpan Suara

        </button>

        <a href="<?= base_url('index.php/saksi/pilih_kategori') ?>"
           class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>