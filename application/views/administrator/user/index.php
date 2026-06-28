<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Manajemen User
    </h1>

    <a href="<?= base_url('index.php/administrator/user/tambah') ?>"
       class="btn btn-primary mb-3">

        <i class="fas fa-plus"></i>
        Tambah User

    </a>

    <a href="<?= site_url('index.php/administrator/user/export_csv') ?>"
       class="btn btn-success mb-3">

        <i class="fa fa-file-excel"></i>
        Export Excel

    </a>

    <?php if($this->session->flashdata('success')) : ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover" id="dataTable">

                    <thead class="bg-primary text-white">

                        <tr class="text-center">

                            <th width="60">No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th width="180">Role</th>
                            <th width="200">Desa</th>
                            <th width="150">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if(!empty($users)) : ?>

                            <?php $no = 1; foreach($users as $u) : ?>

                            <tr>

                                <td class="text-center"><?= $no++; ?></td>

                                <td><?= $u->nama; ?></td>

                                <td><?= $u->username; ?></td>

                                <td>
                                    <span class="badge badge-info p-2">
                                        <?= ucfirst(str_replace('_',' ',$u->role)); ?>
                                    </span>
                                </td>

                                <td>
                                    <?= !empty($u->nama_desa) ? $u->nama_desa : '-' ?>
                                </td>

                                <td class="text-center">

                                    <a href="<?= base_url('index.php/administrator/user/edit/'.$u->id_user) ?>"
                                       class="btn btn-warning btn-sm">

                                        <i class="fas fa-edit"></i>

                                    </a>

                                    <a href="<?= base_url('index.php/administrator/user/hapus/'.$u->id_user) ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Yakin ingin menghapus user ini?')">

                                        <i class="fas fa-trash"></i>

                                    </a>

                                </td>

                            </tr>

                            <?php endforeach; ?>

                        <?php else : ?>

                            <tr>
                                <td colspan="6" class="text-center">
                                    Tidak ada data user
                                </td>
                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<!-- ================= DATATABLE ================= -->

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap4.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function() {

    $('#dataTable').DataTable({

        pageLength: 10,

        lengthMenu: [
            [10,25,50,100,-1],
            [10,25,50,100,"Semua"]
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

<!-- ================= STYLE TAMBAHAN ================= -->
<style>

.table td,
.table th{
    vertical-align: middle !important;
}

.table td{
    padding: 10px !important;
}

.table th{
    text-align: center;
}

.btn-sm{
    margin: 2px;
}

</style>