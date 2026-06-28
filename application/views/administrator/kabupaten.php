<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Data Kabupaten</h1>

    <a href="<?= site_url('index.php/administrator/kabupaten/input') ?>"
       class="btn btn-primary mb-3">
       Tambah Kabupaten
    </a>

    <div class="card shadow">
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">

                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Provinsi</th>
                            <th>Kabupaten</th>
                            <th width="150">Aksi</th>
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

</div>

<script>
$(document).ready(function() {

    $('#dataTable').DataTable({

        pageLength: 10,

        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "Semua"]
        ],

        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",

            paginate: {
                first: "Awal",
                last: "Akhir",
                next: "›",
                previous: "‹"
            },

            zeroRecords: "Data tidak ditemukan",
            infoEmpty: "Tidak ada data",
            infoFiltered: "(difilter dari _MAX_ total data)"
        }

    });

});
</script>