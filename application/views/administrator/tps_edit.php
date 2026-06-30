<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Edit TPS</h1>

<div class="card shadow">
<div class="card-body">

<form method="post"
      action="<?= site_url('index.php/administrator/tps/update') ?>">

<input type="hidden"
       name="id_tps"
       value="<?= $tps->id_tps ?>">

<!-- PROVINSI -->
<div class="form-group">
<label>Pilih Provinsi</label>

<select id="provinsi"
        class="form-control"
        required>

<?php foreach($provinsi as $p): ?>

<option value="<?= $p->id_provinsi ?>"
<?= ($p->id_provinsi == $tps->id_provinsi) ? 'selected' : '' ?>>

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
<?= ($k->id_kabupaten == $tps->id_kabupaten) ? 'selected' : '' ?>>

<?= $k->nama_kabupaten ?>

</option>

<?php endforeach; ?>

</select>

</div>

<!-- KECAMATAN -->
<div class="form-group">
<label>Pilih Kecamatan</label>

<select id="kecamatan"
        class="form-control"
        required>

<?php foreach($kecamatan as $kec): ?>

<option value="<?= $kec->id_kecamatan ?>"
<?= ($kec->id_kecamatan == $tps->id_kecamatan) ? 'selected' : '' ?>>

<?= $kec->nama_kecamatan ?>

</option>

<?php endforeach; ?>

</select>

</div>

<!-- DESA -->
<div class="form-group">
<label>Pilih Desa</label>

<select name="id_desa"
        id="desa"
        class="form-control"
        required>

<?php foreach($desa as $d): ?>

<option value="<?= $d->id_desa ?>"
<?= ($d->id_desa == $tps->id_desa) ? 'selected' : '' ?>>

<?= $d->nama_desa ?>

</option>

<?php endforeach; ?>

</select>

</div>

<!-- NAMA TPS -->
<div class="form-group">
<label>Nama TPS</label>

<input type="text"
       name="nama_tps"
       class="form-control"
       value="<?= $tps->nama_tps ?>"
       required>

</div>

<button type="submit" class="btn btn-success">
Update
</button>

<a href="<?= site_url('index.php/administrator/tps') ?>"
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

        url: "<?= site_url('index.php/administrator/tps/get_kabupaten') ?>",

        method: "POST",

        data: {
            id_provinsi:id_provinsi
        },

        dataType:"json",

        success:function(data){

            var html = '<option value="">-- Pilih Kabupaten --</option>';

            for(var i=0;i<data.length;i++)
            {
                html += '<option value="'+data[i].id_kabupaten+'">'+data[i].nama_kabupaten+'</option>';
            }

            $('#kabupaten').html(html);
            $('#kecamatan').html('<option value="">-- Pilih Kecamatan --</option>');
            $('#desa').html('<option value="">-- Pilih Desa --</option>');

        }

    });

});

$('#kabupaten').change(function(){

    var id_kabupaten = $(this).val();

    $.ajax({

        url: "<?= site_url('index.php/administrator/tps/get_kecamatan') ?>",

        method: "POST",

        data: {
            id_kabupaten:id_kabupaten
        },

        dataType:"json",

        success:function(data){

            var html = '<option value="">-- Pilih Kecamatan --</option>';

            for(var i=0;i<data.length;i++)
            {
                html += '<option value="'+data[i].id_kecamatan+'">'+data[i].nama_kecamatan+'</option>';
            }

            $('#kecamatan').html(html);
            $('#desa').html('<option value="">-- Pilih Desa --</option>');

        }

    });

});

$('#kecamatan').change(function(){

    var id_kecamatan = $(this).val();

    $.ajax({

        url: "<?= site_url('index.php/administrator/tps/get_desa') ?>",

        method: "POST",

        data: {
            id_kecamatan:id_kecamatan
        },

        dataType:"json",

        success:function(data){

            var html = '<option value="">-- Pilih Desa --</option>';

            for(var i=0;i<data.length;i++)
            {
                html += '<option value="'+data[i].id_desa+'">'+data[i].nama_desa+'</option>';
            }

            $('#desa').html(html);

        }

    });

});

</script>