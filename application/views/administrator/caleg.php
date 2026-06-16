<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Data Caleg</h1>

<a href="<?= site_url('index.php/administrator/caleg/input') ?>"
class="btn btn-primary mb-3">

Tambah Caleg

</a>

<div class="card shadow">
<div class="card-body">

<table class="table table-bordered">

<thead class="bg-primary text-white">

<tr>
    <th>No</th>
    <th>Foto</th>
    <th>Nama</th>
    <th>Partai</th>
    <th>Kabupaten</th>
    <th>Dapil</th>
    <th>Kategori</th>
    <th>Aksi</th>
</tr>

</thead>

<tbody>

<?php $no=1; foreach($caleg as $c): ?>

<tr>

<td><?= $no++ ?></td>

<td width="120">

<img src="<?= base_url('uploads/caleg/'.$c->foto) ?>"
width="80">

</td>

<td><?= $c->nama_caleg ?></td>
<td><?= $c->partai ?></td>
<td><?= $c->nama_kabupaten ?></td>
<td><?= $c->nama_dapil ?></td>
<td><?= $c->kategori ?></td>

<td>

<a href="<?= site_url('index.php/administrator/caleg/edit/'.$c->id_caleg) ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a href="<?= site_url('index.php/administrator/caleg/hapus/'.$c->id_caleg) ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Hapus data?')">

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