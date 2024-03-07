<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery Photo's</title>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?= base_url('assets/css/lol.css'); ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <header class="header">
    <a href="<?= base_url('Welcome') ?>" class="logo"><img src="<?= base_url('assets/css/logo1.png') ?>" alt="" width="250"></a>

    <nav class="navbar">
    <a href="Welcome">Home</a>
      <a href="<?= base_url('Image') ?>">Add Photo</a>
    </nav>
  </header>

  <div class="container">
    <div class="judul text-center text-white mb-5 mt-4">
      <h1><?= $album ?> Gallery</h1>
    </div>
    <div class="row row-card mt-5">
      <?php if (empty($Image)) { ?>
        <p class="text-center text-white">Tidak Ada Data</p>
        <?php
      } else {
        foreach ($Image as $data) :
        ?>
          <div class="col-sm-4 mb-4 mt-4">
            <div class="card me-3 rounded">
              <img src="<?= base_url('gambar/' . $data->LokasiFile) ?>" class="card-img-top rounded" alt="...">
              <div class="card-body">
                <div class="d-flex justify-content-between align-item-center">
                  <div>
                    <h5 class="card-title text-white"><?= $data->JudulFoto ?></h5>
                  </div>

                  <div class="text-center">
                    <p class="card-text"><small class="text-white"><?= date("d F Y", strtotime($data->TanggalUnggah)) ?></small></p>
                  </div>
                </div>
                <div class="d-flex justify-content-end">
                  <div class="btn-group mt-3 justify-content-end">
                    <a class="like-button btn btn-secondary" title="Like" data-photo-id="<?= $data->FotoID ?>" data-user-id="<?= $this->session->userdata('Username')  ?>" data-tanggal="<?= date('Y-m-d'); ?>">
                      <svg id="likeIcon" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="#fff" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M6.979 3.074a6 6 0 0 1 4.988 1.425l.037 .033l.034 -.03a6 6 0 0 1 4.733 -1.44l.246 .036a6 6 0 0 1 3.364 10.008l-.18 .185l-.048 .041l-7.45 7.379a1 1 0 0 1 -1.313 .082l-.094 -.082l-7.493 -7.422a6 6 0 0 1 3.176 -10.215z" stroke-width="0" />
                      </svg>
                    </a>
                    <a href="<?= base_url('Image/comment/' . $data->FotoID) ?>" class="btn btn-primary" title="Comment">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                        <path d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105" />
                      </svg>
                    </a>
                    <a href="<?= base_url('Image/EditImage/' . $data->FotoID) ?>" class="btn btn-danger" title="Edit">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                      </svg>
                    </a>
                    <a class="delete-btn btn btn-secondary" data-index="<?= $data->FotoID ?>" title="Delete">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="#fff">
                        <path d="M16 1.75V3h5.25a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1 0-1.5H8V1.75C8 .784 8.784 0 9.75 0h4.5C15.216 0 16 .784 16 1.75Zm-6.5 0V3h5V1.75a.25.25 0 0 0-.25-.25h-4.5a.25.25 0 0 0-.25.25ZM4.997 6.178a.75.75 0 1 0-1.493.144L4.916 20.92a1.75 1.75 0 0 0 1.742 1.58h10.684a1.75 1.75 0 0 0 1.742-1.581l1.413-14.597a.75.75 0 0 0-1.494-.144l-1.412 14.596a.25.25 0 0 1-.249.226H6.658a.25.25 0 0 1-.249-.226L4.997 6.178Z"></path>
                        <path d="M9.206 7.501a.75.75 0 0 1 .793.705l.5 8.5A.75.75 0 1 1 9 16.794l-.5-8.5a.75.75 0 0 1 .705-.793Zm6.293.793A.75.75 0 1 0 14 8.206l-.5 8.5a.75.75 0 0 0 1.498.088l.5-8.5Z"></path>
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php
        endforeach;
      }
      ?>
    </div>


    <!-- icon -->
    <script src="https://kit.fontawesome.com/3a2d27c1eb.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
      $(document).on('click', '.delete-btn', function() {
        var index = $(this).data('index');
        window.location.href = "<?= base_url('Image/deleteImage/') ?>" + index;
        console.log('hapus');
      });
      $(document).on('click', '.like-button', function() {
        var photoId = $(this).data('photo-id');
        var UserId = $(this).data('user-id');
        var tanggal = $(this).data('tanggal');
        var lk = $(this).find('.like-number');
        var love = $(this).find('#likeIcon');

        $.ajax({
          url: '<?= base_url('Image/like') ?>',
          type: 'POST',
          data: {
            photoId: photoId,
            userId: UserId,
            tanggal: tanggal
          },
          dataType: 'json', // Mengatur tipe data yang diharapkan dari respons
          success: function(response) {
            // Menampilkan respons dari permintaan AJAX pada elemen dengan id "response"
            // Tanggapi ketika permintaan berhasil
            lk.text(response.likes);
            console.log(response.likeAkun);


            if (response.likeAkun.length == 0) {
              love.attr('fill', '#fff');
            } else {
              love.attr('fill', '#f21616');
              console.log('test');
            }
          },
          error: function(error) {
            // Menampilkan pesan kesalahan jika terjadi kesalahan
            console.error('Error:', error.responseText);
          }
        });

      });
    </script>

</body>


</html>

</html>