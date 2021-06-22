<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="7tsXn1z4tTzlSkEdoIzdQcYbTkwYEMR7qW8gcAzv">
    <title>JNE | Daftar Customer Service</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="<?= base_url('assets/'); ?>css/auth/register.css" rel="stylesheet">

</head>

<body>
    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center">
                        <img src="<?= base_url('assets/img/logo/logo jne.png'); ?>" alt="" style="width: 200px; margin-bottom: 10px">
                    </div>
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header text-center" style="background-color: #0E318B; border-color: #0E318B; color: #fff;">Bergabung Menjadi Customer Service JNE</div>
                            <div class="card-body">
                                <div class="alert alert-danger" style="display: none;">
                                    <span id="danger-msg"></span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="user" method="POST" action="<?= base_url('auth/register'); ?> ">
                                    <div class="form-group row">
                                        <label class="col-md-2 offset-md-2 col-form-label">Nama</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                                            <?= form_error('name', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 offset-md-2 col-form-label ">Email</label>
                                        <div class="col-md-6">
                                            <input id="email" type="text" class="form-control" placeholder="Alamat Email" name="email" value="<?= set_value('email'); ?>">
                                            <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 offset-md-2 col-form-label ">No HP</label>
                                        <div class="col-md-6">
                                            <input id="phone" type="text" class="form-control" name="phone" placeholder="No Handphone" value="<?= set_value('phone'); ?>">
                                            <?= form_error('phone', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 offset-md-2 col-form-label ">Jenis Kelamin</label>
                                        <div class="col-md-6">
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="Laki-Laki" <?= set_select('jenis_kelamin', 'Laki-Laki'); ?>>Laki-Laki</option>
                                                <option value="Perempuan" <?= set_select('jenis_kelamin', 'Perempuan'); ?>>Perempuan</option>
                                            </select>
                                            <?= form_error('gender', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 offset-md-2 col-form-label ">Alamat</label>
                                        <div class="col-md-6">
                                            <textarea type="text" name="address" id="address" cols="30" rows="2" placeholder="Alamat Lengkap" class="form-control"><?= set_value('address'); ?></textarea>
                                            <?= form_error('address', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 offset-md-2 col-form-label ">Password</label>
                                        <div class="col-md-6">
                                            <input id="password1" type="password" class="form-control pwd" name="password1" placeholder="Password">
                                            <?= form_error('password1', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 offset-md-2 col-form-label ">Confirm</label>
                                        <div class="col-md-6">
                                            <input id="password2" type="password" class="form-control pwd" name="password2" placeholder="Ulangi Password">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" id="register" class="btn btn-block register" style="background-color: #ED1B26; border-color: #ED1B26; color: #fff">
                                                Daftar Sekarang
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer" style="background-color: #0E318B; border-color: #0E318B; color: #fff;">
                                <div class="col-md-12 text-center">
                                    Sudah punya akun? <a href="<?= base_url('auth'); ?>" style="color: #fff; text-decoration: underline;">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>