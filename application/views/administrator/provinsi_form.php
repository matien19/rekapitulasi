<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Tambah Provinsi</h1>

<div class="card shadow">
<div class="card-body">

<form method="post"
      action="<?= site_url('index.php/administrator/provinsi/simpan') ?>">

<div class="form-group">
    <label>Nama Provinsi</label>

    <input type="text"
           name="nama_provinsi"
           class="form-control"
           required>
</div>

<button type="submit" class="btn btn-success">
    Simpan
</button>

<a href="<?= site_url('index.php/administrator/provinsi') ?>"
   class="btn btn-secondary">
   Kembali
</a>

</form>

</div>
</div>
</div>