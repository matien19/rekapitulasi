<div class="container-fluid">

<h3>Edit Suara</h3>

<div class="card shadow">

<div class="card-body">

<form method="post"
      action="<?= site_url('index.php/saksi/update_suara') ?>"
      enctype="multipart/form-data">

<input type="hidden"
       name="id_suara"
       value="<?= $suara->id_suara ?>">

<div class="form-group">

<label>Nama Caleg</label>

<input type="text"
       class="form-control"
       value="<?= $suara->nama_caleg ?>"
       readonly>

</div>

<div class="form-group">

<label>Jumlah Suara</label>

<input type="number"
       name="jumlah_suara"
       class="form-control"
       value="<?= $suara->jumlah_suara ?>"
       required>

</div>

<div class="form-group">

<label>Foto Bukti Saat Ini</label>
<br>

<?php if(!empty($suara->foto)): ?>

    <img src="<?= base_url('uploads/suara/'.$suara->foto) ?>"
         width="250"
         class="img-thumbnail mb-2">

    <br>

    <a href="<?= base_url('uploads/suara/'.$suara->foto) ?>"
       target="_blank"
       class="btn btn-info btn-sm">

        <i class="fas fa-eye"></i>
        Lihat Foto

    </a>

<?php else: ?>

    <span class="badge badge-danger">
        Tidak Ada Foto
    </span>

<?php endif; ?>

</div>

<div class="form-group">

<label>Ganti Foto Bukti</label>

<input type="file"
       name="foto"
       class="form-control">

<small class="text-muted">
Kosongkan jika tidak ingin mengganti foto.
</small>

</div>

<button type="submit"
        class="btn btn-success">

    <i class="fas fa-save"></i>
    Update

</button>

<a href="<?= site_url('index.php/saksi/hasil_suara') ?>"
   class="btn btn-secondary">

    <i class="fas fa-arrow-left"></i>
    Kembali

</a>

</form>

</div>

</div>

</div>