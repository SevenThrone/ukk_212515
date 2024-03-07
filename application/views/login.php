<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Photo's</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <div class="wrapper">
        <form action="<?= base_url('Auth/login') ?>" method="post">
            <h1>Login</h1>
            <?= $this->session->flashdata('error') ?>
            <?php if (empty(form_error('User'))) { ?>
                <div class="input-box">
                    <input type="text" placeholder="Username" name="User">
                    <i class='bx bxs-user'></i>
                </div>
            <?php } else { ?>
                <div class="input-boxerror">
                    <input type="text" placeholder="Username" name="User">
                    <i class='bx bxs-user'></i>
                </div>
            <?php } ?>
            <?php if (empty(form_error('Pass'))) { ?>
                <div class="input-box">
                    <input type="password" placeholder="Password" name="Pass">
                    <i class='bx bxs-lock-alt'></i>
                </div>
            <?php } else { ?>
                <div class="input-boxerror">
                    <input type="password" placeholder="Password" name="Pass">
                    <i class='bx bxs-lock-alt'></i>
                </div>
            <?php } ?>

            <button type="submit" class="btn">Login</button>

            <div class="register-link">
                <p>Don't have account? <a href="<?= base_url('Auth/regis') ?>">Register</a></p>
            </div>
        </form>
    </div>

</body>

</html>