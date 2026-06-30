<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Data Saksi</h1>

    <a href="<?= site_url('index.php/administrator/saksi/input') ?>"
        class="btn btn-primary mb-3">
        Tambah Saksi
    </a>

    <a href="<?= site_url('index.php/administrator/saksi/export_csv') ?>"
        class="btn btn-success mb-3">
        <i class="fa fa-file-excel"></i> Export CSV
    </a>

    <!-- ================= FILTER ================= -->
    <div class="row mb-3">

        <div class="col-md-3">
            <select class="form-control" id="provinsi">
                <option value="">Provinsi</option>
                <?php foreach ($provinsi as $p): ?>
                    <option value="<?= $p->id_provinsi ?>"><?= $p->nama_provinsi ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-3">
            <select class="form-control" id="kabupaten">
                <option value="">Kabupaten</option>
            </select>
        </div>

        <div class="col-md-3">
            <select class="form-control" id="kecamatan">
                <option value="">Kecamatan</option>
            </select>
        </div>

        <div class="col-md-3">
            <select class="form-control" id="desa">
                <option value="">Desa</option>
            </select>
        </div>

    </div>

    <button class="btn btn-primary mb-3" id="btnCari">Cari</button>

    <!-- ================= TABLE ================= -->
    <div class="card shadow">
        <div class="card-body">

            <div class="table-responsive">

                <table id="tabelSaksi" class="table table-bordered">

                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>No HP</th>
                            <th>TPS</th>
                            <th>Status Input</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody id="hasilSaksi">

                        <?php $no = 1;
                        foreach ($saksi as $s): ?>

                            <?php
                            $cek_suara = $this->db
                                ->where('id_tps', $s->id_tps)
                                ->count_all_results('suara');
                            ?>

                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $s->nama_saksi ?></td>
                                <td><?= $s->nik ?></td>
                                <td><?= $s->no_hp ?></td>
                                <td><?= $s->nama_tps ?></td>

                                <td>
                                    <?php if ($cek_suara > 0): ?>
                                        <span class="badge badge-success">Sudah Input</span>
                                    <?php else: ?>
                                        <span class="badge badge-danger">Belum Input</span>
                                    <?php endif; ?>
                                </td>

                                <td><?= $s->username ?></td>

                                <td>
                                    <a href="<?= site_url('index.php/administrator/saksi/edit/' . $s->id_saksi) ?>"
                                        class="btn btn-warning btn-sm">Edit</a>

                                    <a href="<?= site_url('index.php/administrator/saksi/hapus/' . $s->id_saksi) ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus data?')">Hapus</a>
                                </td>
                            </tr>

                        <?php endforeach; ?>

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
    let table;

    $(document).ready(function() {

        // ================= INIT DATATABLE =================
        table = $('#tabelSaksi').DataTable({
            pageLength: 10,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "Semua"]
            ]
        });

        // ================= AJAX WILAYAH =================
        $('#provinsi').change(function() {
            $.post("<?= site_url('index.php/administrator/saksi/get_kabupaten') ?>", {
                    id_provinsi: $(this).val()
                },
                function(data) {

                    $('#kabupaten').html('<option value="">Kabupaten</option>');
                    $('#kecamatan').html('<option value="">Kecamatan</option>');
                    $('#desa').html('<option value="">Desa</option>');

                    $.each(data, function(i, v) {
                        $('#kabupaten').append(`<option value="${v.id_kabupaten}">${v.nama_kabupaten}</option>`);
                    });

                }, 'json');
        });

        $('#kabupaten').change(function() {
            $.post("<?= site_url('index.php/administrator/saksi/get_kecamatan') ?>", {
                    id_kabupaten: $(this).val()
                },
                function(data) {

                    $('#kecamatan').html('<option value="">Kecamatan</option>');
                    $('#desa').html('<option value="">Desa</option>');

                    $.each(data, function(i, v) {
                        $('#kecamatan').append(`<option value="${v.id_kecamatan}">${v.nama_kecamatan}</option>`);
                    });

                }, 'json');
        });

        $('#kecamatan').change(function() {
            $.post("<?= site_url('index.php/administrator/saksi/get_desa') ?>", {
                    id_kecamatan: $(this).val()
                },
                function(data) {

                    $('#desa').html('<option value="">Desa</option>');

                    $.each(data, function(i, v) {
                        $('#desa').append(`<option value="${v.id_desa}">${v.nama_desa}</option>`);
                    });

                }, 'json');
        });

        // ================= FILTER AJAX =================
        $('#btnCari').click(function() {

            $.ajax({
                url: "<?= site_url('index.php/administrator/saksi/filter_saksi') ?>",
                type: "POST",
                dataType: "json",
                data: {
                    id_provinsi: $('#provinsi').val(),
                    id_kabupaten: $('#kabupaten').val(),
                    id_kecamatan: $('#kecamatan').val(),
                    id_desa: $('#desa').val()
                },
                success: function(data) {

                    // Hancurkan DataTable jika sudah ada
                    if ($.fn.DataTable.isDataTable('#tabelSaksi')) {
                        $('#tabelSaksi').DataTable().destroy();
                    }

                    // Kosongkan isi tbody
                    $('#hasilSaksi').empty();

                    let html = "";
                    let no = 1;

                    if (data.length > 0) {

                        $.each(data, function(i, s) {

                            html += `
                    <tr>
                        <td>${no++}</td>
                        <td>${s.nama_saksi}</td>
                        <td>${s.nik}</td>
                        <td>${s.no_hp}</td>
                        <td>${s.nama_tps ?? '-'}</td>

                        <td>
                            ${
                                parseInt(s.total_suara) > 0
                                ? '<span class="badge badge-success">Sudah Input</span>'
                                : '<span class="badge badge-danger">Belum Input</span>'
                            }
                        </td>

                        <td>${s.username}</td>

                            <td>
                                <a href="<?= site_url('index.php/administrator/saksi/edit/') ?>${s.id_saksi}"
                                   class="btn btn-warning btn-sm">Edit</a>

                                <a href="<?= site_url('index.php/administrator/saksi/hapus/') ?>${s.id_saksi}"
                                   class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>`;
                        });
                    }

                    $('#hasilSaksi').html(html);

                    table = $('#tabelSaksi').DataTable({
                        pageLength: 10,
                        lengthMenu: [
                            [10, 25, 50, -1],
                            [10, 25, 50, "Semua"]
                        ]
                    });

                }
            });

        });

    });
</script>

});

</script>