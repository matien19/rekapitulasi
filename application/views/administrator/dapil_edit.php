<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Edit Dapil</h1>

    <div class="card shadow">
        <div class="card-body">

            <form method="post"
                action="<?= site_url('index.php/administrator/dapil/update') ?>">

                <input type="hidden"
                    name="id_dapil"
                    value="<?= $dapil->id_dapil ?>">

                <div class="form-group">
                    <label>Kabupaten</label>

                    <select name="id_kabupaten"
                        class="form-control"
                        required>

                        <option value="">-- Pilih Kabupaten --</option>

                        <?php foreach ($kabupaten as $k): ?>

                            <option value="<?= $k->id_kabupaten ?>"
                                <?= ($k->id_kabupaten == $dapil->id_kabupaten) ? 'selected' : ''; ?>>
                                <?= $k->nama_kabupaten; ?>
                            </option>

                        <?php endforeach; ?>

                    </select>
                </div>

                <div class="form-group">
                    <label>Nama Dapil</label>

                    <input type="text"
                        name="nama_dapil"
                        class="form-control"
                        value="<?= $dapil->nama_dapil; ?>"
                        required>
                </div>

                <div class="form-group">
                    <label>Kategori</label>

                    <select name="kategori"
                        class="form-control"
                        required>

                        <option value="">-- Pilih Kategori --</option>

                        <option value="DPRD KABUPATEN"
                            <?= ($dapil->kategori == 'DPRD KABUPATEN') ? 'selected' : ''; ?>>
                            DPRD KABUPATEN
                        </option>

                    </select>
                </div>

                <button type="submit" class="btn btn-success">
                    Update
                </button>

                <a href="<?= site_url('index.php/administrator/dapil') ?>"
                    class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>