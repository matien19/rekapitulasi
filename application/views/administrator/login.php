<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Administrator</title>

    <!-- SB Admin 2 CSS -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- CUSTOM STYLE -->
    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #224abe);
            height: 100vh;
        }

        .login-container {
            height: 100vh;
        }

        .card {
            border-radius: 15px;
        }

        .form-control-user {
            border-radius: 30px;
            padding: 15px;
        }

        .btn-user {
            border-radius: 30px;
            padding: 10px;
        }
    </style>
</head>

<body>

    <div class="container d-flex align-items-center justify-content-center login-container">

        <div class="col-xl-4 col-lg-5 col-md-6">

            <div class="card shadow-lg border-0">
                <div class="card-body p-5">

                    <div class="text-center mb-4">
                        <h4 class="text-gray-900 font-weight-bold">
                            LOGIN USERS
                        </h4>
                        <?php echo $this->session->flashdata('pesan') ?>
                    </div>

                    <!-- FORM LOGIN -->
                    <form method="post" action="<?php echo base_url('index.php/administrator/auth/proses_login')?>">

    <div class="form-group mb-3">
        <input type="text" name="username"
            class="form-control form-control-user"
            placeholder="Username Anda">
            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>

    </div>

    <div class="form-group mb-4">
        <input type="password" name="password"
            class="form-control form-control-user"
            placeholder="Password Anda">
            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
    </div>

    <button class="btn btn-primary btn-user btn-block">Login</button>

</form>
                    <!-- END FORM -->

                </div>
            </div>

        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>