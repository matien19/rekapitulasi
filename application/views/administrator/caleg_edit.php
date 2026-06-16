<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Edit Caleg</h1>

<div class="card shadow">
<div class="card-body">

<form method="post"
      enctype="multipart/form-data"
      action="<?= site_url('index.php/administrator/caleg/update') ?>">

<input type="hidden"
       name="id_caleg"
       value="<?= $caleg->id_caleg ?>">

<!-- KABUPATEN -->
<div class="form-group">

<label>Kabupaten</label>

<select name="id_kabupaten"
        id="kabupaten"
        class="form-control"
        required>

<option value="">-- Pilih Kabupaten --</option>

<?php foreach($kabupaten as $k): ?>

<option value="<?= $k->id_kabupaten ?>"

<?php
if($k->id_kabupaten == $caleg->id_kabupaten){
    echo "selected";
}
?>

>

<?= $k->nama_kabupaten ?>

</option>

<?php endforeach; ?>

</select>

</div>

<!-- DAPIL -->
<div class="form-group">

<label>Dapil</label>

<select name="id_dapil"
        id="dapil"
        class="form-control"
        required>

<option value="">-- Pilih Dapil --</option>

<?php foreach($dapil as $d): ?>

<option value="<?= $d->id_dapil ?>"

<?php
if($d->id_dapil == $caleg->id_dapil){
    echo "selected";
}
?>

>

<?= $d->nama_dapil ?>

</option>

<?php endforeach; ?>

</select>

</div>

<!-- NAMA -->
<div class="form-group">

<label>Nama Caleg</label>

<input type="text"
       name="nama_caleg"
       class="form-control"
       value="<?= $caleg->nama_caleg ?>"
       required>

</div>

<!-- PARTAI -->
<div class="form-group">

<label>Partai</label>

<select name="partai"
        class="form-control"
        required>

    <option value="PKB" <?= ($caleg->partai == 'PKB') ? 'selected' : '' ?>>
        PKB
    </option>

    <option value="GERINDRA" <?= ($caleg->partai == 'GERINDRA') ? 'selected' : '' ?>>
        GERINDRA
    </option>

    <option value="PDI PERJUANGAN" <?= ($caleg->partai == 'PDI PERJUANGAN') ? 'selected' : '' ?>>
        PDI PERJUANGAN
    </option>

    <option value="GOLKAR" <?= ($caleg->partai == 'GOLKAR') ? 'selected' : '' ?>>
        GOLKAR
    </option>

    <option value="NASDEM" <?= ($caleg->partai == 'NASDEM') ? 'selected' : '' ?>>
        NASDEM
    </option>

    <option value="PARTAI BURUH" <?= ($caleg->partai == 'PARTAI BURUH') ? 'selected' : '' ?>>
        PARTAI BURUH
    </option>

    <option value="PARTAI GELORA" <?= ($caleg->partai == 'PARTAI GELORA') ? 'selected' : '' ?>>
        PARTAI GELORA
    </option>

    <option value="PKS" <?= ($caleg->partai == 'PKS') ? 'selected' : '' ?>>
        PKS
    </option>

    <option value="PKN" <?= ($caleg->partai == 'PKN') ? 'selected' : '' ?>>
        PKN
    </option>

    <option value="HANURA" <?= ($caleg->partai == 'HANURA') ? 'selected' : '' ?>>
        HANURA
    </option>

    <option value="GARUDA" <?= ($caleg->partai == 'GARUDA') ? 'selected' : '' ?>>
        GARUDA
    </option>

    <option value="PAN" <?= ($caleg->partai == 'PAN') ? 'selected' : '' ?>>
        PAN
    </option>

    <option value="PBB" <?= ($caleg->partai == 'PBB') ? 'selected' : '' ?>>
        PBB
    </option>

    <option value="DEMOKRAT" <?= ($caleg->partai == 'DEMOKRAT') ? 'selected' : '' ?>>
        DEMOKRAT
    </option>

    <option value="PSI" <?= ($caleg->partai == 'PSI') ? 'selected' : '' ?>>
        PSI
    </option>

    <option value="PERINDO" <?= ($caleg->partai == 'PERINDO') ? 'selected' : '' ?>>
        PERINDO
    </option>

    <option value="PPP" <?= ($caleg->partai == 'PPP') ? 'selected' : '' ?>>
        PPP
    </option>

    <option value="PARTAI UMMAT" <?= ($caleg->partai == 'PARTAI UMMAT') ? 'selected' : '' ?>>
        PARTAI UMMAT
    </option>

</select>

</div>

<!-- KATEGORI -->
<div class="form-group">

<label>Kategori</label>

<select name="kategori"
        class="form-control"
        required>

<option value="DPR RI"
<?= $caleg->kategori == 'DPR RI' ? 'selected' : '' ?>>
DPR RI
</option>

<option value="DPRD PROVINSI"
<?= $caleg->kategori == 'DPRD PROVINSI' ? 'selected' : '' ?>>
DPRD PROVINSI
</option>

<option value="DPRD KABUPATEN"
<?= $caleg->kategori == 'DPRD KABUPATEN' ? 'selected' : '' ?>>
DPRD KABUPATEN
</option>

</select>

</div>

<!-- FOTO -->
<div class="form-group">

<label>Foto</label>

<br>

<?php if($caleg->foto != ''): ?>

<img src="<?= base_url('uploads/caleg/'.$caleg->foto) ?>"
     width="120"
     class="mb-2">

<br><br>

<?php endif; ?>

<input type="file"
       name="foto"
       class="form-control">

<small class="text-muted">
Kosongkan jika tidak ingin mengganti foto
</small>

</div>

<button type="submit"
        class="btn btn-success">

Update

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
            id_kabupaten : id_kabupaten
        },

        dataType : "json",

        success:function(data)
        {
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