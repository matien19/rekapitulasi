<!-- BOTTOM NAVIGATION (ANDROID STYLE) -->
<style>
.bottom-nav {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: #fff;
    border-top: 1px solid #ddd;
    display: flex;
    justify-content: space-around;
    padding: 8px 0;
    z-index: 999;
}

.bottom-nav a {
    text-align: center;
    font-size: 12px;
    color: #666;
    text-decoration: none;
    flex: 1;
}

.bottom-nav a i {
    display: block;
    font-size: 18px;
    margin-bottom: 3px;
}

.bottom-nav a.active {
    color: #4e73df;
}
</style>

<div class="bottom-nav">

    <a href="<?= base_url('index.php/saksi') ?>">
        <i class="fas fa-home"></i>
        Home
    </a>

    <a href="<?= base_url('index.php/saksi/pilih_kategori') ?>">
        <i class="fas fa-edit"></i>
        Input
    </a>

    <a href="<?= base_url('index.php/saksi/data_suara') ?>">
        <i class="fas fa-table"></i>
        Data
    </a>

    <a href="<?= base_url('index.php/saksi/hasil_suara') ?>">
        <i class="fas fa-table"></i>
        Hasil Suara
    </a>

   <a href="<?= base_url('index.php/saksi/logout') ?>">
    <i class="fas fa-sign-out-alt"></i>
    Logout
</a>

</div>