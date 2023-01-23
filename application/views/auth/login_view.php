<?php
$this->load->view('templates/header'); ?>
<?php if (isset($message_success)) { ?>
    <div class="alert alert-success alert-dismissible fixed-top m-4 shadow">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Berhasil!</strong> <?= $message_success; ?>
    </div>
<?php } else if (isset($message_failure)) { ?>
    <div class="alert alert-success alert-dismissible fixed-top m-4 shadow">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Gagal!</strong> <?= $message_failure; ?>
    </div>
<?php } ?>

<body class="bg-gradient-success">
    <div class="container">
        <div class="row justify-content-center align-middle">
            <div class="col-lg-5">
                <form method="POST" action="<?= base_url('auth/login'); ?>" class="text-center bg-light content">
                    <h3><b>PUSKESMAS SOSOK</b></h3>
                    <hr>
                    <h6>SISTEM INFORMASI PENGOLAHAN DATA PASIEN</h6>
                    <div style="height: 20px"></div>
                    <div class="mb-3 login-text-input">
                        <input name="username" value="<?= $username; ?>" type="string" class="form-control" id="inputUsername" placeholder="Username" />
                    </div>
                    <div class="mb-3 login-text-input">
                        <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password" />
                    </div>
                    <button type="submit" class="btn btn-primary w-100 p-2">
                        <div id="loginText" class="login-text">Login</div>
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>
<style>
    .content {
        padding: 40px;
        border-radius: 12px;
        margin-top: 25%;
    }
</style>

<?php
$this->load->view('templates/footer.php');
?>