<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Photo's</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/detail.css'); ?>">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="<?= base_url("/dist/css/demo.min.css?1684106062"); ?> " rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="body">
    <div class="page-body page-center">
        <header class="header">
            <a href="<?= base_url('Welcome') ?>" class="logo"><img src="<?= base_url('assets/css/logo2.png') ?>" alt="" width="250"></a>
        </header>

        <div class="container-xl py-4">
            <?php foreach ($images as $image) : ?>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="text">
                            <img class="rounded mb-4 mt-5" width="750" src="<?= base_url('Gambar/' . $image->LokasiFile) ?>" alt="<?= $image->LokasiFile ?>">
                            <h2 class="h1 mb-2 text-dark fw-bold "><?= $image->JudulFoto ?></h2>
                            <h2 class="h6 mb-4 tex-dark  "><?= $image->TanggalUnggah ?></h2>
                            <h2>Description Photo</h2>
                            <p class="text-muted"><?= $image->DeskripsiFoto ?></p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mt-5">
                            <div class="card-body scrollable">
                                <div class="chat">
                                    <div class="chat-bubbles">
                                        <?php $user = $this->session->userdata('Username'); ?>
                                        <?php if (empty($comments)) : ?>
                                            <div class="chat-item text-center">
                                                No comments at this time
                                            </div>
                                        <?php else : ?>
                                            <?php foreach ($comments as $comment) : ?>
                                                <?php if ($user == $comment['Username']) { ?>
                                                    <div class="chat-item">
                                                        <div class="row align-items-end justify-content-end">
                                                            <div class="col col-lg-10">
                                                                <div class="chat-bubble chat-bubble-me">
                                                                    <div class="chat-bubble-title">
                                                                        <div class="row">
                                                                            <div class="col chat-bubble-author"><?= $comment['Username'] ?></div>
                                                                            <div class="col-auto chat-bubble-date"><?= $comment['TanggalKomentar'] ?></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="chat-bubble-body">
                                                                        <p><?= $comment['Isikomentar'] ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="chat-item">
                                                        <div class="row align-items-end">
                                                            <div class="col col-lg-10">
                                                                <div class="chat-bubble">
                                                                    <div class="chat-bubble-title">
                                                                        <div class="row">
                                                                            <div class="col chat-bubble-author"><?= $comment['Username'] ?></div>
                                                                            <div class="col-auto chat-bubble-date"><?= $comment['TanggalKomentar'] ?></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="chat-bubble-body">
                                                                        <p><?= $comment['Isikomentar'] ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <form id="comment" action="<?= base_url('Image/komen') ?>" method="post" class="input-group input-group-flat">
                                    <input type="text" id="komen" name="IsiKomentar" class="form-control" autocomplete="off" placeholder="Type message">
                                    <input type="hidden" name="FotoID" value="<?= $image->FotoID ?>">
                                    <input type="hidden" name="UserID" value="<?= $this->session->userdata('Username') ?>">
                                    <input type="hidden" name="TanggalKomentar" value="<?= date('Y-m-d') ?>">
                                    <span class="input-group-text">
                                        <a href="#" class="link-secondary" data-bs-toggle="tooltip" aria-label="Clear search" data-bs-original-title="Clear search">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <!-- Icon Clear Search -->
                                            </svg>
                                        </a>
                                        <a id="send" class="link-secondary ms-2" data-bs-toggle="tooltip" aria-label="Send" data-bs-original-title="Send">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M10 14l11 -11" />
                                                <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                                            </svg>
                                        </a>
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
        </div>
    <?php endforeach; ?>
    </div>
    <script>
        $(document).ready(function() {
            $('#send').click(function() {
                console.log("test");
                // Mendapatkan nilai dari elemen dengan id 'comment'
                var commentValue = $('#komen').val();

                // Memeriksa apakah nilai elemen 'comment' tidak kosong
                if (commentValue.trim() !== '') {
                    // Jika ada nilai, maka lakukan submit
                    $('#comment').submit();
                    console.log("test1");
                } else {
                    // Jika tidak ada nilai, lakukan sesuatu, misalnya tampilkan pesan kesalahan
                    $('#komen').attr('placeholder', 'Nilai komentar tidak boleh kosong');
                    // console.log('Nilai komentar tidak boleh kosong');
                }
            })

            $('.likebutton').click(function() {
                var FotoID = $(this).data('foto-id');
                var UserID = $(this).data('user-id');
                var Tanggal = $(this).data('tanggal');
                var like = $(this).find('.like-number');
                var love = $('#loveicon');

                $.ajax({
                    url: '<?= base_url('Image/like') ?>', // URL endpoint untuk request AJAX
                    type: 'POST', // Metode HTTP untuk request (GET atau POST)
                    data: {
                        FotoID: FotoID, // Data yang akan dikirimkan ke server
                        UserID: UserID,
                        Tanggal: Tanggal
                    },
                    dataType: 'json', // Tipe data yang diharapkan dari server response
                    success: function(response) {
                        like.text(response.likes);
                        console.log(response.likes);
                        console.log(response.userLike);

                        if (response.userLike.length === 0) {
                            love.attr('fill', 'none');
                            love.attr('stroke', 'currentColor');
                        } else {
                            love.attr('fill', '#f66d9b');
                            love.attr('stroke', '#f66d9b');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Fungsi yang akan dijalankan jika request mengalami error
                        console.log(xhr.responseText);
                    }
                });

            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>