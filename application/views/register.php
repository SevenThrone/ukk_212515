<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Photo's</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <div class="wrapper">
        <form action="<?= base_url('Auth/register') ?>" method="post">
            <h1>Register</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name="User" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="Pass" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="input-box">
                <input type="email" placeholder="Email" name="Email" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Nama Lengkap" name="Nama" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Alamat" name="Alamat" required>
                <i class='bx bxs-institution'></i>
            </div>

            <button type="submit" class="btn" style="margin-top: 1rem;">Register</button>

            <div class="register-link">
                <p>Already have account? <a href="<?= base_url('Auth') ?>">Login</a></p>
            </div>

        </form>
    </div>

</body>

</html>