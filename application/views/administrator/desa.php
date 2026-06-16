<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Data Desa</h1>

<a href="<?= site_url('index.php/administrator/desa/input') ?>"
   class="btn btn-primary mb-3">
   Tambah Desa
</a>

<div class="card shadow">
<div class="card-body">

<table class="table table-bordered">

<thead class="bg-primary text-white">
<tr>
    <th>No</th>
    <th>Provinsi</th>
    <th>Kabupaten</th>
    <th>Kecamatan</th>
    <th>Desa</th>
    <th>Dapil Kabupaten</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>

<?php $no=1; foreach($desa as $d): ?>

<tr>

<td><?= $no++ ?></td>

<td><?= $d->nama_provinsi ?></td>

<td><?= $d->nama_kabupaten ?></td>

<td><?= $d->nama_kecamatan ?></td>

<td><?= $d->nama_desa ?></td>

<td>
    <?= !empty($d->nama_dapil) ? $d->nama_dapil : '-' ?>
</td>

<td>

<a href="<?= site_url('index.php/administrator/desa/edit/'.$d->id_desa) ?>"
   class="btn btn-warning btn-sm">
   Edit
</a>

<a href="<?= site_url('index.php/administrator/desa/hapus/'.$d->id_desa) ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Yakin hapus data?')">
   Hapus
</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>
</div>

</div>