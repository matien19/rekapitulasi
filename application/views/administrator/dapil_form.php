<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Tambah Dapil</h1>

<div class="card shadow">
<div class="card-body">

<form method="post"
action="<?= site_url('index.php/administrator/dapil/simpan') ?>">

<div class="form-group">
<label>Kabupaten</label>

<select name="id_kabupaten"
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
<label>Nama Dapil</label>

<input type="text"
name="nama_dapil"
class="form-control"
required>
</div>

<div class="form-group">
<label>Kategori</label>

<select name="kategori"
class="form-control"
required>

<option value="">-- Pilih Kategori --</option>
<option>DPRD KABUPATEN</option>

</select>
</div>

<button class="btn btn-success">
Simpan
</button>

</form>

</div>
</div>
</div>