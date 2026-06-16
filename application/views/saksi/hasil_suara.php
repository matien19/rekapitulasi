<div class="container-fluid">

<h3 class="mb-4">
    Hasil Input Suara TPS Anda
</h3>

<?= $this->session->flashdata('pesan'); ?>

<div class="card shadow">

<div class="card-body">

<div class="table-responsive">

<table class="table table-bordered">

<thead class="bg-primary text-white">

<tr>
    <th>No</th>
    <th>Foto</th>
    <th>Nama Caleg</th>
    <th>Partai</th>
    <th>Kategori</th>
    <th>Jumlah Suara</th>
    <th>Aksi</th>
    <th>Foto</th>
</tr>

</thead>

<tbody>

<?php
$no=1;
foreach($hasil as $h):
?>

<tr>

<td><?= $no++ ?></td>

<td>

<?php if($h->foto_caleg != ''): ?>
    <img src="<?= base_url('uploads/caleg/'.$h->foto_caleg) ?>"
         width="70">
<?php endif; ?>

</td>

<td><?= $h->nama_caleg ?></td>

<td><?= $h->partai ?></td>

<td><?= $h->kategori ?></td>

<td><?= $h->jumlah_suara ?></td>

<td>

    <?php if(!empty($h->foto_bukti)): ?>

        <a href="<?= base_url('uploads/suara/'.$h->foto_bukti) ?>"
           target="_blank"
           class="btn btn-primary btn-sm">

            <i class="fas fa-eye"></i>
            Lihat Foto

        </a>

    <?php else: ?>

        <span class="badge badge-danger">
            Tidak Ada Foto
        </span>

    <?php endif; ?>

</td>

<td>

<a href="<?= site_url('index.php/saksi/edit_suara/'.$h->id_suara) ?>"
   class="btn btn-warning btn-sm">

    Edit

</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>
</div>

<div class="mt-3">

    <a href="<?= site_url('index.php/saksi') ?>"
       class="btn btn-secondary">

        <i class="fas fa-arrow-left"></i> Kembali

    </a>


</div>

</div>

</div>

</div>