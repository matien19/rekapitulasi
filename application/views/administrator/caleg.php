<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Data Caleg</h1>

<a href="<?= site_url('index.php/administrator/caleg/input') ?>"
class="btn btn-primary mb-3">

    Tambah Caleg

</a>

<div class="card shadow">
<div class="card-body">

<div class="table-responsive">

<table id="tabelCaleg" class="table table-bordered">

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

    <?php if($c->foto != ''): ?>

        <img src="<?= base_url('uploads/caleg/'.$c->foto) ?>"
             width="80"
             class="img-thumbnail">

    <?php else: ?>

        <span class="text-muted">Tidak Ada Foto</span>

    <?php endif; ?>

</td>

<td><?= $c->nama_caleg ?></td>

<td><?= $c->partai ?></td>

<td><?= $c->nama_kabupaten ?></td>

<td><?= $c->nama_dapil ?></td>

<td>
    <span class="badge badge-info">
        <?= $c->kategori ?>
    </span>
</td>

<td width="150">

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

</div>

<!-- DATATABLES -->
<link rel="stylesheet"
href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap4.min.css">

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function() {

    $('#tabelCaleg').DataTable({

        "pageLength": 10,
        "lengthMenu": [10, 25, 50, 100],

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