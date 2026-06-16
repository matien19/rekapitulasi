<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Edit Kabupaten</h1>

<div class="card shadow">
<div class="card-body">

<form method="post"
      action="<?= site_url('index.php/administrator/kabupaten/update') ?>">

<input type="hidden"
       name="id_kabupaten"
       value="<?= $kabupaten->id_kabupaten ?>">

<!-- PROVINSI -->
<div class="form-group">

    <label>Pilih Provinsi</label>

    <select name="id_provinsi"
            class="form-control"
            required>

        <option value="">-- Pilih Provinsi --</option>

        <?php foreach($provinsi as $p): ?>

            <option value="<?= $p->id_provinsi ?>"
                <?= ($p->id_provinsi == $kabupaten->id_provinsi) ? 'selected' : '' ?>>

                <?= $p->nama_provinsi ?>

            </option>

        <?php endforeach; ?>

    </select>

</div>

<!-- KABUPATEN -->
<div class="form-group">

    <label>Nama Kabupaten</label>

    <input type="text"
           name="nama_kabupaten"
           class="form-control"
           value="<?= $kabupaten->nama_kabupaten ?>"
           required>

</div>

<button type="submit" class="btn btn-success">
    Update
</button>

<a href="<?= site_url('index.php/administrator/kabupaten') ?>"
   class="btn btn-secondary">
   Kembali
</a>

</form>

</div>
</div>
</div>