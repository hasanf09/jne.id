<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>JNE | Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/auth/login.css" rel="stylesheet">

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo" style="color: #333">
           <center> <img src="<?= base_url('assets/img/logo/logo jne.png'); ?>" width="70%" alt=""> </center> <br>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <form class="user" method="POST" action="<?= base_url('auth') ?>" id="form-login">
                    <input type="hidden" name="_token" value="0oc5feQlRMOAVb7TV4nK8IhVn2m34xW0NLvXvSQn">
                    <div class="alert alert-danger" style="display: none;">
                        <span id="danger-msg"></span>
                    </div>
                    <?= $this->session->flashdata('message'); ?>

                    <div class="form-group has-feedback">
                        <center> <h4> LOGIN </h4> </center>
                        <label style="color: #333; font-weight: 400">Email</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group has-feedback">
                        <label style="color: #333; font-weight: 400">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group has-feedback">
                                <button type="submit" id="login" class="btn btn-primary btn-block btn-flat" style="border-radius: 4px; background-color: #0E318B; border-color: #0E318B">Login</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>