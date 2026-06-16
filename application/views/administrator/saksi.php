<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Data Saksi</h1>

<a href="<?= site_url('index.php/administrator/saksi/input') ?>"
class="btn btn-primary mb-3">
Tambah Saksi
</a>

<a href="<?= site_url('index.php/administrator/saksi/export_csv') ?>"
   class="btn btn-success mb-3">

    <i class="fa fa-file-excel"></i>
    Export CSV

</a>

<!-- ================= FILTER ================= -->
<div class="row mb-3">

    <div class="col-md-2">
        <select class="form-control" id="provinsi">
            <option value="">Provinsi</option>
            <?php foreach($provinsi as $p){ ?>
                <option value="<?= $p->id_provinsi ?>">
                    <?= $p->nama_provinsi ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <div class="col-md-2">
        <select class="form-control" id="kabupaten">
            <option value="">Kabupaten</option>
        </select>
    </div>

    <div class="col-md-2">
        <select class="form-control" id="kecamatan">
            <option value="">Kecamatan</option>
        </select>
    </div>

    <div class="col-md-2">
        <select class="form-control" id="desa">
            <option value="">Desa</option>
        </select>
    </div>

    <div class="col-md-2">
        <select class="form-control" id="tps">
            <option value="">TPS</option>
        </select>
    </div>

    <div class="col-md-2">
        <button class="btn btn-primary btn-block" id="btnCari">
            Cari
        </button>
    </div>

</div>

<!-- ================= TABLE ================= -->
<div class="card shadow">
<div class="card-body">

<div class="table-responsive">

<table class="table table-bordered">

<!-- HEADER SUDAH DIRINGKAS (HANYA TPS) -->
<thead class="bg-primary text-white">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>NIK</th>
    <th>No HP</th>
    <th>TPS</th>
    <th>Username</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody id="hasilSaksi">

<?php $no=1; foreach($saksi as $s): ?>

<tr>
    <td><?= $no++ ?></td>
    <td><?= $s->nama_saksi ?></td>
    <td><?= $s->nik ?></td>
    <td><?= $s->no_hp ?></td>

    <!-- HANYA TPS -->
    <td><?= $s->nama_tps ?></td>

    <td><?= $s->username ?></td>

    <td>

    <?php
    $cek_suara = $this->db
        ->where('id_tps', $s->id_tps)
        ->count_all_results('suara');
    ?>

    <?php if($cek_suara > 0): ?>
        <span class="badge badge-success">
            Sudah Input
        </span>
    <?php else: ?>
        <span class="badge badge-danger">
            Belum Input
        </span>
    <?php endif; ?>

    <a href="<?= site_url('index.php/administrator/saksi/edit/'.$s->id_saksi) ?>"
       class="btn btn-warning btn-sm">
       Edit
    </a>

    <a href="<?= site_url('index.php/administrator/saksi/hapus/'.$s->id_saksi) ?>"
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

<!-- ================= AJAX SCRIPT ================= -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

$(document).ready(function(){

    // ================= PROVINSI -> KABUPATEN =================
    $('#provinsi').change(function(){

        $.ajax({
            url: "<?= site_url('index.php/administrator/saksi/get_kabupaten') ?>",
            type: "POST",
            dataType: "json",
            data: {id_provinsi: $(this).val()},
            success: function(data){

                $('#kabupaten').html('<option value="">Kabupaten</option>');
                $('#kecamatan').html('<option value="">Kecamatan</option>');
                $('#desa').html('<option value="">Desa</option>');
                $('#tps').html('<option value="">TPS</option>');

                $.each(data, function(i,item){
                    $('#kabupaten').append(
                        '<option value="'+item.id_kabupaten+'">'+item.nama_kabupaten+'</option>'
                    );
                });
            }
        });

    });

    // ================= KABUPATEN -> KECAMATAN =================
    $('#kabupaten').change(function(){

        $.ajax({
            url: "<?= site_url('index.php/administrator/saksi/get_kecamatan') ?>",
            type: "POST",
            dataType: "json",
            data: {id_kabupaten: $(this).val()},
            success: function(data){

                $('#kecamatan').html('<option value="">Kecamatan</option>');
                $('#desa').html('<option value="">Desa</option>');
                $('#tps').html('<option value="">TPS</option>');

                $.each(data, function(i,item){
                    $('#kecamatan').append(
                        '<option value="'+item.id_kecamatan+'">'+item.nama_kecamatan+'</option>'
                    );
                });
            }
        });

    });

    // ================= KECAMATAN -> DESA =================
    $('#kecamatan').change(function(){

        $.ajax({
            url: "<?= site_url('index.php/administrator/saksi/get_desa') ?>",
            type: "POST",
            dataType: "json",
            data: {id_kecamatan: $(this).val()},
            success: function(data){

                $('#desa').html('<option value="">Desa</option>');
                $('#tps').html('<option value="">TPS</option>');

                $.each(data, function(i,item){
                    $('#desa').append(
                        '<option value="'+item.id_desa+'">'+item.nama_desa+'</option>'
                    );
                });
            }
        });

    });

    // ================= DESA -> TPS =================
    $('#desa').change(function(){

        $.ajax({
            url: "<?= site_url('index.php/administrator/saksi/get_tps') ?>",
            type: "POST",
            dataType: "json",
            data: {id_desa: $(this).val()},
            success: function(data){

                $('#tps').html('<option value="">TPS</option>');

                $.each(data, function(i,item){
                    $('#tps').append(
                        '<option value="'+item.id_tps+'">'+item.nama_tps+'</option>'
                    );
                });
            }
        });

    });

    // ================= FILTER SAKSI (ONLY TPS RESULT) =================
    $('#btnCari').click(function(){

        $.ajax({
            url: "<?= site_url('index.php/administrator/saksi/filter_saksi') ?>",
            type: "POST",
            dataType: "json",
            data: {
                id_provinsi: $('#provinsi').val(),
                id_kabupaten: $('#kabupaten').val(),
                id_kecamatan: $('#kecamatan').val(),
                id_desa: $('#desa').val(),
                id_tps: $('#tps').val()
            },
            success: function(data){

                let html = '';
                let no = 1;

                if(data.length == 0){
                    html = `<tr><td colspan="7" class="text-center">Data tidak ditemukan</td></tr>`;
                } else {

                    $.each(data, function(i,s){

                        html += `
                        <tr>
                            <td>${no++}</td>
                            <td>${s.nama_saksi}</td>
                            <td>${s.nik}</td>
                            <td>${s.no_hp}</td>
                            <td>${s.nama_tps}</td>
                            <td>${s.username}</td>
                            <td>
                                <a href="<?= site_url('index.php/administrator/saksi/edit/') ?>${s.id_saksi}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= site_url('index.php/administrator/saksi/hapus/') ?>${s.id_saksi}" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</a>
                            </td>
                        </tr>
                        `;
                    });
                }

                $('#hasilSaksi').html(html);

            }
        });

    });

});

</script>