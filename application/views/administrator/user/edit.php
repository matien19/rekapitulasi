<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Edit User
    </h1>

    <div class="card shadow">

        <div class="card-body">

            <form method="post"
                  action="<?= base_url('index.php/administrator/user/update') ?>">

                <input type="hidden"
                       name="id_user"
                       value="<?= $user->id_user ?>">

                <div class="form-group">

                    <label>Nama</label>

                    <input type="text"
                           name="nama"
                           class="form-control"
                           value="<?= $user->nama ?>"
                           required>

                </div>

                <div class="form-group">

                    <label>Username</label>

                    <input type="text"
                           name="username"
                           class="form-control"
                           value="<?= $user->username ?>"
                           required>

                </div>

                <div class="form-group">

                    <label>Password</label>

                    <input type="password"
                           name="password"
                           class="form-control">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti password
                    </small>

                </div>

                <div class="form-group">

                    <label>Role</label>

                    <select name="role"
                            id="role"
                            class="form-control"
                            required>

                        <option value="admin"
                            <?= $user->role == 'admin' ? 'selected' : '' ?>>
                            Admin
                        </option>

                        <option value="kordinator_desa"
                            <?= $user->role == 'kordinator_desa' ? 'selected' : '' ?>>
                            Kordes
                        </option>

                    </select>

                </div>

                <div id="wilayah-area"
                     style="<?= $user->role == 'kordinator_desa' ? '' : 'display:none;' ?>">

                    <div class="form-group">

                        <label>Provinsi</label>

                        <select id="provinsi"
                                class="form-control">

                            <option value="">-- Pilih Provinsi --</option>

                            <?php foreach($provinsi as $p): ?>

                            <option value="<?= $p->id_provinsi ?>"
                                <?= ($user->id_provinsi == $p->id_provinsi) ? 'selected' : '' ?>>

                                <?= $p->nama_provinsi ?>

                            </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Kabupaten</label>

                        <select id="kabupaten"
                                class="form-control">

                            <option value="<?= $user->id_kabupaten ?>">
                                <?= $user->nama_kabupaten ?>
                            </option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Kecamatan</label>

                        <select id="kecamatan"
                                class="form-control">

                            <option value="<?= $user->id_kecamatan ?>">
                                <?= $user->nama_kecamatan ?>
                            </option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Desa</label>

                        <select name="id_desa"
                                id="desa"
                                class="form-control">

                            <option value="<?= $user->id_desa ?>">
                                <?= $user->nama_desa ?>
                            </option>

                        </select>

                    </div>

                </div>

                <button type="submit"
                        class="btn btn-primary">

                    Update

                </button>

                <a href="<?= base_url('index.php/administrator/user') ?>"
                   class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

<script>

document.getElementById('role').addEventListener('change', function(){

    if(this.value == 'kordinator_desa'){
        document.getElementById('wilayah-area').style.display = 'block';
    }else{
        document.getElementById('wilayah-area').style.display = 'none';
    }

});

$(document).ready(function(){

    $('#provinsi').change(function(){

        $.ajax({

            url : "<?= base_url('index.php/administrator/user/get_kabupaten') ?>",
            type : "POST",

            data : {
                id_provinsi : $(this).val()
            },

            success : function(data){

                var hasil = JSON.parse(data);

                var html = '<option value="">-- Pilih Kabupaten --</option>';

                $.each(hasil, function(i,v){

                    html += '<option value="'+v.id_kabupaten+'">'+v.nama_kabupaten+'</option>';

                });

                $('#kabupaten').html(html);
                $('#kecamatan').html('<option value="">-- Pilih Kecamatan --</option>');
                $('#desa').html('<option value="">-- Pilih Desa --</option>');

            }

        });

    });

    $('#kabupaten').change(function(){

        $.ajax({

            url : "<?= base_url('index.php/administrator/user/get_kecamatan') ?>",
            type : "POST",

            data : {
                id_kabupaten : $(this).val()
            },

            success : function(data){

                var hasil = JSON.parse(data);

                var html = '<option value="">-- Pilih Kecamatan --</option>';

                $.each(hasil, function(i,v){

                    html += '<option value="'+v.id_kecamatan+'">'+v.nama_kecamatan+'</option>';

                });

                $('#kecamatan').html(html);
                $('#desa').html('<option value="">-- Pilih Desa --</option>');

            }

        });

    });

    $('#kecamatan').change(function(){

        $.ajax({

            url : "<?= base_url('index.php/administrator/user/get_desa') ?>",
            type : "POST",

            data : {
                id_kecamatan : $(this).val()
            },

            success : function(data){

                var hasil = JSON.parse(data);

                var html = '<option value="">-- Pilih Desa --</option>';

                $.each(hasil, function(i,v){

                    html += '<option value="'+v.id_desa+'">'+v.nama_desa+'</option>';

                });

                $('#desa').html(html);

            }

        });

    });

});

</script>
