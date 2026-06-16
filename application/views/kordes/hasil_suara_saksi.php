<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">
    Hasil Input Suara
</h1>

<div class="card shadow">
<div class="card-body">

<div class="table-responsive">

<table class="table table-bordered">

<thead class="bg-primary text-white">
<tr>
    <th>No</th>
    <th>TPS</th>
    <th>Caleg</th>
    <th>Partai</th>
    <th>Kategori</th>
    <th>Jumlah Suara</th>
    <th>Foto</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>

<?php $no=1; foreach($hasil as $h): ?>

<tr>
    <td><?= $no++ ?></td>
    <td><?= $h->nama_tps ?></td>
    <td><?= $h->nama_caleg ?></td>
    <td><?= $h->partai ?></td>
    <td><?= $h->kategori ?></td>
    <td><?= $h->jumlah_suara ?></td>

    <td>
        <?php if($h->foto != ''): ?>
            <a href="<?= base_url('uploads/suara/'.$h->foto) ?>" target="_blank">
               Lihat Foto
            </a>
        <?php endif; ?>
    </td>

    <td>

<a href="<?= site_url('index.php/kordes/edit_suara/'.$h->id_suara) ?>"
   class="btn btn-warning btn-sm">

    Edit

</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

</div>
</div>

</div>