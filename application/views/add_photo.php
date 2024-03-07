<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Image</title>
    <link href="<?= base_url(); ?>/dist/css/tabler.min.css?1684106062" rel="stylesheet">
    <link href="<?= base_url(); ?>/dist/css/tabler-flags.min.css?1684106062" rel="stylesheet">
    <link href="<?= base_url(); ?>/dist/css/tabler-payments.min.css?1684106062" rel="stylesheet">
    <link href="<?= base_url(); ?>/dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet">
    <link href="<?= base_url(); ?>/dist/css/demo.min.css?1684106062" rel="stylesheet">
    <link href="<?= base_url(); ?>/dist/css/chat.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
    <a href="Welcome" class="logo"><img src="<?= base_url('assets/css/logo1.png') ?>" alt="" width="90"></a>

</head>

<body class="body">
    <a href="Welcome" class="logo"><img src="<?= base_url('assets/css/logo2.png') ?>" alt="" width="250"></a>

    <div class="page-wrapper">
        <div class="page-header d-print-none">
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
        </div>
        <div class="page-body">
            <div class="container container-tight">
                <div class="card card-sm">
                    <div class="card-body">
                        <h2 class="page-title text-center mb-5 text-black" style="display: block; text-align: center;">Tambah Image</h2>
                        <?= form_open_multipart('Image/tambah_gambar/'); ?>
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" name="nama_gambar" class="form-control" placeholder="..." style="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="DeskripsiFoto" rows="6" placeholder="Content.." style="" required></textarea>
                        </div>
                        <input type="hidden" name="TanggalUnggah" value="<?= date('Y-m-d'); ?>">
                        <div class="mb-3">
                            <label class="form-label">File</label>
                            <input type="file" name="LokasiFile" class="form-control" style="background-color: rgba(255, 255, 255, 0.1);">
                            <?= @$error ?>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Album</div>
                            <select name="AlbumID" class="form-select" style="">
                                <?php foreach ($albums as $dt) : ?>
                                    <option value="<?= $dt->AlbumID; ?>"><?= $dt->NamaAlbum; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <input type="hidden" name="UserID" value="<?= $this->session->userdata('Username') ?>">
                        <div class="form-footer">
                            <button type="submit" class="btn btn-info w-100 mb-2">Tambah</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>