<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Data Kecamatan</h1>

<a href="<?= site_url('index.php/administrator/kecamatan/input') ?>"
   class="btn btn-primary mb-3">
   Tambah Kecamatan
</a>

<div class="card shadow">
<div class="card-body">

<div class="table-responsive">

<table id="tabelKecamatan" class="table table-bordered table-striped">

<thead class="bg-primary text-white">

<tr>
    <th>No</th>
    <th>Provinsi</th>
    <th>Kabupaten</th>
    <th>Kecamatan</th>
    <th>Aksi</th>
</tr>

</thead>

<tbody>

<?php $no=1; foreach($kecamatan as $k): ?>

<tr>

    <td><?= $no++ ?></td>

    <td><?= $k->nama_provinsi ?></td>

    <td><?= $k->nama_kabupaten ?></td>

    <td><?= $k->nama_kecamatan ?></td>

    <td width="150">

        <a href="<?= site_url('index.php/administrator/kecamatan/edit/'.$k->id_kecamatan) ?>"
           class="btn btn-warning btn-sm">
           Edit
        </a>

        <a href="<?= site_url('index.php/administrator/kecamatan/hapus/'.$k->id_kecamatan) ?>"
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

</div>

<script>
$(document).ready(function(){

    $('#tabelKecamatan').DataTable({

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