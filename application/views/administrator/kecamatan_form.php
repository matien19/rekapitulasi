<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Tambah Kecamatan</h1>

<div class="card shadow">
<div class="card-body">

<form method="post"
      action="<?= site_url('index.php/administrator/kecamatan/simpan') ?>">

<!-- PROVINSI -->
<div class="form-group">

    <label>Pilih Provinsi</label>

    <select id="provinsi"
            class="form-control"
            required>

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

    <label>Pilih Kabupaten</label>

    <select name="id_kabupaten"
            id="kabupaten"
            class="form-control"
            required>

        <option value="">-- Pilih Kabupaten --</option>

    </select>

</div>

<!-- KECAMATAN -->
<div class="form-group">

    <label>Nama Kecamatan</label>

    <input type="text"
           name="nama_kecamatan"
           class="form-control"
           required>

</div>

<button type="submit" class="btn btn-success">
    Simpan
</button>

<a href="<?= site_url('index.php/administrator/kecamatan') ?>"
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

        url: "<?= site_url('index.php/administrator/kecamatan/get_kabupaten') ?>",

        method: "POST",

        data: {
            id_provinsi: id_provinsi
        },

        dataType: "json",

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

</script>
</div>