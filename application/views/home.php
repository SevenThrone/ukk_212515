<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery Photo's</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/home.css'); ?>">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
  <header class="header">
    <a href="Welcome" class="logo"><img src="<?= base_url('assets/css/logo1.png') ?>" alt="" width="250"></a>
    <nav class="navbar">
      <a href="Welcome">Home</a>
      <?php $akun = $this->session->userdata('Username');
      if (empty($akun)) { ?>
        <p></p>
      <?php  } else {
      ?>

      <?php } ?>
      <?php $akun = $this->session->userdata('Username');
      if (empty($akun)) { ?>
        <a href="<?php echo base_url('Auth/login'); ?>">Login</a>
      <?php  } else {
      ?>
        <a href="<?php echo base_url('Auth/logout'); ?>">Log Out</a>
      <?php } ?>
    </nav>
  </header>
  <div class="container">
    <div class="judul text-center text-white mb-5 mt-4">
      <h1 class="glowing-text">CATEGORY</h1>
    </div>
    <div class="row">
      <?php foreach ($Album as $dt) : ?>
        <div class="col-sm-3 mb-3">
          <div class="card mt-5">
            <a href="<?= base_url('Page/League/index/' . $dt->AlbumID) ?>">
              <img src="<?= base_url('album/' . $dt->GambarAlbum) ?>" class="card-img-top rounded" alt="Album Image" style="height: 160px ;">
            </a>
            <div class="card-body">
              <h5 class="card-title text-white"><?= $dt->NamaAlbum ?></h5>

              <p class="card-text text-white"><?= $dt->Deskripsi ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <?php $akun = $this->session->userdata('Username');
                if (empty($akun)) { ?>
                  <p></p>
                <?php  } else {
                ?>

                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
  <br>
  <br>

  <!-- icon -->
  <script src="https://kit.fontawesome.com/3a2d27c1eb.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      console.log("Document ready");

      $(document).on('click', '.delete-btn', function() {
        console.log("Delete button clicked");
        var index = $(this).data('index');
        console.log("Index:", index);
        var url = "<?= base_url('Image/deleteAlbum/') ?>" + index;
        console.log("URL:", url);
        window.location.href = url;
      });
    });
  </script>
</body>

</html>