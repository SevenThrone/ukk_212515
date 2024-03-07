<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Album</title>
    <link href="<?= base_url(); ?>/dist/css/tabler.min.css?1684106062" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= base_url('assets/css/add.css'); ?>">
</head>

<body class="body">
    <div class="page justify-content-center align-item-center">
        <div class="container">
            <div class="card w-50 border-0 shadow">
                <div class="card-body">
                    <h1 class="card-title">Form Tambah Album</h1>

                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <form class="d-flex justify-content-between" action="<?php echo base_url('Image/tambah_album'); ?>" method="post" enctype="multipart/form-data">
                        <div>
                            <input class="mb-2 mt-5 rounded" type="text" name="NamaAlbum" placeholder="Nama Album">
                            <textarea class="rounded mt-5" name="Deskripsi" id="Deskripsi" cols="30" rows="5"></textarea>
                            <div class="mb-3">
                                <label class="form-label">File</label>
                                <input type="file" name="album" class="form-control">
                                <?= @$error ?>
                            </div>
                            <input type="hidden" name="TanggalDibuat" value="<?= date('Y-m-d') ?>">
                            <input type="hidden" name="user" value="<?= $this->session->userdata('Username') ?>">
                            <input class="mt-5 rounded" type="submit" value="Tambah Album">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>