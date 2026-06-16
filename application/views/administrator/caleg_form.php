<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Tambah Caleg</h1>

<div class="card shadow">
<div class="card-body">

<form method="post"
enctype="multipart/form-data"
action="<?= site_url('index.php/administrator/caleg/simpan') ?>">

<div class="form-group">
<label>Kabupaten</label>

<select name="id_kabupaten"
id="kabupaten"
class="form-control"
required>

<option value="">-- Pilih Kabupaten --</option>

<?php foreach($kabupaten as $k): ?>

<option value="<?= $k->id_kabupaten ?>">
<?= $k->nama_kabupaten ?>
</option>

<?php endforeach; ?>

</select>
</div>

<div class="form-group">
<label>Dapil</label>

<select name="id_dapil"
id="dapil"
class="form-control"
required>

<option value="">-- Pilih Dapil --</option>

</select>
</div>

<div class="form-group">
<label>Nama Caleg</label>

<input type="text"
name="nama_caleg"
class="form-control"
required>
</div>

<div class="form-group">
    <label>Partai</label>

    <select name="partai"
            class="form-control"
            required>

        <option value="">-- Pilih Partai --</option>

        <option value="PKB">PKB</option>
        <option value="GERINDRA">GERINDRA</option>
        <option value="PDI PERJUANGAN">PDI PERJUANGAN</option>
        <option value="GOLKAR">GOLKAR</option>
        <option value="NASDEM">NASDEM</option>
        <option value="PARTAI BURUH">PARTAI BURUH</option>
        <option value="PARTAI GELORA">PARTAI GELORA</option>
        <option value="PKS">PKS</option>
        <option value="PKN">PKN</option>
        <option value="HANURA">HANURA</option>
        <option value="GARUDA">GARUDA</option>
        <option value="PAN">PAN</option>
        <option value="PBB">PBB</option>
        <option value="DEMOKRAT">DEMOKRAT</option>
        <option value="PSI">PSI</option>
        <option value="PERINDO">PERINDO</option>
        <option value="PPP">PPP</option>
        <option value="PARTAI UMMAT">PARTAI UMMAT</option>

    </select>
</div>

<div class="form-group">
<label>Kategori</label>

<select name="kategori"
class="form-control"
required>

<option value="DPR RI">DPR RI</option>
<option value="DPRD PROVINSI">DPRD PROVINSI</option>
<option value="DPRD KABUPATEN">DPRD KABUPATEN</option>

</select>
</div>

<div class="form-group">
<label>Foto</label>

<input type="file"
name="foto"
class="form-control"
required>
</div>

<button class="btn btn-success">
Simpan
</button>

<a href="<?= site_url('index.php/administrator/caleg') ?>"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

$('#kabupaten').change(function(){

    var id_kabupaten = $(this).val();

    $.ajax({

        url : "<?= site_url('index.php/administrator/caleg/get_dapil') ?>",

        method : "POST",

        data : {
            id_kabupaten:id_kabupaten
        },

        dataType : "json",

        success:function(data){

            var html = '<option value="">-- Pilih Dapil --</option>';

            for(var i=0; i<data.length; i++)
            {
                html += '<option value="'+data[i].id_dapil+'">'+data[i].nama_dapil+'</option>';
            }

            $('#dapil').html(html);

        }

    });

});

</script>