<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Photo's</title>
    <link href="<?= base_url(); ?>/dist/css/tabler.min.css?1684106062" rel="stylesheet">
    <link href="<?= base_url(); ?>/dist/css/demo.min.css?1684106062" rel="stylesheet">
    <link href="<?= base_url(); ?>/dist/css/chat.css" rel="stylesheet">

</head>
<body>
<div class="page-wrapper">
    <div class="page-header d-print-none">
    <div class="page-body">
        <div class="container container-tight ">
            <div class="card card-sm position-absolute top-50 start-50 translate-middle" style="width: 25%;">
                <div class="card-body">
                    <?php foreach($foto as $dt): ?>
                        
                    <?= form_open_multipart('Image/ubahImage/'.$dt->FotoID); ?>
                    <h2 class="page-title text-center text-white" style="display: block; text-align: center;">Edit Image</h2>
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" name="JudulFoto" class="form-control" placeholder="...." value="<?= $dt->JudulFoto?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="DeskripsiFoto" rows="6" placeholder="Content.." style="height: 149px;" required><?= $dt->DeskripsiFoto?></textarea>
                        </div>
                        <input type="hidden" name="TanggalUnggah" value="<?= date('Y-m-d'); ?>">
                        <div class="mb-3">
                            <label class="form-label">File</label>
                            <input type="file" name="LokasiFile" class="form-control">
                            <?= @$error ?>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Album</div>
                            <select name="album" class="form-select" value="<?= $dt->AlbumID?>">
                                <?php foreach ($albums as $dt) : //dt = data 
                                ?>
                                    <option value="<?= $dt->AlbumID; ?>"><?= $dt->NamaAlbum; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <input type="hidden" name="user" value="<?= $this->session->userdata('Username') ?>">
                        <div class="form-footer">
                            <button type="submit" class="btn btn-info w-100 mb-2">Ubah</button>
                        </div>
                    </form>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
