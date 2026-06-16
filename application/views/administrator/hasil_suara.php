<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Hasil Suara
    </h1>

    <div class="card shadow mb-4">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped">

                    <thead class="bg-primary text-white">

                        <tr>

                            <th>No</th>
                            <th>TPS</th>
                            <th>Foto Caleg</th>
                            <th>Foto Bukti</th>
                            <th>Nama Caleg</th>
                            <th>Kategori</th>
                            <th>Partai</th>
                            <th>Jumlah Suara</th>
                            <th>Tanggal</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if(!empty($hasil)) : ?>

                            <?php
                            $no = 1;

                            foreach($hasil as $h) :
                            ?>

                            <tr>

                                <td>
                                    <?= $no++; ?>
                                </td>

                                <td>
                                    <?= $h->nama_tps; ?>
                                </td>

                                <!-- FOTO CALEG -->
                                <td class="text-center">

                                    <?php if(!empty($h->foto_caleg)) : ?>

                                        <img src="<?= base_url('uploads/caleg/'.$h->foto_caleg) ?>"
                                             width="70"
                                             height="70"
                                             style="object-fit:cover;border-radius:10px;">

                                    <?php else : ?>

                                        <img src="<?= base_url('assets/no-image.png') ?>"
                                             width="70"
                                             height="70"
                                             style="object-fit:cover;border-radius:10px;">

                                    <?php endif; ?>

                                </td>

                                <!-- FOTO BUKTI SAKSI -->
                                <td class="text-center">

                                    <?php if(!empty($h->foto)) : ?>

                                        <a href="<?= base_url('uploads/suara/'.$h->foto) ?>"
                                           target="_blank">

                                            <img src="<?= base_url('uploads/suara/'.$h->foto) ?>"
                                                 width="70"
                                                 height="70"
                                                 style="object-fit:cover;border-radius:10px;">

                                        </a>

                                    <?php else : ?>

                                        <span class="badge badge-danger">
                                            Belum Ada
                                        </span>

                                    <?php endif; ?>

                                </td>

                                <td>
                                    <?= $h->nama_caleg; ?>
                                </td>

                                <td>

                                    <span class="badge badge-info p-2">

                                        <?= $h->kategori; ?>

                                    </span>

                                </td>

                                <td>

                                    <?= $h->partai; ?>

                                </td>

                                <td>

                                    <span class="badge badge-success p-2">

                                        <?= number_format($h->jumlah_suara); ?>

                                    </span>

                                </td>

                                <td>

                                    <?= date(
                                        'd-m-Y H:i',
                                        strtotime($h->created_at)
                                    ); ?>

                                </td>

                            </tr>

                            <?php endforeach; ?>

                        <?php else : ?>

                            <tr>

                                <td colspan="9" class="text-center">

                                    Belum ada data suara

                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>