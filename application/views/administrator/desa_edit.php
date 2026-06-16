<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Edit Desa</h1>

<div class="card shadow">
<div class="card-body">

<form method="post"
      action="<?= site_url('index.php/administrator/desa/update') ?>">

<input type="hidden"
       name="id_desa"
       value="<?= $desa->id_desa ?>">

<!-- PROVINSI -->
<div class="form-group">
<label>Pilih Provinsi</label>

<select id="provinsi"
        class="form-control"
        required>

<?php foreach($provinsi as $p): ?>

<option value="<?= $p->id_provinsi ?>"
    <?= ($p->id_provinsi == $desa->id_provinsi) ? 'selected' : '' ?>>

    <?= $p->nama_provinsi ?>

</option>

<?php endforeach; ?>

</select>

</div>

<!-- KABUPATEN -->
<div class="form-group">
<label>Pilih Kabupaten</label>

<select id="kabupaten"
        class="form-control"
        required>

<?php foreach($kabupaten as $k): ?>

<option value="<?= $k->id_kabupaten ?>"
    <?= ($k->id_kabupaten == $desa->id_kabupaten) ? 'selected' : '' ?>>

    <?= $k->nama_kabupaten ?>

</option>

<?php endforeach; ?>

</select>

</div>

<!-- KECAMATAN -->
<div class="form-group">
<label>Pilih Kecamatan</label>

<select name="id_kecamatan"
        id="kecamatan"
        class="form-control"
        required>

<?php foreach($kecamatan as $kec): ?>

<option value="<?= $kec->id_kecamatan ?>"
    <?= ($kec->id_kecamatan == $desa->id_kecamatan) ? 'selected' : '' ?>>

    <?= $kec->nama_kecamatan ?>

</option>

<?php endforeach; ?>

</select>

</div>

<!-- DAPIL -->
<div class="form-group">
<label>Dapil Kabupaten</label>

<select name="id_dapil"
        class="form-control"
        required>

<option value="">-- Pilih Dapil --</option>

<?php foreach($dapil as $d): ?>

<option value="<?= $d->id_dapil ?>"
    <?= ($d->id_dapil == $desa->id_dapil) ? 'selected' : '' ?>>

    <?= $d->nama_dapil ?>

</option>

<?php endforeach; ?>

</select>

</div>

<!-- DESA -->
<div class="form-group">
<label>Nama Desa</label>

<input type="text"
       name="nama_desa"
       class="form-control"
       value="<?= $desa->nama_desa ?>"
       required>

</div>

<button type="submit" class="btn btn-success">
    Update
</button>

<a href="<?= site_url('index.php/administrator/desa') ?>"
   class="btn btn-secondary">
    Kembali
</a>

</form>

</div>
</div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

$('#provinsi').change(function(){

    var id_provinsi = $(this).val();

    $.ajax({

        url: "<?= site_url('index.php/administrator/desa/get_kabupaten') ?>",

        method: "POST",

        data: {
            id_provinsi:id_provinsi
        },

        dataType:"json",

        success:function(data){

            var html = '<option value="">-- Pilih Kabupaten --</option>';

            for(var i=0; i<data.length; i++)
            {
                html += '<option value="'+data[i].id_kabupaten+'">'+data[i].nama_kabupaten+'</option>';
            }

            $('#kabupaten').html(html);

        }

    });

});

$('#kabupaten').change(function(){

    var id_kabupaten = $(this).val();

    $.ajax({

        url: "<?= site_url('index.php/administrator/desa/get_kecamatan') ?>",

        method: "POST",

        data: {
            id_kabupaten:id_kabupaten
        },

        dataType:"json",

        success:function(data){

            var html = '<option value="">-- Pilih Kecamatan --</option>';

            for(var i=0; i<data.length; i++)
            {
                html += '<option value="'+data[i].id_kecamatan+'">'+data[i].nama_kecamatan+'</option>';
            }

            $('#kecamatan').html(html);

        }

    });

});

</script>