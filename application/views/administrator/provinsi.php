<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Data Provinsi</h1>

<a href="<?= site_url('index.php/administrator/provinsi/input') ?>" 
   class="btn btn-primary mb-3">
   Tambah Provinsi
</a>

<div class="card shadow">
<div class="card-body">

<div class="table-responsive">

<table class="table table-bordered" id="tableProvinsi">

<thead class="bg-primary text-white">
<tr>
    <th>No</th>
    <th>Nama Provinsi</th>
    <th width="150">Aksi</th>
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

</div>

<!-- DataTables CSS -->
<link rel="stylesheet"
href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap4.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function(){

    $('#tableProvinsi').DataTable({

        "pageLength": 10,

        "lengthMenu": [
            [10, 25, 50, 100],
            [10, 25, 50, 100]
        ],

        "language": {

            "search": "Cari :",

            "lengthMenu": "Tampilkan _MENU_ data",

            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",

            "paginate": {
                "first": "Awal",
                "last": "Akhir",
                "next": "›",
                "previous": "‹"
            },

            "zeroRecords": "Data tidak ditemukan",

            "infoEmpty": "Tidak ada data",

            "infoFiltered": "(difilter dari _MAX_ total data)"
        }
    });

});
</script>