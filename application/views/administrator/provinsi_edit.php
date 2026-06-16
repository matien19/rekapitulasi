<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Edit Provinsi</h1>

<div class="card shadow">
<div class="card-body">

<form method="post"
      action="<?= site_url('index.php/administrator/provinsi/update') ?>">

<input type="hidden"
       name="id_provinsi"
       value="<?= $provinsi->id_provinsi ?>">

<div class="form-group">
    <label>Nama Provinsi</label>

    <input type="text"
           name="nama_provinsi"
           class="form-control"
           value="<?= $provinsi->nama_provinsi ?>"
           required>
</div>

<button type="submit" class="btn btn-success">
    Update
</button>

<a href="<?= site_url('index.php/administrator/provinsi') ?>"
   class="btn btn-secondary">
   Kembali
</a>

</form>

</div>
</div>
</div>