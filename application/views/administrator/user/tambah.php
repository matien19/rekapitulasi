<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Tambah User
    </h1>

    <div class="card shadow">

        <div class="card-body">

            <form method="post"
                  action="<?= base_url('index.php/administrator/user/simpan') ?>">

                <div class="form-group">

                    <label>Nama</label>

                    <input type="text"
                           name="nama"
                           class="form-control"
                           required>

                </div>

                <div class="form-group">

                    <label>Username</label>

                    <input type="text"
                           name="username"
                           class="form-control"
                           required>

                </div>

                <div class="form-group">

                    <label>Password</label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           required>

                </div>

                <div class="form-group">

                    <label>Role</label>

                    <select name="role"
                            id="role"
                            class="form-control"
                            required>

                        <option value="">-- Pilih Role --</option>

                        <option value="admin">
                            Admin
                        </option>

                        <option value="kordinator_desa">
                            Kordes
                        </option>

                    </select>

                </div>

                <!-- WILAYAH -->
                <div id="wilayah-area" style="display:none;">

                    <div class="form-group">

                        <label>Provinsi</label>

                        <select id="provinsi" class="form-control">

                            <option value="">
                                -- Pilih Provinsi --
                            </option>

                            <?php foreach($provinsi as $p) : ?>

                            <option value="<?= $p->id_provinsi ?>">
                                <?= $p->nama_provinsi ?>
                            </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Kabupaten</label>

                        <select id="kabupaten"
                                class="form-control">

                            <option value="">
                                -- Pilih Kabupaten --
                            </option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Kecamatan</label>

                        <select id="kecamatan"
                                class="form-control">

                            <option value="">
                                -- Pilih Kecamatan --
                            </option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Desa</label>

                        <select name="id_desa"
                                id="desa"
                                class="form-control">

                            <option value="">
                                -- Pilih Desa --
                            </option>

                        </select>

                    </div>

                </div>

                <button type="submit"
                        class="btn btn-primary">

                    Simpan

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