<style>
    /* Gaya Cards Menu */
    .dashboard-card {
        transition: all 0.3s ease;
        border: none;
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
    }
    
    .dashboard-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
    }

    /* Gradient Text */
    .text-gradient {
        background: linear-gradient(90deg, #4e73df, #224abe);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Icon Box */
    .icon-box {
        width: 80px;
        height: 80px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        margin: 0 auto;
        transition: all 0.3s ease;
    }

    .icon-box-primary {
        background: linear-gradient(135deg, #e7f1ff 0%, #d0e3ff 100%);
        color: #4e73df;
    }
    
    .icon-box-success {
        background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
        color: #2e7d32;
    }

    .icon-box-danger {
        background: linear-gradient(135deg, #ffeaea 0%, #ffcccc 100%);
        color: #dc3545;
    }

    .dashboard-card:hover .icon-box {
        transform: scale(1.1) rotate(5deg);
    }

    /* Message Alert Box */
    .alert-custom {
        border: none;
        border-radius: 15px;
        padding: 20px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 5px 20px rgba(118, 75, 162, 0.3);
    }

    /* Welcome Section */
    .welcome-section {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fc 100%);
        border-radius: 20px;
        padding: 25px;
        border: 1px solid #e3e6f0;
    }

    /* Button Style */
    .btn-gradient-primary {
        background: linear-gradient(90deg, #4e73df, #224abe);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-gradient-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(78, 115, 223, 0.4);
        color: white;
        background: linear-gradient(90deg, #224abe, #4e73df);
    }

    .btn-gradient-danger {
        background: linear-gradient(90deg, #dc3545, #b02a37);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-gradient-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
        color: white;
        background: linear-gradient(90deg, #b02a37, #dc3545);
    }

    /* Quick Info Icon */
    .quick-info-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .bg-icon-user {
        background: linear-gradient(135deg, #fff3e0 0%, #ffe0b2 100%);
        color: #ef6c00;
    }
</style>

<div class="container-fluid px-4 py-4" style="min-height: 100vh; background-color: #f8f9fc;">
    
    <!-- Section Sapaan Saja -->
    <div class="welcome-section mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4 class="font-weight-bold text-dark mb-1">
                    Halo, <span class="text-gradient">Kordes</span>
                </h4>
                <p class="text-muted mb-0">
                    Siap untuk bekerja? Pilih menu di bawah ini ya!
                </p>
            </div>
        </div>
    </div>

    <!-- Alert / Pesan Penting -->
    <?php 
    $pesan_tertinggi = "Penting: pastikan data suara yang diinput valid dan sesuai dengan TPS Masing Masing!";
    ?>
    <div class="alert alert-custom mb-4 d-flex align-items-center" role="alert">
        <i class="fas fa-bullhorn fa-2x mr-3"></i>
        <div>
            <h6 class="font-weight-bold mb-1">Pengumuman</h6>
            <p class="mb-0 small"><?= $pesan_tertinggi ?></p>
        </div>
    </div>

    <!-- Menu Utama (3 Kolom) -->
    <div class="row g-4 mb-4">
        
        <!-- INPUT SUARA -->
        <div class="col-md-4 col-12">
            <div class="card border-0 shadow-sm dashboard-card p-4 text-center h-100">
                <div class="icon-box icon-box-primary mb-4">
                    <i class="fas fa-edit"></i>
                </div>
                
                <h5 class="font-weight-bold text-dark mb-2">Input Suara</h5>
                <p class="text-muted mb-4" style="font-size: 0.9rem;">
                    Masukkan data suara pemilihan berdasarkan TPS masing-masing.
                </p>
                
              <a href="<?= base_url('index.php/kordes/pilih_tps') ?>" class="btn btn-gradient-primary btn-lg rounded-pill px-4">
                    <i class="fas fa-pen mr-2"></i> Mulai Input
                </a>
            </div>
        </div>

        <!-- LIHAT DATA -->
        <div class="col-md-4 col-12">
            <div class="card border-0 shadow-sm dashboard-card p-4 text-center h-100">
                <div class="icon-box icon-box-success mb-4">
                    <i class="fas fa-table"></i>
                </div>
                
                <h5 class="font-weight-bold text-dark mb-2">Data Akun</h5>
                <p class="text-muted mb-4" style="font-size: 0.9rem;">
                    Lihat Informasi Akun Anda.
                </p>
                
                <a href="<?= base_url('index.php/kordes/data_suara') ?>" class="btn btn-lg rounded-pill px-4" style="background: linear-gradient(90deg, #28a745, #1e7e34); border: none; color: white;">
                    <i class="fas fa-eye mr-2"></i> Lihat Data
                </a>
            </div>
        </div>

         <!-- LIHAT DATA SUARA -->
        <div class="col-md-4 col-12">
            <div class="card border-0 shadow-sm dashboard-card p-4 text-center h-100">
                <div class="icon-box icon-box-success mb-4">
                    <i class="fas fa-table"></i>
                </div>
                
                <h5 class="font-weight-bold text-dark mb-2">Data Hasil Suara</h5>
                <p class="text-muted mb-4" style="font-size: 0.9rem;">
                    Lihat Informasi Hasil Input Suara.
                </p>
                
                <a href="<?= base_url('index.php/kordes/hasil_suara_saksi') ?>" class="btn btn-lg rounded-pill px-4" style="background: linear-gradient(90deg, #28a745, #1e7e34); border: none; color: white;">
                    <i class="fas fa-eye mr-2"></i> Lihat Data
                </a>
            </div>
        </div>

        <!-- LOGOUT -->
        <div class="col-md-4 col-12">
            <div class="card border-0 shadow-sm dashboard-card p-4 text-center h-100">
                <div class="icon-box icon-box-danger mb-4">
                    <i class="fas fa-sign-out-alt"></i>
                </div>
                
                <h5 class="font-weight-bold text-dark mb-2">Logout</h5>
                <p class="text-muted mb-4" style="font-size: 0.9rem;">
                    Keluar dari sistem dashboard saksi.
                </p>
                
               <a href="<?= base_url('index.php/kordes/logout') ?>"class="btn btn-gradient-danger btn-lg rounded-pill px-4"onclick="return confirm('Apakah Anda yakin ingin logout?');">
              <i class="fas fa-power-off mr-2"></i> Logout
              </a>
            </div>
        </div>

    </div>

    <!-- Data Saya -->
    <div class="row g-3">
        <div class="col-12">
            <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="quick-info-icon bg-icon-user mr-3">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h6 class="font-weight-bold text-dark mb-1">Data Saya</h6>
                               <p class="text-success mb-0 small">
                             <strong>Status: Aktif</strong>
                             </p>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="badge px-3 py-2 rounded-pill" style="background: #28a745; font-size: 0.8rem; color: white;">
                                <i class="fas fa-check-circle mr-1"></i> Aktif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>