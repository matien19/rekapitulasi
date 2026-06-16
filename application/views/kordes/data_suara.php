<!-- Menambahkan CSS khusus -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    .kordes-wrapper {
        font-family: 'Poppins', sans-serif;
        background-color: #f3f4f6;
        padding: 20px;
        min-height: 100vh;
    }

    .custom-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    /* Card Header Gradien Ungu-Biru */
    .card-header-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
    }

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

    .table-custom tbody tr:hover {
        background-color: #f5f3ff;
        transform: translateX(5px);
    }

    .table-custom tbody td {
        padding: 15px;
        vertical-align: middle;
        font-size: 0.9rem;
        color: #555;
    }

    .badge-role {
        background-color: #e0e7ff;
        color: #4338ca;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .badge-desa {
        background-color: #ecfdf5;
        color: #047857;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }
</style>

<!-- Struktur HTML Baru -->

<div class="container kordes-wrapper">
    
    <h2 class="text-center mb-4 text-secondary" style="font-weight: 600;">
        Data Kordes
    </h2>

    <!-- Card Utama -->
    <div class="card custom-card">
        
        <!-- Card Header Gradien -->
        <div class="card-header-gradient">
            <h5 class="card-header-title mb-0">
                <i class="fas fa-user-tie mr-2"></i> Daftar Kordes
            </h5>
            <span class="badge badge-light text-dark" style="font-size: 0.8rem; padding: 5px 10px; border-radius: 20px;">
                Total: <?= count($kordes) ?> Orang
            </span>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-custom mb-0">
                    
                    <thead>
                        <tr>
                            <th scope="col">Nama Kordes</th>
                            <th scope="col">Username</th>
                            <th scope="col">Role</th>
                            <th scope="col">Desa</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach($kordes as $k) : ?>

                        <tr>
                            <td>
                                <div class="font-weight-bold" style="color: #333;">
                                    <i class="fas fa-user-circle text-secondary mr-2"></i><?= $k->nama ?>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted"><?= $k->username ?></span>
                            </td>
                            <td>
                                <span class="badge badge-role">
                                    <?= $k->role ?>
                                </span>
                            </td>
                            <td>
                                <span class="badge badge-desa">
                                    <i class="fas fa-map-marked-alt mr-1"></i><?= $k->nama_desa ?>
                                </span>
                            </td>
                        </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="card-footer bg-white py-3">
            <small class="text-muted">Data Kordes Aktif</small>
        </div>
    </div>
</div>