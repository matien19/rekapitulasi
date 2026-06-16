<div class="container-fluid">

    <h1 class="="h3 mb-4 text-gray-800">Edit Saksi</h1>

    <div class="card shadow">
        <div class="card-body">

            <form method="post"
                  action="<?= site_url('index.php/administrator/saksi/update') ?>">

                <!-- ID SAKSI -->
                <input type="hidden"
                       name="id_saksi"
                       value="<?= isset($saksi->id_saksi) ? $saksi->id_saksi : '' ?>">

                <!-- ID TPS -->
                <input type="hidden"
                       name="id_tps"
                       value="<?= isset($saksi->id_tps) ? $saksi->id_tps : '' ?>">

                <!-- ID WILAYAH -->
                <input type="hidden"
                       name="id_provinsi"
                       value="<?= isset($saksi->id_provinsi) ? $saksi->id_provinsi : '' ?>">

                <input type="hidden"
                       name="id_kabupaten"
                       value="<?= isset($saksi->id_kabupaten) ? $saksi->id_kabupaten : '' ?>">

                <input type="hidden"
                       name="id_kecamatan"
                       value="<?= isset($saksi->id_kecamatan) ? $saksi->id_kecamatan : '' ?>">

                <input type="hidden"
                       name="id_desa"
                       value="<?= isset($saksi->id_desa) ? $saksi->id_desa : '' ?>">

                <!-- NAMA -->
                <div class="form-group">
                    <label>Nama Saksi</label>
                    <input type="text"
                           name="nama_saksi"
                           class="form-control"
                           value="<?= isset($saksi->nama_saksi) ? $saksi->nama_saksi : '' ?>"
                           required>
                </div>

                <!-- NIK -->
                <div class="form-group">
                    <label>NIK</label>
                    <input type="text"
                           name="nik"
                           class="form-control"
                           value="<?= isset($saksi->nik) ? $saksi->nik : '' ?>"
                           minlength="16"
                           maxlength="16"
                           pattern="[0-9]{16}"
                           required>
                </div>

                <!-- NO HP -->
                <div class="form-group">
                    <label>No HP</label>
                    <input type="text"
                           name="no_hp"
                           class="form-control"
                           value="<?= isset($saksi->no_hp) ? $saksi->no_hp : '' ?>"
                           minlength="11"
                           maxlength="14"
                           pattern="[0-9]{11,14}"
                           required>
                </div>

                <!-- USERNAME -->
                <div class="form-group">
                    <label>Username</label>
                    <input type="text"
                           name="username"
                           class="form-control"
                           value="<?= isset($saksi->username) ? $saksi->username : '' ?>"
                           required>
                </div>

                <!-- PASSWORD -->
                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password"
                           name="password"
                           class="form-control">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti password
                    </small>
                </div>

                <button type="submit" class="btn btn-success">
                    Update
                </button>

                <a href="<?= site_url('index.php/administrator/saksi') ?>"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>