<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Data Kabupaten</h1>

<a href="<?= site_url('index.php/administrator/kabupaten/input') ?>"
   class="btn btn-primary mb-3">
   Tambah Kabupaten
</a>

<div class="card shadow">
<div class="card-body">

<table class="table table-bordered">

<thead class="bg-primary text-white">
<tr>
    <th>No</th>
    <th>Provinsi</th>
    <th>Kabupaten</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>

<?php $no=1; foreach($kabupaten as $k): ?>

<tr>

    <td><?= $no++ ?></td>

    <td><?= $k->nama_provinsi ?></td>

    <td><?= $k->nama_kabupaten ?></td>

    <td>

        <a href="<?= site_url('index.php/administrator/kabupaten/edit/'.$k->id_kabupaten) ?>"
           class="btn btn-warning btn-sm">
           Edit
        </a>

        <a href="<?= site_url('index.php/administrator/kabupaten/hapus/'.$k->id_kabupaten) ?>"
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