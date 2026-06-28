<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Data TPS</h1>

<a href="<?= site_url('index.php/administrator/tps/input') ?>"
   class="btn btn-primary mb-3">
   <i class="fas fa-plus"></i> Tambah TPS
</a>

<div class="card shadow">
<div class="card-body">

<div class="table-responsive">

<table id="tabelTPS" class="table table-bordered table-striped">

<thead class="bg-primary text-white">
<tr>
    <th>No</th>
    <th>Provinsi</th>
    <th>Kabupaten</th>
    <th>Kecamatan</th>
    <th>Desa</th>
    <th>TPS</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>

<?php $no=1; foreach($tps as $t): ?>

<tr>

<td><?= $no++ ?></td>

<td><?= $t->nama_provinsi ?></td>

<td><?= $t->nama_kabupaten ?></td>

<td><?= $t->nama_kecamatan ?></td>

<td><?= $t->nama_desa ?></td>

<td><?= $t->nama_tps ?></td>

<td width="150">

<a href="<?= site_url('index.php/administrator/tps/edit/'.$t->id_tps) ?>"
   class="btn btn-warning btn-sm">
   <i class="fas fa-edit"></i>
</a>

<a href="<?= site_url('index.php/administrator/tps/hapus/'.$t->id_tps) ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Yakin hapus data?')">

   <i class="fas fa-trash"></i>

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

<script>
$(document).ready(function(){

    $('#tabelTPS').DataTable({

        pageLength: 10,

        lengthMenu: [
            [10, 25, 50, 100],
            [10, 25, 50, 100]
        ],

        language: {

            lengthMenu: "Tampilkan _MENU_ data",

            search: "Cari :",

            zeroRecords: "Data tidak ditemukan",

            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",

            infoEmpty: "Tidak ada data",

            infoFiltered: "(difilter dari _MAX_ total data)",

            paginate: {
                first: "Awal",
                last: "Akhir",
                next: "›",
                previous: "‹"
            }

        }

    });

});
</script>