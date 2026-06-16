<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Data Provinsi</h1>

<a href="<?= site_url('index.php/administrator/provinsi/input') ?>" 
   class="btn btn-primary mb-3">
   Tambah Provinsi
</a>

<div class="card shadow">
<div class="card-body">

<table class="table table-bordered">

<thead class="bg-primary text-white">
<tr>
    <th>No</th>
    <th>Nama Provinsi</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>

<?php $no=1; foreach($provinsi as $p): ?>

<tr>
    <td><?= $no++ ?></td>

    <td><?= $p->nama_provinsi ?></td>

    <td>

        <a href="<?= site_url('index.php/administrator/provinsi/edit/'.$p->id_provinsi) ?>"
           class="btn btn-warning btn-sm">
           Edit
        </a>

        <a href="<?= site_url('index.php/administrator/provinsi/hapus/'.$p->id_provinsi) ?>"
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