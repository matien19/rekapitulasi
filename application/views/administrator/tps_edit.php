<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Edit TPS</h1>

<div class="card shadow">
<div class="card-body">

<form method="post"
      action="<?= site_url('index.php/administrator/tps/update') ?>">

<input type="hidden"
       name="id_tps"
       value="<?= $tps->id_tps ?>">

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

</form>

</div>
</div>
</div>