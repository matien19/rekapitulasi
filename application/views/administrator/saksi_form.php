<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Tambah Saksi</h1>

<div class="card shadow">
<div class="card-body">

<form method="post"
action="<?= site_url('index.php/administrator/saksi/simpan') ?>">

<!-- NAMA -->
<div class="form-group">
<label>Nama Saksi</label>
<input type="text" name="nama_saksi" class="form-control" required>
</div>

<!-- NIK -->
<div class="form-group">
    <label>NIK</label>
    <input type="text"
           name="nik"
           class="form-control"
           placeholder="Masukkan NIK 16 digit"
           maxlength="16"
           required
           oninput="
                this.value=this.value.replace(/[^0-9]/g,'');
                this.setCustomValidity('');
                if(this.value.length > 0 && this.value.length != 16){
                    this.setCustomValidity('NIK harus tepat 16 digit angka');
                }
           "
           oninvalid="this.setCustomValidity('NIK harus tepat 16 digit angka')">
    <small class="text-muted">NIK harus terdiri dari 16 digit angka.</small>
</div>

<!-- NO HP -->
<div class="form-group">
    <label>No HP</label>
    <input type="text"
           name="no_hp"
           class="form-control"
           placeholder="Masukkan Nomor HP"
           maxlength="14"
           required
           oninput="
                this.value=this.value.replace(/[^0-9]/g,'');
                this.setCustomValidity('');
                if(this.value.length > 0 && (this.value.length < 11 || this.value.length > 14)){
                    this.setCustomValidity('Nomor HP harus 11 sampai 14 digit angka');
                }
           "
           oninvalid="this.setCustomValidity('Nomor HP harus 11 sampai 14 digit angka')">
    <small class="text-muted">Nomor HP harus 11–14 digit angka.</small>
</div>

<!-- PROVINSI -->
<div class="form-group">
<label>Provinsi</label>
<select name="id_provinsi" id="provinsi" class="form-control" required>
<option value="">-- Pilih Provinsi --</option>

<?php foreach($provinsi as $p): ?>
<option value="<?= $p->id_provinsi ?>">
    <?= $p->nama_provinsi ?>
</option>
<?php endforeach; ?>

</select>
</div>

<!-- KABUPATEN -->
<div class="form-group">
<label>Kabupaten</label>
<select name="id_kabupaten" id="kabupaten" class="form-control" required>
<option value="">-- Pilih Kabupaten --</option>
</select>
</div>

<!-- KECAMATAN -->
<div class="form-group">
<label>Kecamatan</label>
<select name="id_kecamatan" id="kecamatan" class="form-control" required>
<option value="">-- Pilih Kecamatan --</option>
</select>
</div>

<!-- DESA -->
<div class="form-group">
<label>Desa</label>
<select name="id_desa" id="desa" class="form-control" required>
<option value="">-- Pilih Desa --</option>
</select>
</div>

<!-- TPS -->
<div class="form-group">
<label>TPS</label>
<select name="id_tps" id="tps" class="form-control" required>
<option value="">-- Pilih TPS --</option>
</select>
</div>

<!-- USERNAME -->
<div class="form-group">
<label>Username</label>
<input type="text" name="username" class="form-control" required>
</div>

<!-- PASSWORD -->
<div class="form-group">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<button class="btn btn-success">Simpan</button>

<a href="<?= site_url('index.php/administrator/saksi') ?>"
class="btn btn-secondary">Kembali</a>

</form>


</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

// PROVINSI -> KABUPATEN
$('#provinsi').change(function(){

    var id_provinsi = $(this).val();

    $.ajax({

        url : "<?= site_url('index.php/administrator/saksi/get_kabupaten') ?>",

        method : "POST",

        data : {
            id_provinsi : id_provinsi
        },

        dataType : "json",

        success:function(data)
        {
            var html = '<option value="">-- Pilih Kabupaten --</option>';

            for(var i=0; i<data.length; i++)
            {
                html += '<option value="'+data[i].id_kabupaten+'">'+data[i].nama_kabupaten+'</option>';
            }

            $('#kabupaten').html(html);
        }

    });

});

// KABUPATEN -> KECAMATAN
$('#kabupaten').change(function(){

    var id_kabupaten = $(this).val();

    $.ajax({

        url : "<?= site_url('index.php/administrator/saksi/get_kecamatan') ?>",

        method : "POST",

        data : {
            id_kabupaten : id_kabupaten
        },

        dataType : "json",

        success:function(data)
        {
            var html = '<option value="">-- Pilih Kecamatan --</option>';

            for(var i=0; i<data.length; i++)
            {
                html += '<option value="'+data[i].id_kecamatan+'">'+data[i].nama_kecamatan+'</option>';
            }

            $('#kecamatan').html(html);
        }

    });

});

// KECAMATAN -> DESA
$('#kecamatan').change(function(){

    var id_kecamatan = $(this).val();

    $.ajax({

        url : "<?= site_url('index.php/administrator/saksi/get_desa') ?>",

        method : "POST",

        data : {
            id_kecamatan : id_kecamatan
        },

        dataType : "json",

        success:function(data)
        {
            var html = '<option value="">-- Pilih Desa --</option>';

            for(var i=0; i<data.length; i++)
            {
                html += '<option value="'+data[i].id_desa+'">'+data[i].nama_desa+'</option>';
            }

            $('#desa').html(html);
        }

    });

});

// DESA -> TPS
$('#desa').change(function(){

    var id_desa = $(this).val();

    $.ajax({

        url : "<?= site_url('index.php/administrator/saksi/get_tps') ?>",

        method : "POST",

        data : {
            id_desa : id_desa
        },

        dataType : "json",

        success:function(data)
        {
            var html = '<option value="">-- Pilih TPS --</option>';

            for(var i=0; i<data.length; i++)
            {
                html += '<option value="'+data[i].id_tps+'">'+data[i].nama_tps+'</option>';
            }

            $('#tps').html(html);
        }

    });

});

</script>