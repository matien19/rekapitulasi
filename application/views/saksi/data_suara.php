<!-- Menambahkan CSS khusus untuk tampilan ini -->
<style>
    /* Mengimpor font yang bersih */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    /* Body container kecil untuk centering */
    .data-saksi-wrapper {
        font-family: 'Poppins', sans-serif;
        background-color: #f3f4f6;
        padding: 20px;
        min-height: 100vh;
    }

    /* Membuat Kartu utama */
    .custom-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    /* Header Warna Gradien */
    .card-header-gradient {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); /* biru muda menarik */
        /* Alternatif warna lain jika ingin sedikit tua: background: linear-gradient(45deg, #3b8d99, #6b6b83); */
        padding: 20px 25px;
        color: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .card-header-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .header-icon {
        font-size: 1.5rem;
        opacity: 0.8;
    }

    /* Styling Tabel */
    .table-custom {
        margin-bottom: 0;
        width: 100%;
    }

    .table-custom thead th {
        background-color: #f8f9fa;
        color: #495057;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
        border-bottom: 2px solid #e9ecef;
        padding: 15px;
    }

    .table-custom tbody tr {
        transition: all 0.2s ease;
        border-bottom: 1px solid #f1f1f1;
    }

    /* Efek saat kursor hover baris */
    .table-custom tbody tr:hover {
        background-color: #f0f9ff;
        transform: translateX(5px); /* Sedikit animasi geser */
        box-shadow: -2px 2px 10px rgba(0,0,0,0.05);
    }

    .table-custom tbody td {
        padding: 15px;
        vertical-align: middle;
        font-size: 0.9rem;
        color: #555;
    }

    /* Styling Nomor Urut (No) agar seperti pill/badge */
    .no-urut {
        background-color: #e9ecef;
        color: #495057;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 0.8rem;
    }
    
    /* Responsif */
    .table-responsive {
        padding: 0;
    }
</style>

<!-- Struktur HTML Baru -->

<div class="container data-saksi-wrapper">
    
    <!-- Judul Halaman (Dapat disembunyikan jika sudah ada di header utama) -->
    <h2 class="text-center mb-4 text-secondary" style="font-weight: 600;">
        Data Saksi TPS
    </h2>

    <!-- Card Utama -->
    <div class="card custom-card">
        
        <!-- Card Header Berbentuk Gradien -->
        <div class="card-header-gradient">
            <h5 class="card-header-title mb-0">
                <i class="fas fa-users mr-2 header-icon"></i> Realtime Data Saksi
            </h5>
            <span class="badge badge-light text-dark" style="font-size: 0.8rem; padding: 5px 10px; border-radius: 20px;">
                Total: <?= count($saksi) ?> Orang
            </span>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-custom mb-0">
                    
                    <thead>
                        <tr>
                            <th scope="col">Nama Saksi</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Desa / Kelurahan</th>
                            <th scope="col">TPS</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach($saksi as $s) : ?>

                        <tr>
                            <!-- Data -->
                            <td>
                                <div class="font-weight-bold text-primary"><?= $s->nama_saksi ?></div>
                            </td>
                            <td>
                                <span class="badge badge-secondary" style="font-weight: 500;">
                                    <?= $s->nik ?>
                                </span>
                            </td>
                            <td>
                                <i class="fas fa-map-marker-alt text-danger mr-1"></i> <?= $s->nama_desa ?>
                            </td>
                            <td>
                                <span class="btn btn-sm btn-outline-info rounded-pill px-3 py-1" style="font-size: 0.8rem;">
                                    <?= $s->nama_tps ?>
                                </span>
                            </td>
                        </tr>

                        <?php endforeach; ?>

                        <?php if(empty($saksi)) : ?>
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                <em>Data saksi belum tersedia.</em>
                            </td>
                        </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Card Footer (Opsional) -->
        <div class="card-footer bg-white text-right py-3">
            <small class="text-muted">Terakhir diperbarui: <?= date('d-m-Y H:i') ?></small>
        </div>
    </div>
</div>