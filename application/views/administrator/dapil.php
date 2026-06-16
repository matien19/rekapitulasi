<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Data Dapil</h1>

<a href="<?= site_url('index.php/administrator/dapil/input') ?>"
class="btn btn-primary mb-3">
Tambah Dapil
</a>

<div class="card shadow">
<div class="card-body">

<table class="table table-bordered">

<thead class="bg-primary text-white">
<tr>
    <th>No</th>
    <th>Kabupaten</th>
    <th>Nama Dapil</th>
    <th>Kategori</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>

<?php $no=1; foreach($dapil as $d): ?>

<tr>

<td><?= $no++ ?></td>
<td><?= $d->nama_kabupaten ?></td>
<td><?= $d->nama_dapil ?></td>
<td><?= $d->kategori ?></td>

<td>

<a href="<?= site_url('index.php/administrator/dapil/edit/'.$d->id_dapil) ?>"
class="btn btn-warning btn-sm">
Edit
</a>

<a href="<?= site_url('index.php/administrator/dapil/hapus/'.$d->id_dapil) ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin hapus?')">
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